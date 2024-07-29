{{-- <!-- Header -->
<header class="bg-dark p-3 header" style="color: white">
    <div class="logo">
        <h2>FirstSite</h2>
    </div>
    <nav class="navbar">
        <a href="{{route('users.create')}}">Create user</a>
        <a href="{{route('users.index')}}">Dashboard</a>
        <a href="{{route('auth.logout')}}">Logout</a>
    </nav>
    <div class="user-profile">
        <img src="{{asset(auth()->user()->image)}}" alt="No profile image from {{auth()->user()->name}}">
    </div>
</header> --}}

<header class="bg-dark text-white p-3 d-flex align-items-center justify-content-between row sticky-top">
    <div class="header d-flex align-items-center justify-content-between">
        <div class="logo col-4">
            <div class=" ">
                <img class="header-logo" src="{{ asset('images/K-logo.png') }}" class="rounded" alt="...">
            </div>
        </div>
        <div class="navbar-and-profile  d-flex align-items-center justify-content-end col-8">

            <div class="navbar  d-flex align-items-center justify-content-end col-6">
                <nav class="navbar navbar-expand-lg w-100">
                    <div class="collapse navbar-collapse  d-flex align-items-center justify-content-between w-100">
                        <ul class="navbar-nav mr-auto w-100  d-flex align-items-center justify-content-between">
                            <li class="nav-item poppins-medium-italic px-2">
                                <a class="nav-link text-white" href="{{ route('auth.profile') }}">PROFILE</a>
                            </li>
                            <li class="nav-item poppins-medium-italic px-2">
                                <a class="nav-link text-white" href="{{ route('users.create') }}">CREATE</a>
                            </li>
                            <li class="nav-item poppins-medium-italic px-2">
                                <a class="nav-link text-white" href="{{ route('users.index') }}">DASHBOARD</a>
                            </li>

                            <li class="nav-item poppins-medium-italic px-2">
                                <a class="nav-link text-white" href="{{ route('auth.logout') }}">LOGOUT!</a>
                            </li>


                        </ul>
                    </div>
                </nav>
            </div>
            {{-- <div class="user-profile d-flex align-items-center ">
            <img src="{{ asset(auth()->user()->image) }}" alt="No profile image from {{ auth()->user()->name }}"
                class="rounded-circle" width="40" height="40">
        </div> --}}

        </div>
    </div>
</header>
