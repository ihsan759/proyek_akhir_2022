<?php

namespace App\Http\Livewire\Table;

use App\Models\Warga as ModelsWarga;
use Livewire\Component;

class Warga extends Component
{
    public $term = "";

    public function render()
    {
        sleep(1);
        $warga = ModelsWarga::with(['kk', 'agama'])->where('nama', 'Like', '%' . $this->term . '%')->orWhere('nik', 'Like', '%' . $this->term . '%')->orWhere('pekerjaan', 'Like', '%' . $this->term . '%')->paginate(10);
        return view('livewire.table.warga', compact('warga'));
    }
}
