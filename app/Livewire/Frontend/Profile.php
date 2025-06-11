<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Profile extends Component
{
    public $user;
    public $activeTab = 'profile';

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.frontend.profile', [
            'user' => $this->user,
            'activeTab' => $this->activeTab,
        ]);
    }
}
