<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Admin Login</title>

    <link href="https://coreui.io/demo/free/3.4.0/css/style.css" rel="stylesheet">
</head>

<body class="c-app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <form action="{{ Route('admin.login') }}" method="post">
                    @csrf
                    <div class="card p-4">
                        <div class="card-body">
                            <h1 class="text-center">Admin Login</h1>
                            <p class="text-muted">Sign In to your account</p>
                            <div class="input-group mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <svg class="c-icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                        </svg>
                                    </span>
                                </div>
                                <input class="form-control" type="text" placeholder="email" name="email"
                                    value="{{ old('email') }}">
                            </div>
                            @error('email')
                            <p class="text-danger">{{ $message }} </p>
                            @enderror
                            <div class="input-group mt-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <svg class="c-icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                        </svg>
                                    </span>
                                </div>
                                <input class="form-control" type="password" name="password" placeholder="Password">
                            </div>
                            @error('password')
                            <p class="text-danger">{{ $message }} </p>
                            @enderror
                            <div class="row mt-4">
                                <div class="col-6">
                                    <button class="btn btn-primary px-4">Login</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
        <!--[if IE]><!-->
        <script src="vendors/@coreui/icons/js/svgxuse.min.js"></script>
        <!--<![endif]-->
</body>

</html>
