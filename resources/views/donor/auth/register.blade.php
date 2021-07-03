<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ env('APP_NAME') }} | Donor</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/brand/favicon.png" type="image/png') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css" type="text/css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css') }}">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0" type="text/css') }}">
</head>

<body class="bg-default">
    <!-- Header -->
    <div class="header bg-gradient-primary py-4 py-lg-4">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        <h2><a href="{{ env('APP_URL')  }}" class="">Back</a></h2>
                        <h1 class="text-white">Welcome!</h1>
                        <p class="text-lead text-white">Use this awesome form to register in
                            your Site for good deed.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-7">
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-body">
                        <div class="text-center text-muted mb-4">
                            <small>Sig Up in with</small>
                        </div>
                        @if(Session::has('message'))
                        <div class="text-center">
                            <p class="text-danger font-weight-bold">{{ Session::get('message') }}</p>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('donor.register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <input class="form-control" placeholder="Name" type="text"
                                                value="{{ old('name') }}" name="name">
                                        </div>
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <input class="form-control" value="{{ old('email') }}" placeholder="Email"
                                                type="text" name="email">
                                        </div>
                                        @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group mb-3">
                                <div class="col-sm-6">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Mobile Number"
                                            value="{{ old('mobile')  }}" type="text" name="mobile">
                                    </div>
                                    @error('mobile')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <select name="blood_group" id="blood_group"
                                        class="form-control custom-select  @error('blood_group') is-invalid @enderror">
                                        <option value="" selected disabled>Choose Blood Group ..</option>
                                        @foreach ($groups as $group)
                                        <option {{ old('blood_group') == $group->name? 'selected' : '' }}
                                            value="{{ $group->name }}">{{ $group->name }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @error('blood_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group mb-3">
                                <div class="col-sm-6">
                                    <select name="gender" id="gender" class="form-control custom-select">
                                        <option value="" selected disabled>Gender ..</option>
                                        <option {{ old('gender') == 'Male'? 'selected' : '' }} value="Male">
                                            Male
                                        </option>
                                        <option {{ old('gender') == 'Female'? 'selected' : '' }} value="Female">
                                            Female
                                        </option>
                                        <option {{ old('gender') == 'other'? 'selected' : '' }} value="other">
                                            Other
                                        </option>
                                    </select>

                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input id="dob" type="date" class="form-control" name="dob" value="{{ old('dob') }}"
                                        required2 autocomplete="dob">

                                    @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group mb-3">
                                <div class="col-sm-12">
                                    <select name="city" id="city" class="form-control custom-select">
                                        <option value="" selected disabled>Choose city ..</option>
                                        @foreach ($cities as $city)
                                        <option {{ old('city') == $city->name? 'selected' : '' }}
                                            value="{{ $city->name }}">
                                            {{ $city->name }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Password" name="password" required2 autocomplete="password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input id="password-confirm" type="password" placeholder="Password Confirm"
                                        class="form-control" name="password_confirmation" required2
                                        autocomplete="new-password">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Sign Up</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        Already Have Account? <a href="{{ Route('donor.showLoginForm') }}" class="text-primary">Login
                            here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
</body>

</html>
