<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Regina</title>
    <link rel="stylesheet" href="{{ asset('dashboard/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/js/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/vertical-layout-light/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('dashboard/images/icon.png') }}" />
</head>

<body>
    <div class="container-scroller">

        @include('layouts.partials.navbar')
        <div class="container-fluid page-body-wrapper">

            @include('layouts.partials.sidebar')


            <div class="main-panel">

                @yield('content')


                @include('layouts.partials.footer')

            </div>

        </div>

    </div>

    <script src="{{ asset('dashboard/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('dashboard/js/dataTables.select.min.js') }}"></script>

    <script src="{{ asset('dashboard/js/off-canvas.js') }}"></script>
    <script src="{{ asset('dashboard/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('dashboard/js/template.js') }}"></script>
    <script src="{{ asset('dashboard/js/settings.js') }}"></script>
    <script src="{{ asset('dashboard/js/todolist.js') }}"></script>
    <script src="{{ asset('dashboard/js/dashboard.js') }}"></script>
    <script src="{{ asset('dashboard/js/Chart.roundedBarCharts.js') }}"></script>
</body>

</html>
