@extends('layouts.user')
@section('title', 'Create user')
@section('main-content')
    <section id="content" class="w-100 profile-div">
        <div class="row w-100 d-flex-justify-content-center align-itms-center">
            <div class="profile-image-id col-5 position-relative">
                <img class="img-primary" src="{{ asset('images/id-1.png') }}" alt="">
                <div class="id-card position-absolute text-center">
                    <img src="{{ auth()->user()->image ? asset(auth()->user()->image) : asset('images/userIcon.png') }}" alt="" class="img-thumbnail-secondary" >
                    <p class="poppins-medium-italic id-name"> {{ auth()->user()->nickname }} </p>
                </div>
                {{-- @if (isset($user->image) && !empty($user->image))
                    {

                    <div class="id-card position-absolute text-center">
                        <img src="{{ asset(auth()->user()->image) }}" alt="">
                        <p class="poppins-medium-italic id-name"> {{ auth()->user()->name }} </p>
                    </div>
                    }
                @else
                    <div class="id-card position-absolute text-center">
                        <img src="{{ asset(auth()->user()->image) }}" alt="">
                        <p class="poppins-medium-italic id-name"> {{ auth()->user()->name }} </p>
                    </div>
                @endif --}}

            </div>
            <div class="profile-page col-7">
                <h1 class="profile-heading poppins-medium-italic mt-3">
                    Profile Overview
                </h1>
                <p class="profile-summary poppins-light">
                    Welcome to your profile page! Here, you can view and manage your personal and professional details. This
                    space is dedicated to showcasing your identity and ensuring that your information is up-to-date.
                </p>


                <h2 class="profile-heading poppins-medium-italic mt-3">
                    Personal Info
                </h2>
                <ul class="list-group list-unstyled">
                    <li class="list-item">
                        <div style="align-items: center; justify-content:space-around">

                            <div class="poppins-light row ">
                                <div class="col-3 list"> Username </div> : {{ auth()->user()->name }}
                            </div>
                            <div class="poppins-light row ">
                                <div class="col-3 list"> Email </div> : {{ auth()->user()->email }}
                            </div>
                            <div class="poppins-light row ">
                                <div class="col-3 list"> Mobile </div> : {{ auth()->user()->mobile }}
                            </div>
                            <div class="poppins-light row ">
                                <div class="col-3 list"> Age </div> : {{ auth()->user()->age }}
                            </div>
                            {{-- <div class="profile-image"> --}}
                            {{-- <img src="{{ asset(auth()->user()->image) }}" alt="{{ auth()->user()->name }}"> --}}
                            {{-- <img src="{{ asset(Storage::disk($user->image)) }}" alt=""> --}}

                            {{-- </div> --}}
                        </div>
                    </li>
            </div>
        </div>
    </section>



@endsection
