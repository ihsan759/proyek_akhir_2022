<?php

namespace App\Http\Livewire\Table;

use App\Models\Dokumen;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListDokumen extends Component
{
    public $page;
    public $search = '';
    public function render()
    {
        if ($this->page == 'pending') {
            if (Auth::user()->role == 1) {
                $dokumen = Dokumen::query()->with('dokumen')->where('status', 1)->paginate(5);
            } else {
                $dokumen = Dokumen::query()->with('dokumen')->where('id_user', Auth::user()->id)->where('status', 1)->paginate(5);
            }
        } elseif ($this->page == 'approve') {
            if (Auth::user()->role == 1) {
                $dokumen = Dokumen::query()->with(['dokumen', 'dokumenAdmin'])->where('status', 2)->paginate(5);
            } else {
                $dokumen = Dokumen::query()->with(['dokumen', 'dokumenAdmin'])->where('id_user', Auth::user()->id)->where('status', 2)->paginate(5);
            }
        } elseif ($this->page == 'reject') {
            if (Auth::user()->role == 1) {
                $dokumen = Dokumen::query()->with(['dokumen', 'dokumenAdmin'])->where('status', 3)->paginate(5);
            } else {
                $dokumen = Dokumen::query()->with(['dokumen', 'dokumenAdmin'])->where('id_user', Auth::user()->id)->where('status', 3)->paginate(5);
            }
        } else {
            $dokumen = Dokumen::onlyTrashed()->with(['dokumen', 'dokumenAdmin'])->where('id_user', Auth::user()->id)->paginate(5);
        }
        return view('livewire.table.list-dokumen', compact('dokumen'));
    }
}
