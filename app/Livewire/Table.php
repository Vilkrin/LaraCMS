<?php

namespace App\Livewire;

use App\Models\User;
use Column;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

abstract class Table extends Component
{
  public function render() {}

  use WithPagination;

  public $perPage = 10;

  public $page = 1;

  public $sortBy = '';

  public $sortDirection = 'asc';

  // ...

  public function query(): Builder
  {
    return User::query();
  }

  public function data()
  {
    return $this
      ->query()
      ->when($this->sortBy !== '', function ($query) {
        $query->orderBy($this->sortBy, $this->sortDirection);
      })
      ->paginate($this->perPage);
  }


  public function columns(): array
  {
    return [
      Column::make('name', 'Name'),
      Column::make('email', 'Email'),
      // Column::make('status', 'Status')->component('columns.users.status'),
      Column::make('created_at', 'Created At')->component('columns.common.human-diff'),
    ];
  }



  public function sort($key)
  {
    $this->resetPage();

    if ($this->sortBy === $key) {
      $direction = $this->sortDirection === 'asc' ? 'desc' : 'asc';
      $this->sortDirection = $direction;

      return;
    }

    $this->sortBy = $key;
    $this->sortDirection = 'asc';
  }
}
