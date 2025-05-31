<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Validate;
use Spatie\Permission\Models\Role;

class EditUser extends Component
{

    public User $user;

    #[Validate('required|string|max:255')]
    public $name;

    #[Validate('required|email', as: 'Email Address')]
    public $email;

    #[Validate('nullable|min:8|confirmed')]
    public $password;

    public $password_confirmation;

    public $roles = [];
    public $availableRoles = []; // Will be populated dynamically

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;

        // Load all roles except 'Super Admin'
        $this->availableRoles = Role::where('name', '!=', 'Super Admin')->pluck('name')->toArray();

        // Load assigned roles
        $this->roles = $user->roles->pluck('name')->toArray();
    }

    public function save()
    {
        // Save user details
        $this->user->name = $this->name;
        $this->user->email = $this->email;

        if ($this->password) {
            $this->user->password = bcrypt($this->password);
        }

        $this->user->save();

        // Check if the user has the 'Super Admin' role
        $hasSuperAdminRole = $this->user->hasRole('Super Admin');

        // If user has 'Super Admin', make sure it's not removed
        if ($hasSuperAdminRole) {
            // Preserve 'Super Admin' role and sync the other roles
            $this->user->syncRoles(array_merge(['Super Admin'], array_intersect($this->roles, $this->availableRoles)));
        } else {
            // Sync roles normally
            $this->user->syncRoles(array_intersect($this->roles, $this->availableRoles));
        }

        session()->flash('success', 'User updated successfully.');

        // Redirect to the user list page
        return redirect()->route('admin.users.index');
    }

    public function render()
    {
        return view('livewire.admin.edit-user');
    }
}
