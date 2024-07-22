<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>User Details - {{ $user->name }}</title>

    @vite(['resources/js/app.js'])
</head>

<body class="container">
    <h1 class="alert alert-primary">
        {{ $user->name }} - Details
    </h1>

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

    <h2>Edit Details</h2>
    <form action="/updateUser/{{$user->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" >
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" >
        </div>
        <div>
            <label for="mobile">Mobile: </label>
            <input type="mobile" name="mobile" value="{{ $user->mobile }}"  >
        </div>
        <div>
            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" value="{{ $user->dob }}" >
        </div>
        <div>
            <label for="age">Age:</label>
            <input type="number" name="age" value="{{ $user->age }}" >
        </div>
        {{-- <div>
            <label for="gender">Gender:</label>
            <select name="gender" >
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
        </div> --}}
        <div>
            <label for="job">Job:</label>
            <input type="text" name="job" value="{{ $user->job }}" >
        </div>
        <button type="submit" name="updatebtn" class="btn btn-primary">Update Details</button>
    </form>

    <form action="/deleteUser/{{$user->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
            onclick="return confirm('Are you sure you want to delete this user?');">Delete User</button>
    </form>

    <a href="/userDetails">Back to User List</a>

</body>

</html>
