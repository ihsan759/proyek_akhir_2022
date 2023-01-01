<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    public function pending()
    {
        if (Auth::user()->role == 1) {
            $dokumen = Dokumen::query()->with('dokumen')->where('status', 1)->get();
        } else {
            $dokumen = Dokumen::query()->with('dokumen')->where('id_user', Auth::user()->id)->where('status', 1)->get();
        }

        return view('Dokumen.index', compact('dokumen'));
    }

    public function approve()
    {
        if (Auth::user()->role == 1) {
            $dokumen = Dokumen::query()->with(['dokumen', 'dokumenAdmin'])->where('status', 2)->get();
        } else {
            $dokumen = Dokumen::query()->with(['dokumen', 'dokumenAdmin'])->where('id_user', Auth::user()->id)->where('status', 2)->get();
        }

        return view('Dokumen.index', compact('dokumen'));
    }

    public function reject()
    {
        if (Auth::user()->role == 1) {
            $dokumen = Dokumen::query()->with(['dokumen', 'dokumenAdmin'])->where('status', 3)->get();
        } else {
            $dokumen = Dokumen::query()->with(['dokumen', 'dokumenAdmin'])->where('id_user', Auth::user()->id)->where('status', 3)->get();
        }

        return view('Dokumen.index', compact('dokumen'));
    }

    public function create()
    {
        return view('Dokumen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'file' => 'required|file',
        ]);

        $file = $request->file('file');
        $filename = $file->hashName();
        $path = $file->storeAs('dokumen', $filename);
        Dokumen::query()->create([
            'nama' => $request->input('nama'),
            'file' => $path,
            'status' => 1,
            'id_user' => Auth::user()->id
        ]);

        return redirect()->route('dokumen.pending')->with('message', 'Berhasil mengirimkan dokumen/surat');
    }

    public function download($id)
    {
        $file = Dokumen::query()->where('id', $id)->first();
        $fileNameParts = explode('.', $file->file);
        $ext = end($fileNameParts);
        $name = implode(".", array($file->nama, $ext));
        return Storage::download($file->file, $name);
    }

    public function delete(Request $request)
    {
        Dokumen::query()->where('id', $request->id)->delete();

        return redirect()->route('dokumen.pending')->with('message', 'Berhasil meng-nonaktifkan dokumen/surat');
    }

    public function trash()
    {
        $dokumen = Dokumen::onlyTrashed()->with(['dokumen', 'dokumenAdmin'])->where('id_user', Auth::user()->id)->get();

        return view('Dokumen.index', compact('dokumen'));
    }

    public function restore($id)
    {
        Dokumen::withTrashed()->find($id)->restore();

        return redirect()->route('dokumen.trash')->with('message', 'Berhasil mengaktifkan dokumen/surat');
    }

    public function destroy(Request $request)
    {
        $dokumen = Dokumen::onlyTrashed()->where('id', $request->id)->first();

        Storage::delete($dokumen->file);

        $dokumen->forceDelete();

        return redirect()->route('dokumen.trash')->with('message', 'Berhasil menghapus dokumen/surat');
    }

    public function status(Request $request)
    {
        $dokumen = Dokumen::query()->where('id', $request->id)->first();

        if ($request->status == 3) {
            $request->validate([
                'keterangan' => 'required'
            ]);
            $dokumen->update([
                'status' => $request->status,
                'keterangan' => $request->keterangan,
                'id_admin' => Auth::user()->id
            ]);
        } else {
            $dokumen->update([
                'status' => $request->status,
                'id_admin' => Auth::user()->id
            ]);
        }


        return redirect()->route('dokumen.pending')->with('message', 'Berhasil mengubah status dokumen/surat');
    }
}
