<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UserHome page</title>

    @vite(['resources/js/app.js'])
</head>
  
<body class="container">

    <div>
        <h3>List of stores userd</h3>
        @if (session('Message'))
            <div class="alert alert-success">
                {{ session('Message') }}
            </div>
        @endif
        @if ($users->isNotEmpty())
            <ul>
                @foreach ($users as $user)
                    <li>
                        <div style="align-items: center; justify-content:space-around">
                            <div style="">{{ $user->name }}</div>
                            <div style="">{{ $user->email }}</div>
                            <div style="">{{ $user->age }}</div>
                            <div class="btn">
                                <a href="/userDetails/{{ $user->id }}">Show Complete Details</a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div style="display: flex; justify-content: center; align-items: center;">
                <p class="mb-0 ">No student data</p>
            </div>
        @endif
    </div>

</body>

</html>
