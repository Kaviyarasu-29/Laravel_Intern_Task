<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>User Details - {{ $user->name }}</title>

    @vite(['resources/js/app.js'])


</head>

<body class="container">
    {{-- logout btn --}}
    <form method="get" action="{{route('auth.logout')}}">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <div class="nav">
        <a href="{{route('users.index')}}">Back to User List</a>
        <br>
        <a href="{{route('users.create')}}">create new user!</a>
    </div>
    <h1 class="alert alert-primary">
        {{ $user->name }} - Details
    </h1>
    @if (session('Message'))
        <div class="alert alert-success">
            {{ session('Message') }}
        </div>
    @endif

    <div class="require-error-message">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="all-details">
        <ul>
            <li>Name: {{ $user->name }}</li>
            <li>Email: {{ $user->email }}</li>
            <li>Mobile: {{ $user->mobile }}</li>
            <li>Date of Birth: {{ $user->dob }}</li>
            <li>Age: {{ $user->age }}</li>
            <li>Gender: {{ $user->gender }}</li>
            <li>Job: {{ $user->job }}</li>
        </ul>
    </div>

    <h2 class="edit-details" id="edit-details">Edit Details
        <div class="filled-arrow" id="filled-arrow" onmouseover="filled_arrow_over(this)"
            onmouseout="filled_arrow_out(this)">
            <x-tabler-circle-arrow-down-filled />
        </div>
        <div class="empty-arrow" id="empty-arrow" onmouseover="empty_arrow_over(this)"
            onmouseout="empty_arrow_out(this)">
            <x-tabler-circle-arrow-down />
        </div>
    </h2>
    <form action="{{ route('users.update',$user->id) }}" method="POST" class="edit-details-content"
        id="edit-details-content">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}">
        </div>
        <div>
            <label for="mobile">Mobile: </label>
            <input type="mobile" name="mobile" value="{{ $user->mobile }}">
        </div>
        <div>
            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" value="{{ $user->dob }}">
        </div>
        <div>
            <label for="age">Age:</label>
            <input type="number" name="age" value="{{ $user->age }}">
        </div>
        <div>
            <label for="job">Job:</label>
            <input type="text" name="job" value="{{ $user->job }}">
        </div>
        <button type="submit" name="updatebtn" class="btn btn-primary">Update Details</button>
    </form>

    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
            onclick="return confirm('Are you sure you want to delete this user?');">Delete User</button>
    </form>



</body>

</html>
