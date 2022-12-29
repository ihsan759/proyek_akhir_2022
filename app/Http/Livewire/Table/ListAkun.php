<?php

namespace App\Http\Livewire\Table;

use Livewire\Component;

class ListAkun extends Component
{
    public $page;
    public $accounts;
    public function render()
    {
        return view('livewire.table.list-akun');
    }
}
