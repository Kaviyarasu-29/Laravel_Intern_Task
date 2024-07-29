@extends('layouts.user')
@section('title', 'Create user')
@section('main-content')
    <section class="w-100">
        <div class="create-content m1-n1">

            {{-- logout btn --}}
            {{-- <form method="get" action="{{ route('auth.logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form> --}}
            <div>
                {{-- <h3 class="mb-5 ">Create User </h3> --}}
                @if (session('Message'))
                    <div class="alert alert-success">
                        {{ session('Message') }}
                    </div>
                @endif


                <div class="require-error-message">
                    {{-- <div class="col-5"> --}}
                    @if ($errors->any())
                        <div class="alert alert-danger w-25 ">
                            <ol class="list-group list-group-numbered">
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                                @endforeach
                            </ol>
                        </div>
                    @endif
                    {{-- </div> --}}
                </div>


                {{-- <a class=" btn btn-primary px-2" href="{{ route('users.index') }}">Go to user details</a> --}}
                <form action="{{ route('users.store') }}" method="post"
                    class="w-100 row d-flex justify-content-between create-form" enctype="multipart/form-data">
                    <div class="col-6 poppins-regular-details">
                        <div class="left-form col-11">
                            <h4 class="create-heading  poppins-medium ps-4 ">
                                PERSONAL DETAILS
                            </h4>
                            <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                <label for="name " class="form-label ps-4 col-2 ">
                                    <i class="ti ti-user"></i>
                                    Name</label>
                                <input type="text" class="form-control  col-9 w-75 " name="name" placeholder="Enter your Name">
                            </div>


                            <div class="mb-3 gap-3 d-flex align-items-center  col-12 justify-content-between col-12 justify-content-between">
                                <label for="dob" class="form-label ps-4 col-2">
                                    <i class="ti ti-calendar-event"></i>
                                    DOB</label>
                                <input type="date" class="form-control  col-9 w-75" name="dob">
                            </div>
                            <div class="mb-3 gap-3 d-flex align-items-center  col-12 justify-content-between">
                                <label for="age" class="form-label ps-4 col-2">
                                    <i class="ti ti-rating-16-plus"></i>
                                    Age</label>
                                <input type="number" class="form-control  col-9 w-75" name="age" placeholder="Enter your age">
                            </div>
                            <div class="mb-3 gap-3 d-flex align-items-center  col-12 justify-content-between">
                                <label for="gender" class="form-label ps-4 col-2">
                                    <i class="ti ti-mars"></i>
                                    Gender</label>
                                <select name="gender" class="form-select  col-9 w-75  " aria-label="Default select example">
                                    <option selected disabled><i style="color:#d6d7d8 ">select</i></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="mb-3 d-flex align-items-center  col-12 justify-content-between">
                                <label for="password" class="form-label ps-4 col-2">
                                    Password</label>
                                <input type="password" class="form-control  col-9 w-75" name="password"
                                    placeholder="Enter your password" autocomplete="off">
                            </div>
                            <div class="mb-3 gap-3 d-flex align-items-center  col-12 justify-content-between">
                                <label for="formFile" class="form-label ps-4 col-2">Profile</label>
                                <input class="form-control  col-9 w-75 custom-file-upload" type="file" name="image" id="formFile">
                            </div>
                        </div>

                    </div>

                    <div class="col-6 ">
                        <div class="right-form col-11 poppins-regular-details">
                            <h4 class="create-heading poppins-medium  ps-4">
                                CONTACT DETAILS
                            </h4>
                            <div class="mb-3 gap-3 d-flex align-items-center  col-12 justify-content-between">
                                <label for="email" class="form-label ps-4 col-2">
                                    <i class="ti ti-mail"></i>
                                    Email</label>
                                <input type="email" class="form-control  col-9 w-75" name="email" placeholder="Enter your Email">
                            </div>
                            <div class="mb-3 gap-3 d-flex align-items-center  col-12 justify-content-between">
                                <label for="mobile" class="form-label ps-4 col-2">
                                    <i class="ti ti-phone"></i>
                                    Mobile </label>
                                <input type="mobile" class="form-control  col-9 w-75" name="mobile" placeholder="Enter your mobile">
                            </div>
                            <div class="mb-3 gap-3 d-flex align-items-center  col-12 justify-content-between">
                                <label for="Address" class="form-label ps-4 col-2">
                                    <i class="ti ti-phone"></i>
                                    City </label>
                                <input type="text" class="form-control  col-9 w-75" name="address" placeholder="Enter your Address">
                            </div>
                            <div class="mb-3 gap-3 d-flex align-items-center  col-12 justify-content-between">
                                <label for="State" class="form-label ps-4 col-2">
                                    <i class="ti ti-phone"></i>
                                    State </label>
                                <input type="text" class="form-control  col-9 w-75" name="state" placeholder="Enter your state">
                            </div>
                            <div class="mb-3 gap-3 d-flex align-items-center  col-12 justify-content-between">
                                <label for="Country" class="form-label ps-4 col-2">
                                    <i class="ti ti-phone"></i>
                                    Country </label>
                                <input type="text" class="form-control  col-9 w-75" name="country"
                                    placeholder="Enter your country">
                            </div>



                            <div class="mb-3 sub-btn w-100 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary button-48 poppins-regular-details"> <span class="text"> CREATE </span> </button>
                            </div>

                        </div>
                    </div>


                    @csrf
                </form>
            </div>

        </div>

        {{-- Existing student display logic --}}
        {{-- <div>
          <h3>List of stores userd</h3>
          @if ($students->isNotEmpty())
            <ul>
              @foreach ($students as $student)
                <li>
                  <div style="align-items: center; justify-content:space-around">
                    <div style="text-align: center">{{ $student->name }}</div>
                    <div style="text-align: center">{{ $student->email }}</div>
                    <div style="text-align: center">{{ $student->joined_date }}</div>
                  </div>
                </li>
              @endforeach
            </ul>
          @else
            <div style="display: flex; justify-content: center; align-items: center;">
              <p class="mb-0 ">No student data</p>
            </div>
          @endif
        </div> --}}

    </section>

@endsection
