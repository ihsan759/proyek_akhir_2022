<?php

namespace App\Http\Livewire\Table;

use App\Models\User;
use Livewire\Component;

class ListAkun extends Component
{
    public $page;
    public $search = "";
    public function render()
    {
        if ($this->page == 'buat') {
            $accounts = User::query()->where('nama', 'Like', '%' . $this->search . '%')->orWhere('no_hp', 'Like', '%' . $this->search . '%')->orWhere('rt', 'Like', '%' . $this->search . '%')->orWhere('rw', 'Like', '%' . $this->search . '%')->latest()->paginate(5);
        } else {
            $accounts = User::onlyTrashed()->where('nama', 'Like', '%' . $this->search . '%')->orWhere('no_hp', 'Like', '%' . $this->search . '%')->orWhere('rt', 'Like', '%' . $this->search . '%')->orWhere('rw', 'Like', '%' . $this->search . '%')->latest()->paginate(5);
        }
        return view('livewire.table.list-akun', compact('accounts'));
    }
}
