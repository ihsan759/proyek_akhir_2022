<?php

namespace App\Exports;

use App\Models\Warga;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class WargaExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct($keywoard = '')
    {
        $this->nama = $keywoard;
    }

    public function view(): View
    {
        $data = DB::table('warga')->join('agama', 'agama.id', '=', 'warga.id_agama')->join('kartu_keluarga', 'kartu_keluarga.id_kk', '=', 'warga.id_kk')->select('warga.nik as nik', 'warga.nama as wargaNama', 'warga.gender as gender', 'agama.nama as agama', 'warga.gol_darah as gol_darah', 'warga.tgl_lahir as tgl_lahir', 'kartu_keluarga.rt as rt', 'kartu_keluarga.rw as rw', 'kartu_keluarga.id_kk as kk')->where('warga.nama', 'Like', '%' . $this->nama . '%')->orWhere('nik', 'Like', '%' . $this->nama . '%')->orWhere('pekerjaan', 'Like', '%' . $this->nama . '%')->get();
        return view('warga.export', compact('data'));
    }
}
