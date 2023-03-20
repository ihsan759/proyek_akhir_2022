<div x-show="myaccount" class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
    <div @click.away="myaccount = false" class="max-w-lg w-full px-6 py-3  bg-white ">
        <div class="flex items-center justify-between">
            <h3 class="text-2xl">Profile</h3>
            <button @click="myaccount=false"
                class="text-black hover:text-white duration-200 font-bold hover:bg-red-700 rounded-md hover:border-black border-transparent border px-3 py-1 text-2xl">X</button>
        </div>
        <div class="mt-4">
            @livewire('cards.form-user', ['nama' => auth()->user()->nama, 'no_hp' => auth()->user()->no_hp, 'rt' => auth()->user()->rt, 'rw' => auth()->user()->rw, 'role' => auth()->user()->role, 'email' => auth()->user()->email])
        </div>
    </div>
</div>
