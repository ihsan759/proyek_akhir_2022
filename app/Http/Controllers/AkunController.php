<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 1) {
            $accounts = User::query()->latest()->get();
        } else {
            $accounts = User::query()->where('role', 3)->latest()->get();
        }
        return view('Akun.index', compact('accounts'));
    }

    public function trash()
    {
        if (Auth::user()->role == 1) {
            $accounts = User::onlyTrashed()->latest()->get();
        } else {
            $accounts = User::onlyTrashed()->where('role', 3)->latest()->get();
        }
        return view('Akun.trash', compact('accounts'));
    }

    public function store(Request $request)
    {
        $akun = $request->validate([
            'nama' => 'required|max:50',
            'no_hp' => 'required|min:10|max:15',
            'rt' => 'required|max:3',
            'rw' => 'required|max:3',
            'role' => 'required|max:1',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        User::query()->create($akun);

        return redirect()->route('akun')->with('message', 'Berhasil membuat profile');
    }

    public function update(Request $request)
    {
        $user = User::query()->where('id', $request->id)->first();

        $user->fill($request->all());

        $user->save();

        return redirect()->route('akun')->with('message', 'Berhasil update Akun');
    }

    public function delete(Request $request)
    {
        $akun = User::find($request->id);

        $akun->delete();

        return redirect()->route('akun')->with('message', 'Berhasil meng-nonaktifkan akun');
    }

    // public function destroy(Request $request)
    // {
    //     User::query()->where('id', $request->id)->forceDelete();

    //     return redirect()->route('akun.trash')->with('message', 'Berhasil menghapus akun');
    // }

    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();

        return redirect()->route('akun.trash')->with('message', 'Berhasil mengaktifkan akun');
    }
}
