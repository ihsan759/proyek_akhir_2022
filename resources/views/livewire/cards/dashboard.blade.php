<div>
    <h1 class="text-3xl text-black pb-6">Dashboard</h1>
    <p class="text-xl text-black">Gender</p>
    <div class="flex flex-wrap mt-3 items-start">
        <div class="w-full lg:w-1/2 pr-0 lg:pr-2 shadow-lg">
            <div class="p-6 bg-white">
                <p class="text-xl pb-3 flex items-center">
                    Jumlah Pria : {{ $countpria }}
                </p>
            </div>
        </div>
        <div class="w-full lg:w-1/2 pl-0 lg:pl-2 mt-12 lg:mt-0 shadow-lg">
            <div class="p-6 bg-white">
                <p class="text-xl pb-3 flex items-center">
                    Jumlah Wanita : {{ $countwanita }}
                </p>
            </div>
        </div>
    </div>
    <p class="text-xl text-black mt-10">Status Perkawinan</p>
    <div class="flex flex-wrap mt-3 items-start">
        <div class="w-full lg:w-1/3 pl-0 lg:pl-2 lg:mt-0 shadow-lg">
            <div class="p-6 bg-white">
                <p class="text-xl pb-3 flex items-center">
                    Jumlah Yang Sudah Menikah : {{ $kawin }}
                </p>
            </div>
        </div>
        <div class="w-full lg:w-1/3 pl-0 lg:pl-2 mt-12 lg:mt-0 shadow-lg">
            <div class="p-6 bg-white">
                <p class="text-xl pb-3 flex items-center">
                    Jumlah Yang Belum Menikah : {{ $belum_kawin }}
                </p>
            </div>
        </div>
        <div class="w-full lg:w-1/3 pl-0 lg:pl-2 mt-12 lg:mt-0 shadow-lg">
            <div class="p-6 bg-white">
                <p class="text-xl pb-3 flex items-center">
                    Jumlah Duda / Janda : {{ $janda }}
                </p>
            </div>
        </div>
    </div>
</div>
