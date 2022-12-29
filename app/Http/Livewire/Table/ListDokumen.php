<?php

namespace App\Http\Livewire\Table;

use Livewire\Component;

class ListDokumen extends Component
{
    public $dokumen;
    public function render()
    {
        return view('livewire.table.list-dokumen');
    }
}
