<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>E-Lurah</title>
    <meta name="author" content="Ichsan" />
    <meta name="description" content="" />
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite('resources/css/app.css')
    @livewireStyles
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet" />
  </head>
  <body>
    @livewire('auth.login')
    @livewireScripts
  </body>
</html>
