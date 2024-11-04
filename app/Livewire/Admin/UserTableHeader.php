<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class UserTableHeader extends Component
{
    public $search = '';
    public $selectedBrands = [];

    public function addUser()
    {
        // Handle adding a user
    }

    public function filterByBrand($brand)
    {
        // Handle brand filtering
    }

    public function render()
    {
        return view('livewire.admin.user-table-header');
    }
}
