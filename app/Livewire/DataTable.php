<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class DataTable extends Component
{

    use WithPagination;

    public $search = '';
    public $perPage = 5;

    public function render()
    {

        $users = User::search($this->search)->paginate($this->perPage);

        return view('livewire.data-table', compact('users'));
    }
}
