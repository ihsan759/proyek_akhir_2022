<div x-show="Pesan" class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
    <div @click.away="Pesan = false" class="max-w-lg w-full px-6 py-3  bg-white ">
        <div class="text-center">
            <template x-if="dataPesan.keterangan">
                <h3 class="text-2xl">Notifikasi</h3>
            </template>
            <template x-if="!dataPesan.keterangan">
                <h3 class="text-2xl">Reject Dokumen</h3>
            </template>
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
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message</label>
                    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="keterangan" placeholder="Write your thoughts here..."></textarea>
                    @error('keterangan')    
                        <div class="mt-2 text-red-500 ml-2">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-3">Ubah Status</button>
                </form>
            </template>
        </div>
    </div>
</div>