<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets_pluginAdmin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_pluginAdmin/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_pluginAdmin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_pluginAdmin/vendors/jquery-bar-rating/css-stars.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_pluginAdmin/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_pluginAdmin/css/demo_1/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_pluginAdmin/css/demo_1/dataTables.bootstrap4.css') }}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/8l44e7m1Qq1NcTtrP5hZGce/6F44MPH7Wai0kc" crossorigin="anonymous">
    </script>
    <link rel="shortcut icon" href="{{ asset('assets_pluginAdmin/images/logo_djkn.png') }}" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="container-scroller">
        @include('layout.partial.sidebar')
        <div class="container-fluid page-body-wrapper">
            <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
            @include('layout.partial.settings_panel')
            @include('layout.partial.navbar')
            <div class="main-panel">
                <div class="content-wrapper pb-0">
                    @yield('content')
                </div>
                @include('layout.partial.footer')
            </div>
        </div>
    </div>
</body>
</html>
