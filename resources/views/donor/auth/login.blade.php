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
    <div class="header bg-gradient-primary py-6 py-lg-6">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        <h2><a href="{{ env('APP_URL')  }}" class="">Back</a></h2>
                        <h1 class="text-white">Welcome!</h1>
                        <p class="text-lead text-white">Use this awesome form to login in
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
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>Sign in with</small>
                        </div>
                        @if(Session::has('message'))
                        <div class="text-center">
                            <p class="text-danger font-weight-bold">{{ Session::get('message') }}</p>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('donor.login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="ni ni-email-83"></i>
                                        </span>
                                    </div>
                                    <input class="form-control" placeholder="Email" type="text" name="mobile">
                                </div>
                                @error('mobile')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="ni ni-lock-circle-open"></i>
                                        </span>
                                    </div>
                                    <input class="form-control" placeholder="Password" type="password" name="password">
                                </div>
                                @error('password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Sign in</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        Create Account? <a href="{{ Route('donor.showRegisterForm') }}" class="text-primary">Register
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
