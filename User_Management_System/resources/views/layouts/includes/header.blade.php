<header class="bg-dark text-white px-3 py-2 d-flex align-items-center justify-content-between row sticky-top">
    <div class="header d-flex align-items-center justify-content-between">
        <div class="logo col-4">
            <div class=" ">
                <img class="header-logo" src="{{ asset('images/K-logo.png') }}" class="rounded" alt="...">
            </div>
        </div>
        <div class="navbar-and-profile  d-flex align-items-center justify-content-end col-8">

            <div class="navbar  d-flex align-items-center justify-content-end col-8 text-center">
                <nav class="navbar navbar-expand-lg w-100">
                    <div class="collapse navbar-collapse  d-flex align-items-center justify-content-between w-100">
                        <ul class="navbar-nav mr-auto w-100  d-flex align-items-center justify-content-between">
                            <li class="nav-item poppins-medium-italic px-2 w-25">
                                <a class="nav-link text-white" href="{{ route('auth.profile') }}">PROFILE</a>
                            </li>
                            <li class="nav-item poppins-medium-italic px-2 w-25">
                                <a class="nav-link text-white" href="{{ route('users.create') }}">CREATE</a>
                            </li>
                            <li class="nav-item poppins-medium-italic px-2 w-25">
                                <a class="nav-link text-white" href="{{ route('users.index') }}">DASHBOARD</a>
                            </li>

                            <li class="nav-item poppins-medium-italic px-2 w-25">
                                <a class="nav-link text-white" href="{{ route('auth.logout') }} "
                                    onclick="return confirm('Are you sure you want to logout?');">LOGOUT!</a>
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
