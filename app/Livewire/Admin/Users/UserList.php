<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Flux\Flux;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;


class UserList extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $userToDelete = null;
    public $roleFilter = 'all';
    public $statusFilter = 'all';
    public string $name = '';
    public string $email = '';
    public string $password = '';

    public array $selectedRoles = [];

    public $availableRoles = [];

    public function mount()
    {
        $this->availableRoles = Role::query()
            ->where('name', '!=', 'Super Admin')
            ->orderBy('name')
            ->get()
            ->map(fn($role) => [
                'name' => $role->name,
                'label' => ucfirst($role->name),
            ])
            ->toArray();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedRoleFilter()
    {
        $this->resetPage();
    }

    public function updatedStatusFilter()
    {
        $this->resetPage();
    }

    #[Computed]
    public function roles()
    {
        return Role::query()
            ->where('name', '!=', 'Super Admin')
            ->orderBy('name')
            ->pluck('name');
    }

    public function createUser(): void
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'min:8'],
            'selectedRoles' => ['array'],
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $user->syncRoles($this->selectedRoles);

        $this->reset([
            'name',
            'email',
            'password',
            'selectedRoles',
        ]);

        $this->resetPage();

        Flux::modal('add-user')->close();

        Flux::toast(
            variant: 'success',
            text: 'User added successfully.'
        );
    }

    #[Computed]
    public function users()
    {
        return User::query()
            ->with('roles')

            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })

            ->when($this->roleFilter !== 'all', function ($query) {
                $query->role($this->roleFilter);
            })

            ->when($this->statusFilter !== 'all', function ($query) {
                $query->where('status', $this->statusFilter);
            })

            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);
    }

    public function confirmDelete(int $userId): void
    {
        $this->userToDelete = $userId;
    }

    public function deleteUser(): void
    {
        $user = User::findOrFail($this->userToDelete);

        $user->delete();

        $this->reset('userToDelete');

        Flux::modal('delete-user')->close();

        Flux::toast(
            variant: 'success',
            text: 'User deleted successfully.'
        );
    }

    public function render()
    {
        $totalUsers = $this->users->total();
        $admins = User::role('Administrator')->count();

        return view('livewire.admin.users.user-list', [
            'totalUsers' => $totalUsers,
            'usersThisMonth' => User::where('created_at', '>=', Carbon::now()->startOfMonth())->count(),
            'usersLastMonth' => User::whereBetween('created_at', [
                Carbon::now()->subMonth()->startOfMonth(),
                Carbon::now()->subMonth()->endOfMonth(),
            ])->count(),
            'activeUsers' => User::where('status', 'active')->count(),
            'admins' => $admins,
            'adminPercent' => $totalUsers > 0
                ? round(($admins / $totalUsers) * 100, 1)
                : 0,
        ]);
    }
}
