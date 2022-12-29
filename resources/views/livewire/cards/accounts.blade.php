<div x-show="Accounts" class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
    <div @click.away="Accounts = false" class="max-w-lg w-full px-6 py-3  bg-white ">
        <div class="text-center">
            <h3 class="text-2xl">Profile Account</h3>
        </div>
        <div class="mt-4">
            @livewire('cards.form-user',['status' => 'detail'])
        </div>
    </div>
</div>