<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class UserTable extends Component
{

    use WithPagination;

    public $search = '';

    protected $listeners = ['searchUpdated' => 'updateSearch'];

    public function updateSearch($term)
    {
        $this->search = $term;
    }
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
        $users = User::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->paginate(10);

        $users = DB::table('users')->paginate(10);

        return view('livewire.admin.user-table', ['users' => $users]);
    }
}
