<div x-show="Pesan" class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
    <div @click.away="Pesan = false" class="max-w-lg w-full px-6 py-3  bg-white ">
        <div class="text-center">
            <h3 class="text-2xl">Notifikasi</h3>
        </div>
        <div class="mt-4">
            <template x-if="dataPesan.keterangan">
                <p x-text="dataPesan.keterangan"></p>
            </template>
            <template x-if="!dataPesan.keterangan">
                <form action="{{ route('dokumen.status') }}" method="post" class="text-center">
                    @csrf
                    <input type="hidden" name="id" x-model="dataPesan.id">
                    <input type="hidden" name="status" value="3">
                    <textarea name="keterangan" id="" cols="30" rows="10" class="mx-auto block border border-blue-300"></textarea>
                    <button type="submit">Ubah Status</button>
                </form>
            </template>
        </div>
    </div>
</div>