@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 flex">
        @livewire('dashboard.sidebar')
        <div class="w-full flex flex-col h-screen overflow-y-hidden">
            @livewire('dashboard.header')
            @livewire('dashboard.sidebar-mobile')
            <div class="w-full overflow-x-hidden border-t flex flex-col">
                <main class="w-full flex-grow p-6">
                    @if ($message = Session::get('message'))
                        @livewire('dashboard.info', ['message' => $message])
                    @endif
                    @livewire('cards.profile')
                    <p class="text-4xl text-center">List Akun</p>
                    @livewire('table.list-akun', ['page' => 'buat'])
                </main>
            </div>
        </div>
    </div>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
@endsection
