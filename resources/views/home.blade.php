@extends('layouts.app')

@php
    $user = Auth::user();
    $name = $user->first_name;
@endphp

@section('content')
    <section class="dashboard d-flex py-5">
        <div class="container mt-4">
            <div class="row mt-5">
                <div class="d-flex justify-content-end">

                    <button style='margin-right:5px'></button>
                    @if (Auth::user()->type == UserType::USER)
                        <a class="btn-reverse text-center mb-3" href="{{ url('chatify') }}">Chat with a Counsellor

                            @if ($unreadMsg != 0)
                                <span class="badge pulse">{{ $unreadMsg }}</span>
                            @endif
                        </a>
                    @else
                        <a class="btn-reverse text-center mb-3" href="{{ url('/chatify') }}">View Chats
                            @if ($unreadMsg != 0)
                                <span class="badge pulse">{{ $unreadMsg }}</span>
                            @endif
                        </a>
                    @endif
                </div>

                <div class="d-flex justify-content-end">
                    @if (Auth::user()->type == UserType::USER)
                        <a class="btn-reverse text-center mb-3" href="{{ url('/fullcalender') }}">View Counsellor Timetable
                            @if ($unreadMsg != 0)
                                <span class="badge pulse">{{ $unreadMsg }}</span>
                            @endif
                        </a>
                    @else
                        <a class="btn-reverse text-center mb-3" href="{{ url('/fullcalender') }}">Add Timetable
                            @if ($unreadMsg != 0)
                                <span class="badge pulse">{{ $unreadMsg }}</span>
                            @endif
                        </a>
                    @endif

                </div>

                <div class="col-md-4">
                    <div class="card m-2">
                        <div class="card-header">{{ __('Navigation') }}</div>
                        <div class="card-body">
                            <div class="nav flex-column nav-pills mb-3 bg-opacity-50 mx-3 p-3" id="v-pills-tab"
                                role="tablist" aria-orientation="vertical">

                                <button class="btn-inverse active mb-3" id="v-pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-home" type="button" role="tab"
                                    aria-controls="v-pills-home" aria-selected="true">Home</button>

                                <button class="btn-inverse" id="v-pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-profile" type="button" role="tab"
                                    aria-controls="v-pills-profile" aria-selected="false">Profile</button>

                                <button style='margin-top:5px'></button>

                                @if (Auth::user()->type == UserType::USER)
                                    <button style='margin-top:5px; background-color:#20c997; color:black' class="nav-link"
                                        id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings"
                                        type="button" role="tab" aria-controls="v-pills-settings"
                                        aria-selected="false"> <a style='color:black' href="{{ url('appoint') }}">Book Appointment</a>

                                        <button style='margin-top:5px; background-color:#20c997; color:black' class="nav-link"
                                        id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings"
                                        type="button" role="tab" aria-controls="v-pills-settings"
                                        aria-selected="false"> <a style='color:black' href="{{ url('showappointment') }}">My Appointment</a>
                                        @if ($unreadMsg != 0)
                                            <span class="badge pulse">{{ $unreadMsg }}</span>
                                        @endif
                                    </button>
                                @else
                                    <button style='margin-top:5px; background-color:#20c997; color:black' class="nav-link"
                                        id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings"
                                        type="button" role="tab" aria-controls="v-pills-settings"
                                        aria-selected="false"><a href="{{ url('myappoinment') }}">Manage Appointment</a>
                                        @if ($unreadMsg != 0)
                                            <span class="badge pulse">{{ $unreadMsg }}</span>
                                        @endif
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md">
                    <div class="card m-2">
                        <div class="card-header h3">{{ __('Welcome') }}
                            @php
                                echo '<strong>' . $name . '</strong>';
                            @endphp
                        </div>

                        <div class="card-body">
                            <div class="tab-content p-3  bg-white" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">
                                    <p>Welcome to MentalCare, select the "Chat with counsellor" button or "Book Appointment"
                                        <span><i class="ml-2 fa-solid fa-arrow-turn-up"></i></span> to begin your
                                        counselling sessions with your preferred therapist.
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                    {{-- <table>
                                    <tr>
                                        <td>Full Name:</td>
                                        <td><h5>{{Auth::user()->last_name}} {{Auth::user()->first_name}}</h5></td>
                                    </tr>
                                </table> --}}
                                    <h3>User Profile</h3>
                                    <form class="form-horizontal mt-3" action="#" method="POST"
                                        enctype="multipart/form-data" id="parsleyForm">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="firstname" class="required">First name</label>
                                                <div
                                                    class="input-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                                    <input type="text" name="first_name"
                                                        class="form-control form-control" id="first_name"
                                                        placeholder="First Name"
                                                        value="{{ old('first_name', Auth::user()->first_name) }}" required
                                                        data-parsley-validate-name autocomplete="{dydx}">
                                                </div>
                                                @if ($errors->has('first_name'))
                                                    <div class="text-danger">{{ $errors->first('first_name') }}</div>
                                                @endif
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label for="lastname" class="">Last name</label>
                                                <div
                                                    class="input-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                                    <input type="text" name="last_name"
                                                        class="form-control form-control" id="last_name"
                                                        placeholder="Last Name"
                                                        value="{{ old('last_name', Auth::user()->last_name) }}"
                                                        data-parsley-validate-name autocomplete="off">
                                                </div>
                                                @if ($errors->has('last_name'))
                                                    <div class="text-danger">{{ $errors->first('last_name') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row my-4">
                                            <div class="form-group col-sm-6">
                                                <label for="gender" class="required">Gender</label>
                                                <select
                                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2 form-control form-control-md"
                                                    name="gender" required>
                                                    @foreach (Gender::getAll() as $key => $value)
                                                        <option value="{{ $key }}"
                                                            {{ $key == $user->gender ? 'selected' : '' }}>
                                                            {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label for="phone_number" class="required">Phone Number</label>
                                                <div
                                                    class="input-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">
                                                    <input type="text" name="phone_number"
                                                        class="form-control form-control" id="phone_number"
                                                        placeholder="Phone Number"
                                                        value="{{ old('phone_number', Auth::user()->mobile_number) }}"
                                                        required data-parsley-validate-name autocomplete="{dydx}">
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                               {{-- <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                    {{--     Loremipsum dolor dfjfidfngdd gdjgdgdfsd as asasaklas oiiufhrihsfhsf ujisnfshfuifhs

                                    <h4 class="panel-title">Book Appointment</h4>

                                    <form class="main-form" action="/appoint" method="POST">
                                        <div class="form-group">
                                            <label for="counsellor">
                                                Counsellor
                                            </label>
                                            <select width="100px"; name="counsellor" class="form-control"
                                                required="required">
                                                <option value="">Select Counsellor</option>
                                                <option value="Dr Amalina">Dr Amalina</option>
                                                <option value="Dr Chan Miew">Dr Chan Miew</option>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="session">
                                                Session:
                                            </label>
                                            <select name="session" class="form-control" required="required">
                                                <option value="">Select Session</option>
                                                <option value="Online">Online</option>
                                                <option value="Face-to-Face">Face-to-face Session</option>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="date">
                                                Date
                                            </label>
                                            <input type="date" class="form-control datepicker" name="date"
                                                required="required" data-date-format="yyyy-mm-dd" id='datepicker'>



                                        </div>

                                        <div class="form-group">
                                            <label for="time">

                                                Time

                                            </label>

                                            <input type="time" class="form-control" name="time" id="timepicker1"
                                                required="required">eg :
                                            10:00 PM


                                        </div>
                                        <br>
                                        <div>

                                            <button class="btn-reverse text-center mb-3"
                                                style="color:black"onclick="myFunction()"class="btn btn-o btn-primary">Submit</button>

                                            <script>
                                                function myFunction() {
                                                    alert("Your appointment successfully booked");
                                                }
                                            </script>
                                        </div>

                                </div> --}}


                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="d-flex align-items-start p-2 rounded-3">



            </div>

        </div>


        </div>
    </section>
@endsection
@section('scripts')
    <script src="https://kit.fontawesome.com/3b8c65f5c7.js" crossorigin="anonymous"></script>
@endsection
