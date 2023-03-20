<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    public function index()
    {

        // $accounts = User::query()->latest()->get();

        return view('Akun.index');
    }

    public function trash()
    {
        // $accounts = User::onlyTrashed()->latest()->get();

        return view('Akun.trash');
    }

    public function store(Request $request)
    {
        if ($request->role == 2) {
            $akun =  $request->validate([
                'rt' => 'required',
                'rw' => 'required',
                'nama' => 'required|max:50',
                'no_hp' => 'required|min:10|max:15',
                'role' => 'required|max:1',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8'
            ]);
        } else {
            $akun = $request->validate([
                'nama' => 'required|max:50',
                'no_hp' => 'required|min:10|max:15',
                'role' => 'required|max:1',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8'
            ]);
        }

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

        return redirect()->route('akun.index')->with('message', 'Berhasil meng-nonaktifkan akun');
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
