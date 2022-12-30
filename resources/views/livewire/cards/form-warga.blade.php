<div class="lg:flex items-start mt-10 gap-7">
    <div class="bg-white mx-auto rounded-lg shadow-lg w-full mb-7">
        <form action="{{ route('warga.ktp.store') }}" method="post" class="py-5">
            @csrf
            <h1 class="text-center text-lg">Form Data Warga</h1>
            <div class="px-3">
                <label>NIK</label>
                <input type="number" name="nik" class="w-full bg-gray-200 py-3 px-2 rounded shadow-sm border border-gray-200 focus:outline-none mt-2">
                @error('nik')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-3 px-3">
                <label>Nama Warga</label>
                <input type="text" name="nama" class="w-full bg-gray-200 py-3 px-2 rounded shadow-sm border border-gray-200 focus:outline-none mt-2">
                @error('nama')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-3 px-3">
                <label>Gender</label>
                <select class="w-full bg-gray-200 py-3 px-2 rounded shadow-sm border border-gray-200 focus:outline-none mt-2" id="gender" name="gender">
                    <option value="1">Pria</option>
                    <option value="2">Wanita</option>
                </select>
                @error('gender')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-3 px-3">
                <label>Agama</label>
                <select class="w-full bg-gray-200 py-3 px-2 rounded shadow-sm border border-gray-200 focus:outline-none mt-2" id="id_agama" name="id_agama">
                    @foreach ($agamas as $agama)
                        <option value="{{$agama->id}}">{{$agama->nama}}</option>
                    @endforeach
                </select>
                @error('id_agama')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-3 px-3">
                <label>Gol Darah</label>
                <select class="w-full bg-gray-200 py-3 px-2 rounded shadow-sm border border-gray-200 focus:outline-none mt-2" id="gol_darah" name="gol_darah">
                    <option value="1">A</option>
                    <option value="2">B</option>
                    <option value="3">AB</option>
                    <option value="4">O</option>
                </select>
                @error('gol_darah')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-3 px-3">
                <label>No Kartu Keluarga</label>
                <select class="w-full bg-gray-200 py-3 px-2 rounded shadow-sm border border-gray-200 focus:outline-none mt-2" id="id_kk" name="id_kk">
                    @foreach ($kk as $kartu)
                        <option value="{{$kartu->id_kk}}">{{$kartu->id_kk}}</option>
                    @endforeach
                </select>
                @error('id_kk')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="px-3 mt-3">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="w-full bg-gray-200 py-3 px-2 rounded shadow-sm border border-gray-200 focus:outline-none mt-2">
                @error('tgl_lahir')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="px-3 mt-3">
                <label>Pekerjaan</label>
                <input type="text" name="pekerjaan" class="w-full bg-gray-200 py-3 px-2 rounded shadow-sm border border-gray-200 focus:outline-none mt-2">
                @error('pekerjaan')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-3 px-3">
                <label>Status Perkawinan</label>
                <select class="w-full bg-gray-200 py-3 px-2 rounded shadow-sm border border-gray-200 focus:outline-none mt-2" id="status_perkawinan" name="status_perkawinan">
                    <option value="1">Belum Kawin</option>
                    <option value="2">Sudah Kawin</option>
                    <option value="3">Janda/Duda</option>
                </select>
                @error('status_perkawinan')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="px-3 mt-5">
                <button type="submit" class="bg-blue-500 hover:bg-blue-800 text-white px-3 py-2 rounded-lg w-full">Submit</button>
            </div>
        </form>
    </div>
    <div class="bg-white mx-auto rounded-lg shadow-lg w-full">
        <form action="{{ route('warga.kk.store') }}" method="post" class="py-5">
            @csrf
            <h1 class="text-center text-lg mb-5">Form Data Kartu Keluarga</h1>
            <div class="px-3">
                <label>Nomor Kartu Keluarga</label>
                <input type="number" name="id_kk" class="w-full bg-gray-200 py-3 px-2 rounded shadow-sm border border-gray-200 focus:outline-none mt-2">
                @error('id_kk')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-3 px-3">
                <label>Alamat</label>
                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="alamat" placeholder="Write your thoughts here..."></textarea>
                @error('alamat')    
                    <div class="mt-2 text-red-500 ml-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="px-3 mt-5">
                <button type="submit" class="bg-blue-500 hover:bg-blue-800 text-white px-3 py-2 rounded-lg w-full">Submit</button>
            </div>
        </form>
    </div>
</div>
