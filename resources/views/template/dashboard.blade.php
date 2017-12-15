<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Splash">
    <meta name="author" content="Alan Roberto Neri Martinez">
    <title>Sysven</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('../assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('css/colors/red-dark.css') }}" id="theme" rel="stylesheet">
    <!-- ============================================================== -->
    <!-- EasyAutocomplete CSS -->
    <!-- ============================================================== -->
    <link href="{{ asset('vendor/easyautocomplete/dist/easy-autocomplete.min.css') }}" id="theme" rel="stylesheet">
    <link href="{{ asset('vendor/easyautocomplete/dist/easy-autocomplete.themes.min.css') }}" id="theme" rel="stylesheet">

</head>

<body class="fix-header fix-sidebar card-no-border">

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    {{--<div class="preloader">--}}
        {{--<svg class="circular" viewBox="25 25 50 50">--}}
            {{--<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>--}}
        {{--</svg>--}}
    {{--</div>--}}
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('template.topbar')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('template.left-sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->


        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->

        @if(session()->has('message'))

            <div class='notifications bottom-right' id="notification"></div>
            <input type="hidden" id="message" value="{{ session()->get('message') }}">
            <input type="hidden" id="type_alert" value="{{ session()->get('type_alert') }}">

        @endif

        @yield('page-wrapper')
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center">
        © 2017 Sysven by Alan Neri - <code>alanneri10@gmail.com</code>
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('../assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('../assets/plugins/bootstrap/js/tether.min.js') }}"></script>
    <script src="{{ asset('../assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- Flot Charts JavaScript -->
    <script src="{{ asset('../assets/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('../assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('js/flot-data.js') }}"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{ asset('../assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>
    <!-- ============================================================== -->
    <!-- Notify -->
    <!-- ============================================================== -->
    <script src="{{ asset('js/bootstrap-notify.js') }}"></script>
    <!-- ============================================================== -->
    <!-- EasyAutocomplete scripts -->
    <!-- ============================================================== -->
    <script src="{{ asset('vendor/easyautocomplete/dist/jquery.easy-autocomplete.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- Owner scripts -->
    <!-- ============================================================== -->
    <script src="{{ asset('js/script.js') }}"></script>


</body>

</html>
