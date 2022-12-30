<?php

namespace App\Http\Livewire\Cards;

use App\Models\Agama;
use App\Models\KartuKeluarga;
use App\Models\Warga;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        if (Auth::user()->role == 2) {
            $kawin = count(KartuKeluarga::join('warga', 'warga.id_kk', '=', 'kartu_keluarga.id_kk')->where('rt', Auth::user()->rt)->where('rw', Auth::user()->rw)->where('status_perkawinan', 2)->get());
            $belum_kawin = count(KartuKeluarga::join('warga', 'warga.id_kk', '=', 'kartu_keluarga.id_kk')->where('rt', Auth::user()->rt)->where('rw', Auth::user()->rw)->where('status_perkawinan', 1)->get());
            $janda = count(KartuKeluarga::join('warga', 'warga.id_kk', '=', 'kartu_keluarga.id_kk')->where('rt', Auth::user()->rt)->where('rw', Auth::user()->rw)->where('status_perkawinan', 3)->get());
            $countwanita = count(KartuKeluarga::join('warga', 'warga.id_kk', '=', 'kartu_keluarga.id_kk')->where('rt', Auth::user()->rt)->where('rw', Auth::user()->rw)->where('gender', 2)->get());
            $countpria = count(KartuKeluarga::join('warga', 'warga.id_kk', '=', 'kartu_keluarga.id_kk')->where('rt', Auth::user()->rt)->where('rw', Auth::user()->rw)->where('gender', 1)->get());
        } else {
            $pria = KartuKeluarga::join('warga', 'warga.id_kk', '=', 'kartu_keluarga.id_kk')->where('gender', 1)->get();
            $wanita = KartuKeluarga::join('warga', 'warga.id_kk', '=', 'kartu_keluarga.id_kk')->where('gender', 2)->get();
            $kawin = count(KartuKeluarga::join('warga', 'warga.id_kk', '=', 'kartu_keluarga.id_kk')->where('status_perkawinan', 2)->get());
            $belum_kawin = count(KartuKeluarga::join('warga', 'warga.id_kk', '=', 'kartu_keluarga.id_kk')->where('status_perkawinan', 1)->get());
            $janda = count(KartuKeluarga::join('warga', 'warga.id_kk', '=', 'kartu_keluarga.id_kk')->where('status_perkawinan', 3)->get());
            $countwanita = count($wanita);
            $countpria = count($pria);
        }
        return view('livewire.cards.dashboard', compact('countwanita', 'countpria', 'kawin', 'belum_kawin', 'janda'));
    }
}
