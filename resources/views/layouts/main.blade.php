<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/script.js', 'resources/js/modal.js'])
    {{-- @stack('scripts') --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>
    <title>SIMPRO</title>
</head>

<body>
    @yield('body')
</body>

</html>