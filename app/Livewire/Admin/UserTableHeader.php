<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UserTableHeader extends Component
{
    public function updateSearch()
    {
        $this->emit('searchUpdated', $this->searchTerm);
    }
    // public $search = '';
    // public $selectedBrands = [];

    // public function addUser()
    // {
    //     // Handle adding a user
    // }

    // public function filterByBrand($brand)
    // {
    //     // Handle brand filtering
    // }

    public function render()
    {

        // 2. Filter users based on the search term
        // $users = User::query()
        //     ->where('name', 'like', '%' . $this->search . '%')
        //     ->orWhere('email', 'like', '%' . $this->search . '%')
        //     ->paginate(10);

        return view('livewire.admin.user-table-header');
    }
}
