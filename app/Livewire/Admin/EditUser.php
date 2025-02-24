<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class EditUser extends Component
{

    public $user, $name, $email;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function updateUser()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
        ]);

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('message', 'User updated successfully.');

        return redirect()->route('users.index');
    }

    public function render()
    {
        return view('livewire.admin.edit-user');
    }
}
