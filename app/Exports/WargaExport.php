<?php

namespace App\Exports;

use App\Models\Warga;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class WargaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(string $keywoard)
    {
        $this->nama = $keywoard;
    }

    public function view() : View{
        return view('warga.export',[
            'data' => Warga::join('agama','agama.id','=','warga.id_agama');
        ]);
    }
}
