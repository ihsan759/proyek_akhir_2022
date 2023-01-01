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
        $warga = ModelsWarga::join('agama', 'agama.id', '=', 'warga.id_agama')->join('kartu_keluarga', 'kartu_keluarga.id_kk', '=', 'warga.id_kk')->select('warga.nik as nik', 'warga.nama as wargaNama', 'warga.gender as gender', 'agama.nama as agama', 'warga.gol_darah as gol_darah', 'warga.tgl_lahir as tgl_lahir', 'kartu_keluarga.rt as rt', 'kartu_keluarga.rw as rw', 'kartu_keluarga.id_kk as kk', 'warga.pekerjaan as pekerjaan')->where('warga.nama', 'Like', '%' . $this->term . '%')->orWhere('nik', 'Like', '%' . $this->term . '%')->orWhere('pekerjaan', 'Like', '%' . $this->term . '%')->orWhere('agama.nama', 'Like', '%' . $this->term . '%')->orWhere('kartu_keluarga.id_kk', 'Like', '%' . $this->term . '%')->orWhere('kartu_keluarga.rt', 'Like', '%' . $this->term . '%')->orWhere('kartu_keluarga.rw', 'Like', '%' . $this->term . '%')->paginate(5);
        return view('livewire.table.warga', compact('warga'));
    }
}
