<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Admin Dashboard</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://coreui.io/demo/free/3.4.0/css/style.css" rel="stylesheet" />

    <link href="https://coreui.io/demo/free/3.4.0/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet" />
</head>

<body class="c-app">
    @include('admin.partials.sidebar')
    @include('admin.partials.navbar')
    <div class="c-body">
        @yield('content')
        @include('admin.partials.footer')
    </div>
    </div>

    <script src="https://coreui.io/demo/free/3.4.0/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <!--[if IE]><!-->
    <script src="https://coreui.io/demo/free/3.4.0/vendors/@coreui/icons/js/svgxuse.min.js"></script>
    <!--<![endif]-->

    <script src="https://coreui.io/demo/free/3.4.0/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
    <script src="https://coreui.io/demo/free/3.4.0/vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script src="https://coreui.io/demo/free/3.4.0/js/main.js"></script>
</body>

</html>
