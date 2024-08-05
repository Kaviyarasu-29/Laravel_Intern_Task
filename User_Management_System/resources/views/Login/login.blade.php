@extends('layouts.log')
@section('title', 'Login page')

@section('login-page-content')
    <section class="section position-relative h-100">
        <div class="parent-div row h-100">
            <div class="white-line position-absolute w-100">

            </div>
            <div class="right-side-page  h-100" >
                <div class="right-side-content" >
                    <h1 class="welcome-text w-100">
                        WELCOME BACK!
                    </h1>
                    <h4 class="welcome-breif">
                        We're glad you're here. Your dashboard is ready. Take a moment to catch up and continue your
                        journey.
                    </h4>
                </div>

            </div>
            <div class="h-100 row left-side-content d-flex flex-column justify-content-center align-items-center ">
                <div class="left-image w-100">
                    <img src="{{ asset('images/login/iphone.png') }}" alt="no image" srcset="">
                </div>
                <div class="w-100 login-content d-flex justify-content-center align-items-center h-100">
                    <div class="login-form ">
                        <h1 class="poppins-regular login-text ">LOGIN</h1>
                        <div>
                            @if (session('Message'))
                                <div class="alert alert-danger">
                                    {{ session('Message') }}
                                </div>
                            @endif
                        </div>
                        <div>
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

                                <input type="email" name="email" class="w-100 mt-10 mb-2 input-feild form-control"
                                    placeholder="Enter your Email">
                            </div>
                            <div>

                                <input type="password" name="password" class="w-100 mt-3 mb-2 input-feild form-control "
                                    placeholder="Enter your password">
                            </div>
                            <div class="fotgot-pass w-100 d-flex justify-content-end">
                                <p class="forgot-pass"> Forgot password? </p>
                            </div>
                            <div class="w-100 logout-btn ">
                                <button class="btn  w-100 mt-5 input-feild form-control D" type="submit">Login</button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>

            {{-- <section class="section position-relative">
        <div class="row h-100">
            <div class="white-line position-absolute w-100">

            </div>
            <div class="h-100 right-side-page">
                <div class="right-content">
                    <h1>
                        Welcome back!
                    </h1>
                    <h4>
                        We're glad you're here. Your dashboard is ready. Take a moment to catch up and continue your
                        journey.
                    </h4>
                </div>
            </div>
            <div class="col-5 row position-relative d-flex flex-column justify-content-center ">
                <div class="left-image col-11 position-absolute">
                    <img src="{{ asset('images/login/iphone.png') }}" alt="no image" srcset="">
                </div>
                <div class="col-11 login-content position-relative">
                    <div class="login-form positin-absolute">
                        <h1 class="poppins-regular login-text ">LOGIN</h1>
                        <div>
                            @if (session('Message'))
                                <div>
                                    {{ session('Message') }}
                                </div>
                            @endif
                        </div>
                        <div>
                            @if ($errors->any())
                                <div>
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
                                <input type="email" name="email" class="w-100 mt-10 mb-2 input-feild form-control"
                                    placeholder="Enter your Email">
                            </div>
                            <div>
                                <input type="password" name="password" class="w-100 mt-3 mb-2 input-feild form-control "
                                    placeholder="Enter your password">
                            </div>
                            <div class="fotgot-pass w-100 d-flex justify-content-end">
                                <p class="forgot-pass"> Forgot password? </p>
                            </div>
                            <div class="w-100 logout-btn ">
                                <button class="btn  w-100 mt-5 input-feild form-control D" type="submit">Login</button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section> --}}





            {{-- <body class="body"> --}}

            {{-- <section class="section position-relative h-100">
        <div class="row h-100">
            <div class="white-line position-absolute w-100">

            </div>
            <div class=" h-100" style="
    width: 60%;
">
                <div class="mt-15" style="
    margin-top: 18rem !important;
    width: 80%;
">
                    <h1>
                        Welcome back!
                    </h1>
                    <h4>
                        We're glad you're here. Your dashboard is ready. Take a moment to catch up and continue your
                        journey.
                    </h4>
                </div>

            </div>
            <div class="h-100 row d-flex flex-column justify-content-center align-items-center "
                style="
    width: 40%;
">
                <div class="left-image w-100">
                    <img src="http://localhost:8000/images/login/iphone.png" alt="no image" srcset="">
                </div>
                <div class="w-100 login-content d-flex justify-content-center align-items-center h-100">
                    <div class="login-form ">
                        <h1 class="poppins-regular login-text ">LOGIN</h1>
                        <div>
                        </div>
                        <div>
                        </div>

                        <form action="http://localhost:8000/login_process" method="post">
                            <div>

                                <input type="email" name="email" class="w-100 mt-10 mb-2 input-feild form-control"
                                    placeholder="Enter your Email">
                            </div>
                            <div>

                                <input type="password" name="password" class="w-100 mt-3 mb-2 input-feild form-control "
                                    placeholder="Enter your password">
                            </div>
                            <div class="fotgot-pass w-100 d-flex justify-content-end">
                                <p class="forgot-pass"> Forgot password? </p>
                            </div>
                            <div class="w-100 logout-btn ">
                                <button class="btn  w-100 mt-5 input-feild form-control D" type="submit">Login</button>
                            </div>
                            <input type="hidden" name="_token" value="JsRhxQ9UxLtaEGxVnBNkyirpxbw54Jc8KNsgcgsc"
                                autocomplete="off">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section> --}}






















            {{-- </body> --}}








            {{-- <div class="image">
        <img src="{{asset('images/login/flower.png')}}" alt="no image" srcset="">
    </div> --}}
            {{-- <section class="login-page row position-relative">
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
                <div class="mb-3">
                    @if (session('Message'))
                        <div class="alert alert-danger">
                            {{ session('Message') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
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
    </section> --}}


        @endsection
