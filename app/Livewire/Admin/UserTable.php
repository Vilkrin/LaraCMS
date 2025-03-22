<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class UserTable extends Component
{

    use WithPagination;

    public $userId, $name, $email, $showModal = false, $confirmingDelete = false;

    public $search = '';

    public $query = '';

    public function search()
    {
        $this->resetPage();
    }

    public function addUser()
    {
        // Handle adding a user
    }


    public function render()
    {

        // 2. Filter users based on the search term
        $users = User::query()
            ->with('roles')
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->paginate(10);


        return view('livewire.admin.user-table', ['users' => $users]);
    }

    public function showUser($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->showModal = true;
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->showModal = true;
    }

    public function updateUser()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->userId,
        ]);

        User::find($this->userId)->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('message', 'User updated successfully.');
        $this->resetModal();
    }

    public function confirmDelete($id)
    {
        $this->userId = $id;
        $this->confirmingDelete = true;
    }

    public function deleteUser()
    {
        User::findOrFail($this->userId)->delete();
        session()->flash('message', 'User deleted successfully.');
        $this->confirmingDelete = false;
    }

    public function resetModal()
    {
        $this->showModal = false;
        $this->confirmingDelete = false;
        $this->reset(['userId', 'name', 'email']);
    }
}
