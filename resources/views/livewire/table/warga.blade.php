<div class="w-full mt-12">
    <p class="text-xl pb-3 flex items-center">
        <i class="fas fa-list mr-3"></i> Warga
    </p>
    <form method="get">
    <input class="border-solid border border-gray-300 p-2 w-full md:w-1/4" 
        type="text" placeholder="Search Warga" wire:model="term" x-model="term"/>
    </form>
    <div wire:loading>Searching Warga...</div>
        <!-- 
            notice that $term is available as a public 
            variable, even though it's not part of the 
            data array 
        -->
    <form action="{{ route('warga.export') }}" method="post">
        @csrf
        <input type="hidden" name="nama" id="" x-model="term">
        <button class="bg-green-500 text-white py-2 px-3 hover:bg-green-700 shadow-lg rounded-lg mt-4">Excel</button>
    </form>
    <div class="bg-white overflow-auto mt-5">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">NIK</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Gender</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Tanggal Lahir</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Agama</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Gol. Darah</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Pekerjaan</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">RT</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">RW</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No. KK</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @if ($term == "")
                    @foreach ($warga as $data)  
                        <tr>
                            <td class="text-left py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="text-left py-3 px-4">{{ $data->nik }}</td>
                            <td class="text-left py-3 px-4">{{ $data->wargaNama }}</td>
                            <td class="text-left py-3 px-4">
                                @if ($data->gender == 1)
                                    Pria
                                @else
                                    Wanita
                                @endif
                            </td>
                            <td class="text-left py-3 px-4">{{ $data->tgl_lahir }}</td>
                            <td class="text-left py-3 px-4">{{ $data->agama }}</td>
                            <td class="text-left py-3 px-4">
                                @if ($data->gol_darah == 1)
                                    A
                                @elseif($data->gol_darah == 2)
                                    B
                                @elseif($data->gol_darah == 3)
                                    AB
                                @else
                                    O
                                @endif
                            </td>
                            <td class="text-left py-3 px-4">{{ $data->pekerjaan }}</td>
                            <td class="text-left py-3 px-4">{{ $data->rt }}</td>
                            <td class="text-left py-3 px-4">{{ $data->rw }}</td>
                            <td class="text-left py-3 px-4">{{ $data->kk }}</td>
                            <td class="text-left py-3 px-4">
                                <form action="{{ route('warga.destroy') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="nik" value="{{ $data->nik }}">
                                    <button type="submit" class="bg-red-500 rounded-lg text-slate-600 hover:text-white hover:bg-red-700 py-2 px-3" onclick="return confirm('Apakah anda ingin menghapus data warga ini ?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        @foreach ($warga as $data)  
                        <tr>
                            <td class="text-left py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="text-left py-3 px-4">{{ $data->nik }}</td>
                            <td class="text-left py-3 px-4">{{ $data->wargaNama }}</td>
                            <td class="text-left py-3 px-4">
                                @if ($data->gender == 1)
                                    Pria
                                @else
                                    Wanita
                                @endif
                            </td>
                            <td class="text-left py-3 px-4">{{ $data->tgl_lahir }}</td>
                            <td class="text-left py-3 px-4">{{ $data->agama }}</td>
                            <td class="text-left py-3 px-4">
                                @if ($data->gol_darah == 1)
                                    A
                                @elseif($data->gol_darah == 2)
                                    B
                                @elseif($data->gol_darah == 3)
                                    AB
                                @else
                                    O
                                @endif
                            </td>
                            <td class="text-left py-3 px-4">{{ $data->pekerjaan }}</td>
                            <td class="text-left py-3 px-4">{{ $data->rt }}</td>
                            <td class="text-left py-3 px-4">{{ $data->rw }}</td>
                            <td class="text-left py-3 px-4">{{ $data->kk }}</td>
                            <td class="text-left py-3 px-4">
                                <form action="{{ route('warga.destroy') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="nik" value="{{ $data->nik }}">
                                    <button type="submit" class="bg-red-500 rounded-lg text-slate-600 hover:text-white hover:bg-red-700 py-2 px-3" onclick="return confirm('Apakah anda ingin menghapus data warga ini ?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
            </tbody>
        </table>
        <div class="px-4 mt-4">
            {{$warga->links()}}
        </div>
    </div>
</div>