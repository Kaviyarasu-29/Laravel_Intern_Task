@extends('layouts.user')
@section('title', 'Show User')
@section('main-content')
    <section>
        
        <form method="get" action="{{ route('auth.logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>

        <div class="nav">
            <a href="{{ route('users.index') }}">Back to User List</a>
            <br>
            <a href="{{ route('users.create') }}">create new user!</a>
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
                <h1>personal details</h1>
                <li>Name: {{ $user->name }}</li>
                <li>Nickname: {{ $user->nickname }}</li>
                <li>DOB: {{ $user->dob }}</li>
                <li>Age: {{ $user->age }}</li>
                <li>Gender: {{ $user->gender }}</li>
            </ul>

            <ul>
                <h1>Other details</h1>

                <li>Email: {{ $user->email }}</li>
                <li>Mobile: {{ $user->mobile }}</li>
                <li>City: {{ $user->address ? $user->address : 'No data' }}</li>
                <li>state: {{ $user->state ? $user->state : 'No data' }}</li>
                <li>country: {{ $user->country ? $user->country : 'No data' }}</li>
                <li>Profile: <img src="{{ $user->image ? asset($user->image) : asset('images/userIcon.png') }}"
                        alt="" class="img-thumbnail"></li>
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
        <form action="{{ route('users.update', $user->id) }}" method="POST" class="edit-details-content"
            id="edit-details-content" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="pesonal">

                <h2 class="form-heading">
                    Personal Details
                </h2>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="nick name">Nickname:</label>
                    <input type="text" name="nickname" value="{{ $user->nickname }}">
                </div>
                <div>
                    <label for="dob">Date of Birth:</label>
                    <input type="date" name="dob" value="{{ $user->dob }}">
                </div>
                <div>
                    <label for="age">Age:</label>
                    <input type="number" name="age" value="{{ $user->age }}">
                </div>
                <div class="mb-3 col-12">
                    <label for="gender" class="form-label">Gender</label>
                    <select id="gender" name="gender" class="form-select">
                        <option value="Male" {{ $user->gender === 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ $user->gender === 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ $user->gender === 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>


            </div>

            <div class="other">
                <h2 class="form-heading">
                    Other details
                </h2>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}">
                </div>
                <div>
                    <label for="mobile">Mobile: </label>
                    <input type="number" name="mobile" value="{{ $user->mobile }}">
                </div>
                <div>
                    <label for="address">City: </label>
                    <input type="text" name="address" value="{{ $user->address }}">
                </div>
                <div>
                    <label for="state">state: </label>
                    <input type="state" name="state" value="{{ $user->state }}">
                </div>
                <div>
                    <label for="country">country: </label>
                    <input type="country" name="country" value="{{ $user->country }}">
                </div>
                <div>
                    <label for="image">profile </label>
                    <input type="file" name="image" id="">
                </div>
            </div>



            <button type="submit" name="updatebtn" class="btn btn-primary">Update Details</button>
        </form>

        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this user?');">Delete User</button>
        </form>
    </section>
@endsection
