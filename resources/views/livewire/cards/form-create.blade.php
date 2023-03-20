<div x-show="createAccount" class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
    <div @click.away="createAccount = false" class="max-w-lg w-full px-6 py-3  bg-white ">
        <div class="flex items-center justify-between">
            <h3 class="text-2xl">Buat Akun</h3>
            <button @click="createAccount=false"
                class="text-black hover:text-white duration-200 font-bold hover:bg-red-700 rounded-md hover:border-black border-transparent border px-3 py-1 text-2xl">X</button>
        </div>
        <div class="mt-4">
            @livewire('cards.form-user')
        </div>
    </div>
</div>
