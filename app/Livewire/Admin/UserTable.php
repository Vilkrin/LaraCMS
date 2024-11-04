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

    public function render()
    {

        $users = DB::table('users')->paginate(10);

        return view('livewire.admin.user-table', ['users' => $users]);
    }
}
