<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite(['resources/js/app.js'])
    {{-- <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script> --}}



</head>

<body>
    @include('layouts.includes.header')
    @yield('main-content')
    @include('layouts.includes.footer')
</body>

</html>
