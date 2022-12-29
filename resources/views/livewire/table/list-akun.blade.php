<div class="w-full mt-12">
    @if ($page == 'buat')
        <button @click="createAccount=true" class="rounded-lg bg-blue-500 py-2 px-4 mb-2 text-white hover:bg-blue-800">Buat Akun</button>
    @endif
    @livewire('cards.form-create')
    <div class="bg-white overflow-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-[5%] text-center py-3 px-4 uppercase font-semibold text-sm">No</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">No HP</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Role</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">RT</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">RW</th>
                    <th class="w-[12%] text-center py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @livewire('cards.accounts')
                @foreach ($accounts as $account)
                    <tr>
                        <td class="w-[5%] text-center py-3 px-4">{{ $loop->iteration }}</td>
                        <td class="text-center py-3 px-4">{{ $account->nama }}</td>
                        <td class="text-center py-3 px-4">{{ $account->no_hp }}</td>
                        <td class="text-center py-3 px-4">
                            @if ($account->role == 1)
                                Admin
                            @elseif($account->role == 2)
                                Petugas
                            @else
                                Warga
                            @endif
                        </td>
                        <td class="text-center py-3 px-4">{{ $account->rt }}</td>
                        <td class="text-center py-3 px-4">{{ $account->rw }}</td>
                        <td class="text-center py-3 px-4 flex items-center justify-around gap-2">
                            @if($page == 'trash')
                                <a href="{{ route('akun.restore', $account->id) }}" class="bg-green-400 py-2 px-3 rounded-lg text-slate-600 hover:text-white hover:bg-green-700">Restore</a>
                                <form action="{{ route('akun.destroy') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $account->id }}">
                                    <button type="submit" class="bg-red-500 rounded-lg text-slate-600 hover:text-white hover:bg-red-700 py-2 px-3">Delete</button>
                                </form>
                            @elseif($page == 'buat')
                                @if (auth()->user()->id != $account->id)
                                    <button @click="test('{{ $account }}')" class="bg-yellow-400 py-2 px-3 rounded-lg text-slate-600 hover:text-white hover:bg-yellow-700">Detail</button>
                                    <form action="{{ route('akun.delete') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $account->id }}">
                                        <button type="submit" class="bg-red-500 rounded-lg text-slate-600 hover:text-white hover:bg-red-700 py-2 px-3">Delete</button>
                                    </form>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>