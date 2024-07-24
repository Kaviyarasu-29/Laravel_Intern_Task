@extends('layouts.user')
@section('title', 'Create user')
@section('main-content')

    <section>
        {{-- logout btn --}}
        <form method="get" action="{{ route('auth.logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
        <div>
            <h3>Create User </h3>
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


            <a href="{{ route('users.index') }}">Go to user details</a>
            <form action="{{ route('users.store') }}" method="post">
                <div class="row">
                    <label for="name">
                        <i class="ti ti-user"></i>
                        Name:</label>
                    <input type="text" name="name" placeholder="Enter your Name">
                </div>
                <div>
                    <label for="email">
                        <i class="ti ti-mail"></i>
                        Email:</label>
                    <input type="email" name="email" placeholder="Enter your Email">
                </div>
                <div>
                    <label for="mobile">
                        <i class="ti ti-phone"></i>
                        Mobile: </label>
                    <input type="mobile" name="mobile" placeholder="Enter your mobile">
                </div>
                <div>
                    <label for="password">
                        <i class="ti ti-cloud-lock-open"></i>
                        Password:</label>
                    <input type="password" name="password" placeholder="Enter your password">
                </div>
                <div>
                    <label for="dob">
                        <i class="ti ti-calendar-event"></i>
                        Date of Birth:</label>
                    <input type="date" name="dob">
                </div>
                <div>
                    <label for="age">
                        <i class="ti ti-rating-16-plus"></i>
                        Age:</label>
                    <input type="number" name="age" placeholder="Enter your age">
                </div>
                <div>
                    <label for="gender">
                        <i class="ti ti-mars"></i>
                        Gender:</label>
                    <select name="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                </div>
                <div>
                    <label for="job">
                        <i class="ti ti-briefcase"></i>
                        Job:</label>
                    <input type="text" name="job" placeholder="Enter your job">
                </div>


                <button type="submit">Submit</button>
                @csrf
            </form>
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
