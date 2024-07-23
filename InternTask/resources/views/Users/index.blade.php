<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UserHome page</title>

    @vite(['resources/js/app.js'])
</head>

<body class="container">

    {{-- logout btn --}}
    <form method="get" action="{{route('auth.logout')}}">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <div>
        <h3>List of stores userd</h3>

        <div class="nav">

        <a href="{{route('users.create')}}">create new user!</a>
        </div>

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
                                <a href="{{ route('users.show', $user->id) }}">Show more Details of {{ $user->name }}
                                </a>
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
