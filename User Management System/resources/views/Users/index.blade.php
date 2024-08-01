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
            {{-- <h1 class="display-8 text-uppercase">Dashboard</h1> --}}
            <p class="lead text-italic">Manage users and view their details</p>
        </div>

        @if (session('Message'))
            <div class="alert alert-success text-center no-data-message py-3 ">
                {{ session('Message') }}
            </div>
        @endif

        {{-- @if ($users->isEmpty())     --}}
        <div class="card shadow-sm p-3">
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center row">
                <h3 class=" mt-3 mb-3 ps-3 pe-3 card-title mb-0 col-9 text-uppercase poppins-semibold">dashboard</h3>
                <div class=" mt-3 mb-3  pe-3 text-center d-flex justify-content-center align-items-center col-2">
                    <a href="{{ route('users.create') }}"
                        class="btn btn-primary create-btn d-flex justify-content-center align-items-center poppins-regular"
                        role="button">
                        <span class="text">Create User</span><span>Click here!</span></a>
                </div>


            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        @if ($users->isNotEmpty())
                            <thead class="thead-light">
                                <tr class="poppins-regular text-uppercase">
                                    <th class="text-center col-2">Profile</th>
                                    <th class="text-center col-2">Name</th>
                                    <th class="text-center col-3">Email</th>
                                    <th class="text-center col-2">Age</th>
                                    <th class="text-center col-2">Access Profile</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="poppins-regular" style="vertical-align: middle;">
                                        <td class="text-center table-data d-flex align-items-center justify-content-center">

                                            <img src="{{ $user->image ? asset($user->image) : asset('images/userIcon.png') }}"
                                                class="img-thumbnail">

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
                                        <td class="text-center table-data">
                                            <p>{{ $user->name }}</p>
                                        </td>
                                        <td class="text-center table-data">{{ $user->email }}</td>
                                        <td class="text-center table-data">{{ $user->age }}</td>
                                        <td class="text-center table-data">
                                            <a href="{{ route('users.show', $user->id) }}" class="btn-sm ">
                                                <button class=" btn btn-outline-warning manage-btn moving-text-container">
                                                    <span class="moving-text">Manage <span class="moving-text-hidden"> details  </span> </span>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <div class="alert alert-warning text-center no-data-message py-4 ">
                                <strong class="text-uppercase text-danger">No user data available</strong>
                            </div>
                        @endif
                    </table>
                </div>
            </div>
        </div>
        {{-- @else
            <div class="alert alert-warning text-center">
                <strong>No user data available</strong>
            </div>
        @endif --}}
    </section>

@endsection
