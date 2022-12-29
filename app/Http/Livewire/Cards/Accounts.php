<?php

namespace App\Http\Livewire\Cards;

use Livewire\Component;

class Accounts extends Component
{
    public $nama;
    public $no_hp;
    public $rt;
    public $rw;
    public $role;
    public $email;

    public function render()
    {
        return view('livewire.cards.accounts');
    }
}
