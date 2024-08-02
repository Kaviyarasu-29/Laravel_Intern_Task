@extends('layouts.user')
@section('title', 'User Management')
@section('main-content')

    <section class=" dashboard my-5 ">
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
                                        <td class="text-center table-data">
                                            <p>{{ $user->name }}</p>
                                        </td>
                                        <td class="text-center table-data">{{ $user->email }}</td>
                                        <td class="text-center table-data">{{ $user->age }}</td>
                                        <td class="text-center table-data">
                                            <a href="{{ route('users.show', $user->id) }}" class="btn-sm ">
                                                <button class=" btn btn-outline-warning manage-btn moving-text-container"
                                                    data-id="{{ $user->id }}">
                                                    <span class="moving-text">Manage <span class="moving-text-hidden">
                                                            details </span> </span>
                                                </button>
                                            </a>
                                        </td>
                                        <td class="text-center table-data">
                                            <button type="button" class="btn btn-outline-warning manage-btn"
                                                data-bs-toggle="modal" data-bs-target="#userModal"
                                                data-id="{{ $user->id }}" data-name="{{ $user->name }}"
                                                data-nickname ="{{ $user->nickname }}" data-dob ="{{ $user->dob }}"
                                                data-age ="{{ $user->age }}" data-gender ="{{ $user->gender }}"
                                                data-email="{{ $user->email }}" data-mobile="{{ $user->mobile }}"
                                                data-address="{{ $user->address }}" data-state="{{ $user->state }}"
                                                data-country="{{ $user->country }}" data-image="{{ $user->image }}">
                                                Manage User
                                            </button>

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
        <!-- User Modal -->
        <div class="modal fade " id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="userModalLabel">User Information1</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <div class="text-center">
                            <img id="userImage" src="" class="img-thumbnail mb-3" alt="User Image"
                                style="width: 150px; height: 150px;">
                        </div>
                        <div class="edit-details-container col-12 row my-5">
                            <div class="show-form-primary col-11 ps-5 row d-flex justify-content-between">
                    
                    
                                <form action="{{ route('users.update', $user->id) }}" method="POST" class="edit-details-content"
                                    id="edit-details-content" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                        <label for="name" class="form-label poppins-medium col-3">Name</label>
                                        <input type="text" class="form-control col-9" name="name" id="userNameInput" value=""
                                            placeholder="Enter your full name">
                                    </div>
                    
                                    <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                        <label for="nickname" class="form-label poppins-medium col-3">nickname</label>
                                        <input type="text" class="form-control col-9" name="nickname" id="userNicknameInput"
                                            value="" placeholder="Enter your full nickname">
                                    </div>
                                    <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                        <label for="dob" class="form-label poppins-medium col-3">dob</label>
                                        <input type="date" class="form-control col-9" name="dob" id="userDobInput" value=""
                                            placeholder="Enter your full dob">
                                    </div>
                                    <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                        <label for="age" class="form-label poppins-medium col-3">age</label>
                                        <input type="number" class="form-control col-9" name="age" id="userAgeInput" value=""
                                            placeholder="Enter your full age">
                                    </div>
                                    <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                        <label for="gender" class="form-label poppins-medium col-3">Gender</label>
                                        <select class="form-control col-9" name="gender" id="userGenderInput">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>


                    
                                    <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                        <label for="email" class="form-label poppins-medium col-3">email</label>
                                        <input type="text" class="form-control col-9" name="name" id="userEmailInput" value=""
                                            placeholder="Enter your full email">
                    
                                    </div>
                                    <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                        <label for="mobile" class="form-label poppins-medium col-3">mobile</label>
                                        <input type="number" class="form-control col-9" name="mobile" id="userMobileInput" value=""
                                            placeholder="Enter your full mobile">
                                    </div>
                                    <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                        <label for="address" class="form-label poppins-medium col-3">Address</label>
                                        <input type="text" class="form-control col-9" name="address" id="userAddressInput"
                                            placeholder="Enter your full address">
                                    </div>
                    
                                    <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                        <label for="state" class="form-label poppins-medium col-3">State</label>
                                        <input type="text" class="form-control col-9" name="state" id="userStateInput"
                                            placeholder="Enter your state">
                                    </div>
                    
                                    <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                        <label for="country" class="form-label poppins-medium col-3">Country</label>
                                        <input type="text" class="form-control col-9" name="country" id="userCountryInput"
                                            placeholder="Enter your country">
                                    </div>
                                    <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                                        <label for="image " class="form-label poppins-medium   col-3 ">
                                            Image</label>
                                        <input type="file" class="form-control1  col-9 " name="image">
                                    </div>
                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="updatebtn" class="btn btn-primary">Update
                                            Details</button>
                                    </div>
                    
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a id="userProfileLink" href="#" class="btn btn-primary">View Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </section>





    {{-- <div class="edit-details-container col-12 row my-5">
        <div class="show-form-primary col-6 ps-5 row d-flex justify-content-between">


            <form action="{{ route('users.update', $user->id) }}" method="POST" class="edit-details-content"
                id="edit-details-content" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                    <label for="name" class="form-label poppins-medium col-3">Name</label>
                    <input type="text" class="form-control col-9" name="name" id="userNameInput" value=""
                        placeholder="Enter your full name">
                </div>

                <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                    <label for="nickname" class="form-label poppins-medium col-3">nickname</label>
                    <input type="text" class="form-control col-9" name="nickname" id="userNicknameInput"
                        value="" placeholder="Enter your full nickname">
                </div>
                <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                    <label for="dob" class="form-label poppins-medium col-3">dob</label>
                    <input type="date" class="form-control col-9" name="dob" id="userDobInput" value=""
                        placeholder="Enter your full dob">
                </div>
                <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                    <label for="age" class="form-label poppins-medium col-3">age</label>
                    <input type="number" class="form-control col-9" name="age" id="userAgeInput" value=""
                        placeholder="Enter your full age">
                </div>

                <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                    <label for="email" class="form-label poppins-medium col-3">email</label>
                    <input type="text" class="form-control col-9" name="name" id="userEmailInput" value=""
                        placeholder="Enter your full email">

                </div>
                <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                    <label for="mobile" class="form-label poppins-medium col-3">mobile</label>
                    <input type="number" class="form-control col-9" name="mobile" id="userMobileInput" value=""
                        placeholder="Enter your full mobile">
                </div>
                <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                    <label for="address" class="form-label poppins-medium col-3">Address</label>
                    <input type="text" class="form-control col-9" name="address" id="userAddressInput"
                        placeholder="Enter your full address">
                </div>

                <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                    <label for="state" class="form-label poppins-medium col-3">State</label>
                    <input type="text" class="form-control col-9" name="state" id="userStateInput"
                        placeholder="Enter your state">
                </div>

                <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                    <label for="country" class="form-label poppins-medium col-3">Country</label>
                    <input type="text" class="form-control col-9" name="country" id="userCountryInput"
                        placeholder="Enter your country">
                </div>
                <div class="mb-3 row col-12 d-flex align-items-center justify-content-between">
                    <label for="image " class="form-label poppins-medium   col-3 ">
                        Image</label>
                    <input type="file" class="form-control1  col-9 " name="image">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="updatebtn" class="btn btn-primary">Update
                        Details</button>
                </div>

            </form>
        </div>
    </div> --}}


    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        // Get all buttons with the class 'manage-btn'
        var buttons = document.querySelectorAll('.manage-btn');

        // Add click event listener to each button
        buttons.forEach(function(button) {
            button.addEventListener('click', function() {
                var userId = this.getAttribute('data-id');
                var userName = this.getAttribute('data-name');
                var userNickname = this.getAttribute('data-nickname');
                var userDob = this.getAttribute('data-dob');
                var userAge = this.getAttribute('data-age');
                var userGender  = this.getAttribute('data-gender');


                var userEmail = this.getAttribute('data-email');
                var userMobile = this.getAttribute('data-mobile');
                var userAddress = this.getAttribute('data-address');
                var userState = this.getAttribute('data-state');
                var userCountry = this.getAttribute('data-country');


                var userImage = this.getAttribute('data-image') ||
                    "{{ asset('images/userIcon.png') }}";

                console.log(userId)
                // Populate modal fields

                document.getElementById('userNameInput').value = userName;
                document.getElementById('userNicknameInput').value = userNickname;
                document.getElementById('userDobInput').value = userDob;
                document.getElementById('userAgeInput').value = userAge;
                document.getElementById('userGenderInput').value = userGender;

                document.getElementById('userEmailInput').value = userEmail;
                document.getElementById('userMobileInput').value = userMobile;
                document.getElementById('userAddressInput').value = userAddress;
                document.getElementById('userStateInput').value = userState;
                document.getElementById('userCountryInput').value = userCountry;
                // document.getElementById('userAddressInput').value = userAddress;
                // document.getElementById('userStateInput').value = userState;
                // document.getElementById('userCountryInput').value = userCountry;


                document.getElementById('userName').textContent = userName;
                document.getElementById('userEmail').textContent = userEmail;
                document.getElementById('userAge').textContent = userAge;
                document.getElementById('userImage').setAttribute('src', userImage);
                document.getElementById('userProfileLink').setAttribute('href', '/users/' + userId);

                // Show the modal
                var modal = new bootstrap.Modal(document.getElementById('userModal'));
                modal.show();
            });
        });
        // });
    </script>


@endsection
