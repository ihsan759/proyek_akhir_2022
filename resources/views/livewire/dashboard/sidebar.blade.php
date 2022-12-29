<aside class="relative bg-[#3d68ff] h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="{{ route('home') }}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">
            @if (auth()->user()->role == 1)
                Admin
            @elseif(auth()->user()->role == 2)
                Petugas
            @else
                Warga
            @endif
        </a>
    </div>
    <nav class="text-white text-base font-semibold pt-3" x-data="{warga: false, dokumen: false, akun: false}">
        <a href="{{ route('home') }}" class="flex items-center  text-white py-4 pl-6 hover:bg-[#1947ee] {{ (request()->is('home')) ? 'bg-[#1947ee]' : '' }} ">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </a>
        <button @click="warga = !warga"  class="flex items-center w-full text-white opacity-75 hover:opacity-100 py-4 pl-6 hover:bg-[#1947ee] {{ (request()->is('warga/*')) ? 'bg-[#1947ee]' : '' }}">
            <i class="fas fa-users mr-3"></i>
            Warga
        </button>
        <!-- Dropdown warga -->
        <div x-show="warga" class="right-0 py-2 mt-2 rounded-md shadow-xl ">
            @if (auth()->user()->role == 2)    
                <a href="{{ route('warga.create') }}" class="block px-4 py-2 text-sm text-white opacity-75 hover:opacity-100 hover:bg-[#1947ee]">
                    Daftar Warga
                </a>
            @endif
            <a href="{{ route('warga.index') }}" class="block px-4 py-2 text-sm text-white hover:bg-[#1947ee] opacity-75 hover:opacity-100">
                List Warga
            </a>
        </div>
        <button @click="dokumen = !dokumen" class="flex items-center text-white opacity-75 hover:opacity-100 w-full py-4 pl-6 hover:bg-[#1947ee] {{ (request()->is('dokumen/*')) ? 'bg-[#1947ee]' : '' }}">
            <i x-show="!dokumen" class="fas fa-folder mr-3"></i>
            <i x-show="dokumen" class="fas fa-folder-open mr-3"></i>
            Dokumen
        </button>
        <!-- Dropdown dokumen -->
        <div x-show="dokumen" class="right-0 py-2 mt-2 rounded-md shadow-xl ">
            @if (auth()->user()->role == 2)    
                <a href="{{ route('dokumen.create') }}" class="block px-4 py-2 text-sm text-white opacity-75 hover:opacity-100 hover:bg-[#1947ee]">
                    Create Dokumen
                </a>
            @endif
            <a href="{{ route('dokumen.pending') }}" class="block px-4 py-2 text-sm text-white opacity-75 hover:opacity-100 hover:bg-[#1947ee]">
                Dokumen Pending
            </a>
            <a href="{{ route('dokumen.approve') }}" class="block px-4 py-2 text-sm text-white hover:bg-[#1947ee] opacity-75 hover:opacity-100">
                Dokumen Approve
            </a>
            <a href="{{ route('dokumen.reject') }}" class="block px-4 py-2 text-sm text-white hover:bg-[#1947ee] opacity-75 hover:opacity-100">
                Dokumen Reject
            </a>
            @if (auth()->user()->role == 2)    
                <a href="{{ route('dokumen.trash') }}" class="block px-4 py-2 text-sm text-white hover:bg-[#1947ee] opacity-75 hover:opacity-100">
                    Dokumen Trash
                </a>
            @endif
        </div>
        <button @click="akun = !akun" class="flex items-center text-white opacity-75 w-full hover:opacity-100 py-4 pl-6 hover:bg-[#1947ee] {{ (request()->is('akun/*')) ? 'bg-[#1947ee]' : '' }}">
            <i class="fas fa-user mr-3"></i>
            Akun
        </button>
        <!-- Dropdown akun -->
        <div x-show="akun" class="right-0 py-2 mt-2 rounded-md shadow-xl ">
            <a href="{{ route('akun') }}" class="block px-4 py-2 text-sm text-white opacity-75 hover:opacity-100 hover:bg-[#1947ee]">
                Daftar Akun
            </a>
            <a href="{{ route('akun.trash') }}" class="block px-4 py-2 text-sm text-white hover:bg-[#1947ee] opacity-75 hover:opacity-100">
                Akun Tidak Aktif
            </a>
        </div>
    </nav>
</aside>