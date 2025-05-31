<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Validate;
use Spatie\Permission\Models\Role;

class CreateUser extends Component
{

    #[Validate('required|string|max:255')]
    public $name;

    #[Validate('required|email', as: 'Email Address')]
    public $email;

    #[Validate('nullable|min:8|confirmed')]
    public $password;

    public $password_confirmation;

    public $roles = [];
    public $availableRoles = []; // Will be populated dynamically

    public function mount()
    {
        // Load all roles except 'Super Admin'
        $this->availableRoles = Role::where('name', '!=', 'Super Admin')->pluck('name')->toArray();
    }

    public function save()
    {
        // Create a new user instance
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;

        if ($this->password) {
            $user->password = bcrypt($this->password);
        }

        $user->save();

        // Sync roles, ensuring the 'Super Admin' role cannot be assigned
        $user->syncRoles(array_intersect($this->roles, $this->availableRoles));

        session()->flash('success', 'User created successfully.');

        // Redirect to the user list page
        return redirect()->route('admin.users.index');
    }


    public function render()
    {
        return view('livewire.admin.create-user');
    }
}
