<div x-show="createAccount" class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
    <div @click.away="createAccount = false" class="max-w-lg w-full px-6 py-3  bg-white ">
        <div class="flex items-center justify-between">
            <h3 class="text-2xl">Buat Akun</h3>
            <svg @click="createAccount=false" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div class="mt-4">
            @livewire('cards.form-user')
        </div>
    </div>
</div>