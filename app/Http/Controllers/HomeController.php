<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 1) {
            $warga = Warga::with('kk')->get();
        } else {
            $warga = KartuKeluarga::query()->with('kk')->where('rt', Auth::user()->rt)->where('rw', Auth::user()->rw)->get();
        }
        return view('home', compact('warga'));
    }
}
