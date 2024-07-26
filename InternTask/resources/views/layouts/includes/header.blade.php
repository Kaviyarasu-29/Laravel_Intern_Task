<!-- Header -->
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
</header>
