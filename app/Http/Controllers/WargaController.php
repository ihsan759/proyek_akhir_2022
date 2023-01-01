<?php

namespace App\Http\Controllers;

use App\Exports\WargaExport;
use App\Models\KartuKeluarga;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

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
            'alamat' => 'required|max:255',
        ]);

        $kartu['rt'] = Auth::user()->rt;
        $kartu['rw'] = Auth::user()->rw;
        $kartu['created_at'] = now();
        $kartu['updated_at'] = now();

        KartuKeluarga::query()->insert($kartu);

        return redirect()->route('warga.create')->with('message', 'Berhasil membuat data kartu keluarga');
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

        return redirect()->route('warga.create')->with('message', 'Berhasil membuat data warga');
    }

    public function export(Request $request)
    {
        return Excel::download(new WargaExport($request->nama), 'warga.xlsx');
    }

    public function destroy(Request $request)
    {
        Warga::query()->where('nik', $request->nik)->delete();

        return redirect()->route('warga.index')->with('message', 'Berhasil menghapus data warga');
    }
}
