@extends('layouts.user')
@section('title', 'Show User')
@section('main-content')


    <section class="row col-12">

        {{-- <form method="get" action="{{ route('auth.logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form> --}}

        {{-- <div class="nav list-unstyled">
            <a href="{{ route('users.index') }}">Back to User List</a>
            <br>
            <a href="{{ route('users.create') }}">create new user!</a>
        </div> --}}
        {{-- <h1 class="alert alert-primary">
            {{ $user->name }} - Details
        </h1> --}}
        @if (session('Message'))
            <div class="alert alert-success text-center no-data-message py-3">
                {{ session('Message') }}
            </div>
        @endif

        <div class="require-error-message col-12">
            @if ($errors->any())
                <div class="alert alert-danger text-center no-data-message py-3 list-unstyled col-12    ">
                    <ul class="list-unstyled col-12 ">
                        @foreach ($errors->all() as $error)
                            <li class="col-12">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>



        <div class="media row w-100 d-flex justify-content-center align-items-center">
            <div class="media-body col-12 row  d-flex justify-content-center align-items-center">
                <div class="user-details-heading col-10 row my-5 d-flex justify-content-start align-items-center">
                    <div class="show-image-parent col-6 ">
                        <img src="{{ $user->image ? asset($user->image) : asset('images/userIcon.png') }}" alt=""
                            class="show-image-child">
                    </div>

                    <h3
                        class="mt-0 mb-1 col-3 fw-bolder text-uppercase poppins-medium text-italic d-flex justify-content-center ">
                        User details </h3>
                </div>

                <div class="display-details col-10 row  d-flex justify-content-between">
                    <ul
                        class="col-5 list-unstyled pippins-light d-flex flex-column align-items-center  user-details-content-left">


                        <li class="mb-3 row col-12 d-flex align-items-center justify-content-start">
                            <p class="litst-title col-5 fs-5 poppins-medium">Name </p>
                            <p class="litst-title col-7 fs-5 poppins-light"> : {{ $user->name }}</p>
                        </li>
                        <li class="mb-3 row col-12 d-flex align-items-center justify-content-start">
                            <p class="litst-title col-5 fs-5 poppins-medium">Nickname </p>
                            <p class="litst-title col-7 fs-5 poppins-light"> : {{ $user->nickname }}</p>
                        </li>
                        <li class="mb-3 row col-12 d-flex align-items-center justify-content-start">
                            <p class="litst-title col-5 fs-5 poppins-medium">DOB </p>
                            <p class="litst-title col-7 fs-5 poppins-light"> : {{ $user->dob }}</p>
                        </li>
                        <li class="mb-3 row col-12 d-flex align-items-center justify-content-start">
                            <p class="litst-title col-5 fs-5 poppins-medium">Age </p>
                            <p class="litst-title col-7 fs-5 poppins-light"> : {{ $user->age }}</p>
                        </li>
                        <li class="mb-3 row col-12 d-flex align-items-center justify-content-start">
                            <p class="litst-title col-5 fs-5 poppins-medium">Gender </p>
                            <p class="litst-title col-7 fs-5 poppins-light"> : {{ $user->gender }}</p>
                        </li>

                    </ul>
                    <ul
                        class="col-5 list-unstyled pippins-light d-flex flex-column align-items-center user-details-content-right ">

                        <li class="mb-3 row col-12 d-flex align-items-center justify-content-start">
                            <p class="litst-title col-5 fs-5 poppins-medium">Email </p>
                            <p class="litst-title col-7 fs-5 poppins-light"> : {{ $user->email }}</p>
                        </li>
                        <li class="mb-3 row col-12 d-flex align-items-center justify-content-start">
                            <p class="litst-title col-5 fs-5 poppins-medium">Mobile </p>
                            <p class="litst-title col-7 fs-5 poppins-light"> : {{ $user->mobile }}</p>
                        </li>
                        <li class="mb-3 row col-12 d-flex align-items-center justify-content-start">
                            <p class="litst-title col-5 fs-5 poppins-medium">City </p>
                            <p class="litst-title col-7 fs-5 poppins-light"> : {{ $user->address }}</p>
                        </li>
                        <li class="mb-3 row col-12 d-flex align-items-center justify-content-start">
                            <p class="litst-title col-5 fs-5 poppins-medium">State </p>
                            <p class="litst-title col-7 fs-5 poppins-light"> : {{ $user->state }}</p>
                        </li>
                        <li class="mb-3 row col-12 d-flex align-items-center justify-content-start">
                            <p class="litst-title col-5 fs-5 poppins-medium">Country </p>
                            <p class="litst-title col-7 fs-5 poppins-light"> : {{ $user->country }}</p>
                        </li>


                    </ul>
                </div>

            </div>

            {{-- <div class="edit-details-container col-10 row my-5">

                <h2 class="edit-details mb-4" id="edit-details">Edit Details
                    <div class="filled-arrow " id="filled-arrow">
                        <x-tabler-circle-arrow-down-filled />
                    </div>
                    <div class="empty-arrow" id="empty-arrow">
                        <x-tabler-circle-arrow-down />
                    </div>
                </h2>
                <div class="require-error-message col-12">
                    @if ($errors->any())
                        <div class="alert alert-danger text-center no-data-message py-3 list-unstyled col-12    ">
                            <ul class="list-unstyled col-12 ">
                                @foreach ($errors->all() as $error)
                                    <li class="col-12">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <form action="{{ route('users.update', $user->id) }}" method="POST" class="edit-details-content"
                    id="edit-details-content" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="show-form-body row col-12 d-flex justify-content-between">
                        <div class="show-form-primary row col-6 pe-5">

                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                <label for="name " class="form-label poppins-medium   col-3 ">
                                    Name</label>
                                <input type="text" class="form-control1  col-9 " name="name"
                                    value="{{ $user->name }}" placeholder="Enter your full name">
                            </div>
                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                <label for="nickname " class="form-label poppins-medium   col-3 ">
                                    Nickname</label>
                                <input type="text" class="form-control1  col-9 " name="nickname"
                                    value="{{ $user->nickname }}" placeholder="Enter your nickname">
                            </div>
                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                <label for="dob " class="form-label poppins-medium   col-3 ">
                                    DOB</label>
                                <input type="date" class="form-control1  col-9 " name="dob"
                                    value="{{ $user->dob }}" placeholder="Enter your dob">
                            </div>
                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                <label for="age " class="form-label poppins-medium   col-3 ">
                                    Age</label>
                                <input type="number" class="form-control1  col-9 " name="age"
                                    value="{{ $user->age }}" placeholder="Enter your age">
                            </div>
                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                <label for="gender " class="form-label poppins-medium   col-3 ">
                                    Gender</label>
                                <select id="gender" name="gender" class="form-select col-9 ">
                                    <option value="Male" {{ $user->gender === 'Male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="Female" {{ $user->gender === 'Female' ? 'selected' : '' }}>Female
                                    </option>
                                    <option value="Other" {{ $user->gender === 'Other' ? 'selected' : '' }}>Other
                                    </option>
                                </select>
                            </div>

                        </div>



                        <div class="show-form-primary col-6 ps-5 row d-flex justify-content-between">
                            
                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                <label for="email " class="form-label poppins-medium   col-3 ">
                                    Email</label>
                                <input type="text" class="form-control1  col-9 " name="email"
                                    value="{{ $user->email }}" placeholder="Enter your email">
                            </div>
                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                <label for="mobile " class="form-label poppins-medium   col-3 ">
                                    Mobile</label>
                                <input type="number" class="form-control1  col-9 " name="mobile"
                                    value="{{ $user->mobile }}" placeholder="Enter your mobile">
                            </div>
                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                <label for="address " class="form-label poppins-medium   col-3 ">
                                    City</label>
                                <input type="text" class="form-control1  col-9 " name="address"
                                    value="{{ $user->address }}" placeholder="Enter your city">
                            </div>
                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                <label for="state " class="form-label poppins-medium   col-3 ">
                                    State</label>
                                <input type="text" class="form-control1  col-9 " name="state"
                                    value="{{ $user->state }}" placeholder="Enter your state">
                            </div>
                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                <label for="country " class="form-label poppins-medium   col-3 ">
                                    Country</label>
                                <input type="text" class="form-control1  col-9 " name="country"
                                    value="{{ $user->country }}" placeholder="Enter your country">
                            </div>
                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                <label for="image " class="form-label poppins-medium   col-3 ">
                                    Country</label>
                                <input type="file" class="form-control1  col-9 " name="country">
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="updatebtn" class="btn btn-primary">Update Details</button>
                </form>
            </div> --}}
        </div>

        {{-- model --}}

        <div class="col-12 row d-flex justify-content-center align-items-conter">





            <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                    <div class="modal-content p-3">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body w-100 row col-12">
                            <div class="edit-details-container col-12 row my-5">

                                {{-- <h2 class="edit-details mb-4" id="edit-details">Edit Details
                                <div class="filled-arrow " id="filled-arrow">
                                    <x-tabler-circle-arrow-down-filled />
                                </div>
                                <div class="empty-arrow" id="empty-arrow">
                                    <x-tabler-circle-arrow-down />
                                </div>
                            </h2> --}}
                                <div class="require-error-message col-12">
                                    @if ($errors->any())
                                        <div
                                            class="alert alert-danger text-center no-data-message py-3 list-unstyled col-12    ">
                                            <ul class="list-unstyled col-12 ">
                                                @foreach ($errors->all() as $error)
                                                    <li class="col-12">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <form action="{{ route('users.update', $user->id) }}" method="POST"
                                    class="edit-details-content" id="edit-details-content" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="show-form-body row col-12 d-flex justify-content-between">
                                        <div class="show-form-primary row col-6 pe-5">

                                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                                <label for="name " class="form-label poppins-medium   col-3 ">
                                                    Name</label>
                                                <input type="text" class="form-control1  col-9 " name="name"
                                                    value="{{ $user->name }}" placeholder="Enter your full name">
                                            </div>
                                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                                <label for="nickname " class="form-label poppins-medium   col-3 ">
                                                    Nickname</label>
                                                <input type="text" class="form-control1  col-9 " name="nickname"
                                                    value="{{ $user->nickname }}" placeholder="Enter your nickname">
                                            </div>
                                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                                <label for="dob " class="form-label poppins-medium   col-3 ">
                                                    DOB</label>
                                                <input type="date" class="form-control1  col-9 " name="dob"
                                                    value="{{ $user->dob }}" placeholder="Enter your dob">
                                            </div>
                                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                                <label for="age " class="form-label poppins-medium   col-3 ">
                                                    Age</label>
                                                <input type="number" class="form-control1  col-9 " name="age"
                                                    value="{{ $user->age }}" placeholder="Enter your age">
                                            </div>
                                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                                <label for="gender " class="form-label poppins-medium   col-3 ">
                                                    Gender</label>
                                                <select id="gender" name="gender" class="form-select col-9 ">
                                                    <option value="Male"
                                                        {{ $user->gender === 'Male' ? 'selected' : '' }}>
                                                        Male
                                                    </option>
                                                    <option value="Female"
                                                        {{ $user->gender === 'Female' ? 'selected' : '' }}>
                                                        Female
                                                    </option>
                                                    <option value="Other"
                                                        {{ $user->gender === 'Other' ? 'selected' : '' }}>
                                                        Other
                                                    </option>
                                                </select>
                                            </div>

                                        </div>


                                        <div class="show-form-primary col-6 ps-5 row d-flex justify-content-between">

                                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                                <label for="email " class="form-label poppins-medium   col-3 ">
                                                    Email</label>
                                                <input type="text" class="form-control1  col-9 " name="email"
                                                    value="{{ $user->email }}" placeholder="Enter your email">
                                            </div>
                                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                                <label for="mobile " class="form-label poppins-medium   col-3 ">
                                                    Mobile</label>
                                                <input type="number" class="form-control1  col-9 " name="mobile"
                                                    value="{{ $user->mobile }}" placeholder="Enter your mobile">
                                            </div>
                                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                                <label for="address " class="form-label poppins-medium   col-3 ">
                                                    City</label>
                                                <input type="text" class="form-control1  col-9 " name="address"
                                                    value="{{ $user->address }}" placeholder="Enter your city">
                                            </div>
                                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                                <label for="state " class="form-label poppins-medium   col-3 ">
                                                    State</label>
                                                <input type="text" class="form-control1  col-9 " name="state"
                                                    value="{{ $user->state }}" placeholder="Enter your state">
                                            </div>
                                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                                <label for="country " class="form-label poppins-medium   col-3 ">
                                                    Country</label>
                                                <input type="text" class="form-control1  col-9 " name="country"
                                                    value="{{ $user->country }}" placeholder="Enter your country">
                                            </div>
                                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                                <label for="image " class="form-label poppins-medium   col-3 ">
                                                    Image</label>
                                                <input type="file" class="form-control1  col-9 " name="image">
                                            </div>
                                        </div>
                                    </div>





                                    {{-- <button type="submit" name="updatebtn" class="btn btn-primary">Update Details</button> --}}
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="updatebtn" class="btn btn-primary">Update
                                            Details</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </section>
    <div class="w-100 col-12 d-flex justify-content-center align-items-center">
        <div class="col-10">
            <button type="button" class="btn btn-primary col-2" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">
                Edit Details
            </button>

            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete this user?');">Delete User</button>
            </form>
        </div>
    </div>


@endsection
