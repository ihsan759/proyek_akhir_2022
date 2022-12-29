<div class="w-full mt-12">
    @livewire('cards.form-create')
    <div class="bg-white overflow-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-[5%] text-center py-3 px-4 uppercase font-semibold text-sm">No</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Status</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Admin</th>
                    <th class="w-[12%] text-center py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @livewire('cards.notifikasi')
                @foreach ($dokumen as $data)
                    <tr>
                        <td class="w-[5%] text-center py-3 px-4">{{ $loop->iteration }}</td>
                        <td class="text-center py-3 px-4">{{ $data->nama }}</td>
                        <td class="text-center py-3 px-4">
                            @if ($data->status == 1)
                                Pending
                            @elseif($data->status == 2)
                                Approve
                            @else
                                Reject
                            @endif
                        </td>
                        <td class="text-center py-3 px-4">
                            @if ($data->dokumenAdmin != null)
                                {{$data->dokumenAdmin->nama}}
                            @else
                                Belum diperiksa
                            @endif    
                        </td>
                        <td class="text-center py-3 px-4 flex items-center justify-around gap-2">
                            @if ($data->deleted_at == null)
                                <a href="{{ route('dokumen.download', $data->id) }}" class="bg-green-400 py-2 px-3 rounded-lg text-slate-600 hover:text-white hover:bg-green-700">Donwload</a>
                                @if ($data->status == 3)
                                    <button @click="pesandokumen('{{ $data }}')" type="submit" class="bg-yellow-500 rounded-lg text-slate-600 hover:text-white hover:bg-yellow-700 py-2 px-3">Info</button>
                                @elseif($data->status == 1)
                                    @if (auth()->user()->role == 2)
                                        <form action="{{ route('dokumen.delete') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                            <button type="submit" class="bg-red-500 rounded-lg text-slate-600 hover:text-white hover:bg-red-700 py-2 px-3">Delete</button>
                                        </form>
                                    @else
                                        <button @click="pesandokumen('{{ $data }}')" type="submit" class="bg-red-500 rounded-lg text-slate-600 hover:text-white hover:bg-red-700 py-2 px-3">Reject</button>
                                        <form action="{{ route('dokumen.status') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                            <input type="hidden" name="status" value="2">
                                            <button type="submit" class="bg-blue-500 rounded-lg text-slate-600 hover:text-white hover:bg-blue-700 py-2 px-3">Approve</button>
                                        </form>
                                    @endif
                                @endif
                            @else
                                <a href="{{ route('dokumen.restore', $data->id) }}" class="bg-green-400 py-2 px-3 rounded-lg text-slate-600 hover:text-white hover:bg-green-700">Restore</a>
                                <form action="{{ route('dokumen.destroy') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                    <button type="submit" class="bg-red-500 rounded-lg text-slate-600 hover:text-white hover:bg-red-700 py-2 px-3">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>