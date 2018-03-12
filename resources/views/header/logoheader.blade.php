<head>
    <meta charset="UTF-8">
    <title> @yield('htmlheader_title', 'Your title here') </title>

    @include('header.favico')

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="{{ asset('/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->    <!-- Theme style -->
    

    <link href="{{ asset('/css/skins/skin-blue-light.css') }}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{ asset('/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />

    <!-- tab button -->
    <link href="{{ asset('/css/button.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('/css/searchbox.css') }}" rel="stylesheet" type="text/css" />
    {{--  <link href="{{ asset('/css/reporttable.css') }}" rel="stylesheet" type="text/css" />  --}}

    <style type="text/css">
        .imgmenu {
            filter: gray; /* IE6-9 */
            filter: grayscale(1); /* Microsoft Edge and Firefox 35+ */
            -webkit-filter: opacity(0.3); /* Google Chrome, Safari 6+ & Opera 15+ */
          } 
        body{
            background-color: #F5F5F5;
        }
    </style>

    @yield('header_css')

    <link href="{{ asset('/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    {{--  <script src="{{ asset('js/jquery.tablesorter.js') }}"></script>
    <script src="{{ asset('js/jquery.tablesorter.widget.js') }}"></script>
    <script src="{{ asset('js/jquery.pager.js') }}"></script>  --}}

    @yield('more_script')

</head>