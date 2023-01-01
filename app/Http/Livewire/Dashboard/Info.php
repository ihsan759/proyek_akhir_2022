<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Info extends Component
{
    public $message;
    public function render()
    {
        return view('livewire.dashboard.info');
    }
}
