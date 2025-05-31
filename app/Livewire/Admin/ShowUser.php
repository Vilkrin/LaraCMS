<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class ShowUser extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.admin.show-user');
    }
}
