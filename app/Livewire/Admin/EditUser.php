<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Models\Role;

class EditUser extends Component
{
    use WithFileUploads;

    public User $user;
    public $avatar;
    public $password;
    public $password_confirmation;
    public $roles = [];
    public $availableRoles = [];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->roles = $user->roles->pluck('name')->toArray(); // Load user's roles
        $this->availableRoles = Role::pluck('name')->toArray(); // Load all roles from DB
    }

    public function updateUser()
    {
        $this->validate([
            'user.name' => 'required|string|max:255',
            'user.email' => 'required|email|unique:users,email,' . $this->user->id,
            'password' => 'nullable|min:8|confirmed',
            'avatar' => 'nullable|image|max:1024',
        ]);

        if ($this->password) {
            $this->user->password = bcrypt($this->password);
        }

        if ($this->avatar) {
            $this->user->clearMediaCollection('avatars');
            $this->user->addMedia($this->avatar->getRealPath())->toMediaCollection('avatars');
        }

        $this->user->syncRoles($this->roles); // Update roles
        $this->user->save();

        session()->flash('message', 'User updated successfully.');
    }

    public function render()
    {
        return view('livewire.admin.edit-user');
    }
}
