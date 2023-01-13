<div class="bg-white lg:w-1/2 mx-auto rounded-lg shadow-lg mt-10">
    <form action="{{ route('dokumen.store') }}" method="post" enctype="multipart/form-data" class="py-5">
        @csrf
        <div class="px-3">
            <label>Nama File</label>
            <input type="text" name="nama"
                class="w-full bg-gray-200 py-3 px-2 rounded shadow-sm border border-gray-200 focus:outline-none mt-2"
                value="{{ old('nama') }}">
            @error('nama')
                <div class="text-red-500">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mt-3 px-3">
            <label>File</label>
            <input type="file" name="file"
                class="w-full bg-gray-200 p-2 rounded shadow-sm border border-gray-200 focus:outline-none mt-2">
            @error('file')
                <div class="text-red-500">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="px-3 mt-5">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-800 text-white px-3 py-2 rounded-lg w-full">Upload</button>
        </div>
    </form>
</div>
