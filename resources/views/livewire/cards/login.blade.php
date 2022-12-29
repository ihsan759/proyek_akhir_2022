<section class="bg-gradient-to-r from-[#3069e4] via-purple-500 to-[#2988e0] min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0" style="font-family: 'Lato', sans-serif">
    <div class="max-w-lg mx-auto">
        <h1 class="text-4xl font-bold text-white text-center">E-Lurah</h1>
    </div>
    <div class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
      <section>
        <h3 class="font-bold text-2xl text-center">Welcome to E-lurah</h3>
        <p class="text-gray-600 pt-2 text-center">Silahkan Login Terlebih Dahulu</p>
        @if (session()->has('error'))
            <div class="text-center mt-3 text-red-500">
                {{ session('error') }}
            </div>
        @endif
      </section>

      <section class="mt-10">
        <form class="flex flex-col" wire:submit.prevent="login">
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Email</label>
                <input type="text" id="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3" wire:model="email" autofocus autocomplete="off"/>
            </div>
            @error('email')    
                <div class="-mt-6 mb-6 text-red-500 ml-2">
                    {{ $message }}
                </div>
            @enderror
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Password</label>
                <input type="password" id="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3" wire:model="password"/>
            </div>
            @error('password')    
                <div class="-mt-6 mb-6 text-red-500 ml-2">
                    {{ $message }}
                </div>
            @enderror
            <button class="bg-[#3069e4] hover:bg-[#1a449e] text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Sign In</button>
        </form>
      </section>
    </div>
</section>
