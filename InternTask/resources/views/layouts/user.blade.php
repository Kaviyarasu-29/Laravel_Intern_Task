{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title') </title>

    @vite(['resources/js/app.js'])


</head>

<body class="container">

    @include('layouts.includes.header')

    @yield('main-content')

    @include('layouts.includes.footer')
</body>

</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite(['resources/js/app.js'])
</head>

<body class="container">
    @include('layouts.includes.header')
    @yield('main-content')
    @include('layouts.includes.footer')
</body>

</html>
