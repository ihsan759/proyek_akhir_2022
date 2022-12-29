<?php

namespace App\Http\Livewire\Cards;

use App\Models\Agama;
use App\Models\KartuKeluarga;
use Livewire\Component;

class FormWarga extends Component
{
    public $agamas;
    public $kk;

    public function mount()
    {
        $this->agamas  = Agama::all();
        $this->kk = KartuKeluarga::all();
    }
    public function render()
    {
        return view('livewire.cards.form-warga');
    }
}
