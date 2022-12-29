<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function create()
    {

        return view('Warga.create');
    }

    public function index()
    {
        return view('Warga.index');
    }

    public function storeKk(Request $request)
    {
        $kartu = $request->validate([
            'id_kk' => 'required|max:16|unique:kartu_keluarga',
            'rt' => 'required|max:3',
            'rw' => 'required|max:3',
            'alamat' => 'required|max:255',
        ]);

        $kartu['created_at'] = now();
        $kartu['updated_at'] = now();

        KartuKeluarga::query()->insert($kartu);

        return redirect()->route('warga.create');
    }

    public function storeKtp(Request $request)
    {
        $ktp = $request->validate([
            'nik' => 'required|max:16|unique:warga',
            'nama' => 'required|max:50',
            'gender' => 'required',
            'id_agama' => 'required',
            'gol_darah' => 'required',
            'id_kk' => 'required',
            'tgl_lahir' => 'required',
            'pekerjaan' => 'required',
            'status_perkawinan' => 'required'
        ]);

        $ktp['created_at'] = now();
        $ktp['updated_at'] = now();

        Warga::query()->insert($ktp);

        return redirect()->route('warga.create');
    }
}
