{{-- @extends('layouts.user')
@section('title', 'Users')
@section('main-content')

    <section>
        @if (session('success'))
            <script>
                var userName = '{{ session('success') }}';
                alert('Welcome back ' + userName);
            </script>
        @endif

        <script>
            alert('Welcome back, ' + {{ auth()->user()->name }})
        </script>
        

        <div>
            
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

                                
                                @if (isset($user->image) && !empty($user->image))
                                    {

                                    <div class="profile-image">
                                        <img src="{{ asset($user->image) }}">
                                        

                                    </div>
                                    }
                                @else
                                    <div class="profile-image">
                                        

                                    </div>
                                @endif
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
@endsection --}}

@extends('layouts.user')
@section('title', 'User Management')
@section('main-content')
 
    <section class=" dashboard my-5">
        @if (session('success'))
            <script>
               var userName = '{{ session('success') }}';
                alert('Welcome back ' + userName);
            </script>
        @endif

        <div class="text-center mb-5">
            <h1 class="display-8 text-uppercase">Dashboard</h1>
            <p class="lead">Manage users and view their details</p>
        </div>

        <div class="mb-4 text-right">
            <a href="{{ route('users.create') }}" class="btn btn-primary">Create New User</a>
        </div>

        @if (session('Message'))
            <div class="alert alert-success">
                {{ session('Message') }}
            </div>
        @endif

        @if ($users->isNotEmpty())
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title mb-0">User List</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Age</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <img src="{{ $user->image ? asset($user->image) : asset('images/userIcon.png') }}"  class="img-thumbnail" style="width: 50px; height: 50px;">
                                        </td>
                                        {{-- @if (isset($user->image) && !empty($user->image))
                                            {
                                            <td>
                                                <div class="profile-image">
                                                    <img src="{{asset($user->image)}}"
                                                        class="img-thumbnail" >
                                                </div>
                                            </td>
                                            }
                                        @else
                                            <td>
                                                <div class="profile-image">
                                                </div>
                                            </td>
                                        @endif --}}
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->age }}</td>
                                        <td>
                                            <a href="{{ route('users.show', $user->id) }}"
                                                class="btn btn-sm btn-outline-info">View Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-warning text-center">
                <strong>No user data available</strong>
            </div>
        @endif
    </section>

@endsection
