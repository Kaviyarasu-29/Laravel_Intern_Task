@extends('layouts.user')
@section('title', 'Users')
@section('main-content')

    <section>
        <form method="get" action="{{ route('auth.logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
        @if (session('success'))
            <script>
                var userName = '{{ session('success') }}';
                alert('Welcome back ' + userName);
                // alert({{ session('success') }});
            </script>
        @endif

        {{-- <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Welcome back, " + {{ auth()->user()->name }},
                showConfirmButton: false,
                timer: 2000
            });
        </script> --}}
        <script>
            alert('Welcome back, ' + {{ auth()->user()->name }})
        </script>
        {{-- <script>
            console.log('Before Swal.fire');
            Swal.fire({
                // position: 'top-end',
                icon: 'success',
                title: 'Hello!',
                // text:{{auth()->user()->name}}
                showConfirmButton: false,
                // timer: 2000
            });
            console.log('After Swal.fire');
        </script> --}}

        <div>
            {{-- @dd(auth()->user()->name) --}}
            <h1> {{ auth()->user()->name }} </h1>
            <h3 class="alert alert-danger ">List of stores userd</h3>

            <div class="nav">

                <a href="{{ route('users.create') }}">create new user!</a>
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
                                <div class="profile-image">
                                    <img src="{{asset($user->image)}}" alt="{{$user->name}}">

                                </div>
                                <div class="btn alert alert-primary">
                                    <a href="{{ route('users.show', $user->id) }}">Show more Details of
                                        {{ $user->name }}
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
    </section>
@endsection
