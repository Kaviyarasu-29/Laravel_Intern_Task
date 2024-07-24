@extends('layouts.log')
@section('title', 'Login page')

@section('login-page-content')



    {{-- <div class="image">
        <img src="{{asset('images/login/flower.png')}}" alt="no image" srcset="">
    </div> --}}
    <section class="login-page row position-relative">
        <div class="left-side col-4 d-flex flex-column align-items-start ">

            <div class="left-side-content position-absolute">
                <h1 class="welcome josefin-sans-welcome">
                    Welcome back!
                </h1>
                <h4 class="welcome-content josefin-sans-welcome-content ">
                    We're glad you're here. Your dashboard is ready. Take a moment to catch up and continue your journey.
                </h4>
            </div>
            <div class="left-image">
                <img src="{{ asset('images/login/3d-structure-new.png') }}" alt="no image" srcset="">
            </div>

        </div>
        <div class="right-side col-8 row">
            <div class="col-11 right-child-col">
                <h1 class="poppins-regular">Login Account</h1>
                <div class="controller-message">
                    @if (session('Message'))
                        <div class="alert alert-success">
                            {{ session('Message') }}
                        </div>
                    @endif
                </div>
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
                <form action="{{ route('login.submit') }}" method="post">
                    <div>
                        <label for="email">
                            <x-tabler-mail />
                            Email:</label>
                        <input type="email" name="email" placeholder="Enter your Email">
                    </div>
                    <div>
                        <label for="password">
                            <x-tabler-password-user />
                            Password:</label>
                        <input type="password" name="password" placeholder="Enter your password">
                    </div>

                    <button type="submit">Login <x-tabler-lock-open /></button>
                    @csrf
                </form>
            </div>
        </div>
    </section>


@endsection
