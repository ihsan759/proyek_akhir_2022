<?php

namespace App\Http\Livewire\Cards;

use App\Models\Agama;
use App\Models\KartuKeluarga;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormWarga extends Component
{
    public $agamas;
    public $kk;

    public function mount()
    {
        $this->agamas  = Agama::all();
        if (Auth::user()->role == 1) {
            $this->kk = KartuKeluarga::all();
        } else {
            $this->kk = KartuKeluarga::query()->where('rt', Auth::user()->rt)->where('rw', Auth::user()->rw)->get();
        }
    }
    public function render()
    {
        return view('livewire.cards.form-warga');
    }
}
