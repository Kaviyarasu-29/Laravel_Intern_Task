@extends('layouts.user')
@section('title', 'Create user')
@section('main-content')
    <section class="w-100">
        <div class="create-content">

            {{-- logout btn --}}
            {{-- <form method="get" action="{{ route('auth.logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form> --}}
            <div>
                <h3>Create User </h3>
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


                <a href="{{ route('users.index') }}">Go to user details</a>
                <form action="{{ route('users.store') }}" method="post"
                    class="w-100 row d-flex justify-content-between create-form"  enctype="multipart/form-data">
                    <div class="col-6">
                        <div class="left-form col-11">
                            <div class="mb-3">
                                <label for="name" class="form-label">
                                    <i class="ti ti-user"></i>
                                    Name:</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter your Name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    <i class="ti ti-mail"></i>
                                    Email:</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter your Email">
                            </div>
                            <div class="mb-3">
                                <label for="mobile" class="form-label">
                                    <i class="ti ti-phone"></i>
                                    Mobile: </label>
                                <input type="mobile" class="form-control" name="mobile" placeholder="Enter your mobile">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    <i class="ti ti-cloud-lock-open"></i>
                                    Password:</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Enter your password" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="dob" class="form-label">
                                    <i class="ti ti-calendar-event"></i>
                                    Date of Birth:</label>
                                <input type="date" class="form-control" name="dob">
                            </div>
                        </div>

                    </div>

                    <div class="col-6">
                        <div class="right-form col-11">

                            <div class="mb-3">
                                <label for="age" class="form-label">
                                    <i class="ti ti-rating-16-plus"></i> 
                                    Age:</label>
                                <input type="number" class="form-control" name="age" placeholder="Enter your age">
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">
                                    <i class="ti ti-mars"></i>
                                    Gender:</label>
                                <select name="gender" class="form-select mb-3" aria-label="Default select example">
                                    <option selected disabled ><i style="color:#d6d7d8 ">select</i></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="job" class="form-label">
                                    <i class="ti ti-briefcase"></i>
                                    Job:</label>
                                <input type="text" class="form-control" name="job" placeholder="Enter your job">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label ">Select pofile image: </label>
                                <input class="form-control custom-file-upload" type="file" name="image" id="formFile">
                            </div>
                            <div class="mb-3 sub-btn w-100 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
