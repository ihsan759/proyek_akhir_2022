<section class="bg-gradient-to-r from-[#9921e8] via-purple-500 to-[#5f72be] min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0" style="font-family: 'Lato', sans-serif">
    <div class="max-w-lg mx-auto">
        <h1 class="text-4xl font-bold text-white text-center">E-Lurah</h1>
    </div>

    <div class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
      <section>
        <h3 class="font-bold text-2xl text-center">Welcome to E-lurah</h3>
        <p class="text-gray-600 pt-2 text-center">Silahkan Login Terlebih Dahulu</p>
      </section>

      <section class="mt-10">
        <form class="flex flex-col" wire:submit.prevent="submit">
            @csrf
          <div class="mb-6 pt-3 rounded bg-gray-200">
            <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Email</label>
            <input type="email" id="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" name="email" autofocus autocomplete="off"/>
          </div>
          <div class="mb-6 pt-3 rounded bg-gray-200">
            <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Password</label>
            <input type="password" id="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" name="password"/>
          </div>
          <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Sign In</button>
        </form>
      </section>
    </div>
</section>
