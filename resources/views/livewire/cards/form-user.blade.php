<div>
    @if ($email != null)
        <form class="flex flex-col" wire:submit.prevent="update">
            <div class="mb-5 pt-1 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="nama">Nama</label>
                <input type="text" id="nama" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-1" wire:model="nama" autofocus autocomplete="off" {{ $status == 'detail' ? 'disabled' : '' }}/>
            </div>
            @error('nama')    
                <div class="-mt-5 mb-5 text-red-500 ml-2">
                    {{ $message }}
                </div>
            @enderror
            <div class="mb-5 pt-1  rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="number">No HP</label>
                <input type="number" id="number" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-1" wire:model="no_hp" autofocus autocomplete="off" {{ $status == 'detail' ? 'disabled' : '' }}/>
            </div>
            @error('no_hp')    
                <div class="-mt-5 mb-5 text-red-500 ml-2">
                    {{ $message }}
                </div>
            @enderror
            <div class="mb-5 pt-1  rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="rt">RT</label>
                <input type="number" id="rt" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-1" wire:model="rt" autofocus autocomplete="off" disabled />
            </div>
            <div class="mb-5 pt-1  rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="rt">RW</label>
                <input type="number" id="rt" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-1" wire:model="rw" autofocus autocomplete="off" disabled/>
            </div>
            <div class="mb-5 pt-1  rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="rt">Role</label>
                <input type="text" id="rt" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-1" wire:model="role" autofocus autocomplete="off" disabled/>
            </div>
            <div class="mb-5 pt-1 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="email">Email</label>
                <input type="text" id="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3" wire:model="email" autofocus autocomplete="off" {{ $status == 'detail' ? 'disabled' : '' }}/>
            </div>
            @error('email')    
                <div class="-mt-5 mb-6 text-red-500 ml-2">
                    {{ $message }}
                </div>
            @enderror
            <div class="mb-5 pt-1 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="password">Password</label>
                <input type="password" id="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-1" wire:model="password"/>
            </div>
            @error('password')    
                <div class="-mt-5 mb-5 text-red-500 ml-2">
                    {{ $message }}
                </div>
            @enderror
            <button class="bg-[#3069e4] hover:bg-[#1a449e] text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Ubah</button>
        </form>      
    @elseif($status != 'detail')
        <form class="flex flex-col" action="{{ route('akun.store') }}" method="POST">
            @csrf
            <div class="mb-5 pt-1 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="nama">Nama</label>
                <input type="text" id="nama" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-1" name="nama" autofocus autocomplete="off"/>
            </div>
            @error('nama')    
                <div class="-mt-5 mb-5 text-red-500 ml-2">
                    {{ $message }}
                </div>
            @enderror
            <div class="mb-5 pt-1  rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="number">No HP</label>
                <input type="number" id="number" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-1" name="no_hp" autocomplete="off"/>
            </div>
            @error('no_hp')    
                <div class="-mt-5 mb-5 text-red-500 ml-2">
                    {{ $message }}
                </div>
            @enderror
            <div class="mb-5 pt-1  rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="rt">RT</label>
                <input type="number" id="rt" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-1" name="rt" autocomplete="off" />
            </div>
            @error('rt')    
                <div class="-mt-5 mb-5 text-red-500 ml-2">
                    {{ $message }}
                </div>
            @enderror
            <div class="mb-5 pt-1  rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="rt">RW</label>
                <input type="number" id="rt" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-1" name="rw" autocomplete="off"/>
            </div>
            @error('rw')    
                <div class="-mt-5 mb-5 text-red-500 ml-2">
                    {{ $message }}
                </div>
            @enderror
            <div class="mb-5 pt-1  rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="rt">Role</label>
                <select class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-1" id="role" name="role">
                    <option value="1">Admin</option>
                    <option value="2">Petugas</option>
                </select>
            </div>
            @error('role')    
                <div class="-mt-5 mb-5 text-red-500 ml-2">
                    {{ $message }}
                </div>
            @enderror
            <div class="mb-5 pt-1 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="email">Email</label>
                <input type="text" id="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3" name="email" autocomplete="off"/>
            </div>
            @error('email')    
                <div class="-mt-5 mb-6 text-red-500 ml-2">
                    {{ $message }}
                </div>
            @enderror
            <div class="mb-5 pt-1 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="password">Password</label>
                <input type="password" id="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-1" name="password"/>
            </div>
            @error('password')    
                <div class="-mt-5 mb-5 text-red-500 ml-2">
                    {{ $message }}
                </div>
            @enderror
            <button class="bg-[#3069e4] hover:bg-[#1a449e] text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Buat</button>
        </form>
    @endif
    @if ($status == 'detail')
        <form action="{{ route('akun.update') }}" method="post">
            @csrf
            <input type="hidden" name="id" x-model="dataAccount.id">
            <div class="mb-5 pt-1 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="nama">Nama</label>
                <input type="text" id="nama" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-1" name="nama" autofocus autocomplete="off" x-model="dataAccount.nama"/>
            </div>
            <div class="mb-5 pt-1  rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="number">No HP</label>
                <input type="number" id="number" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-1" name="no_hp" autocomplete="off" x-model="dataAccount.no_hp"/>
            </div>
            <div class="mb-5 pt-1  rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="rt">RT</label>
                <input type="number" id="rt" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-1" name="rt" autocomplete="off" x-model="dataAccount.rt"/>
            </div>
            <div class="mb-5 pt-1  rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="rt">RW</label>
                <input type="number" id="rt" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-1" name="rw" autocomplete="off" x-model="dataAccount.rw"/>
            </div>
            <div class="mb-5 pt-1 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="email">Email</label>
                <input type="text" id="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3" name="email" autocomplete="off" x-model="dataAccount.email"/>
            </div>
            <div class="mb-5 pt-1 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="password">Password</label>
                <input type="password" id="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3" autocomplete="off" name="password"/>
            </div>
            <button class="bg-[#3069e4] hover:bg-[#1a449e] text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200 w-full" type="submit">Ubah</button>
        </form>
    @endif
</div>
