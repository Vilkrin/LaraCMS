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

        // Sync roles, making sure Super Admin cannot be assigned manually
        $this->user->syncRoles(array_intersect($this->roles, $this->availableRoles));

        session()->flash('success', 'User updated successfully.');
    }

    public function render()
    {
        return view('livewire.admin.edit-user');
    }
}
