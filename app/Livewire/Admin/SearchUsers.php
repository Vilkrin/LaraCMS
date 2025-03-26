<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class SearchUsers extends Component
{
    public $search = '';

    public function render()
    {
        return view('search-users', [
            'users' => User::search($this->search),
        ]);
    }
}
