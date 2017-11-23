@extends('header.logoheader')
@section('more_script')
    <script src="{{asset('js/navgoco/jquery-1.10.2.min.js')}}"></script>
		<script src="{{asset('js/navgoco/jquery.cookie.js')}}"></script>
		<!-- Add navgoco main js and css files  -->

        <script src="{{asset('js/navgoco/highlight.pack.js')}}"></script>
		<script src="{{asset('js/navgoco/demo.js')}}"></script>

		<script type="text/javascript" src="{{asset('js/navgoco/jquery.navgoco.js')}}"></script>
        <link rel="stylesheet" type="text/css" href="{{asset('css/navgoco/jquery.navgoco.css')}}" media="screen" />
        
        <script type="text/javascript" id="demo1-javascript">
			$(document).ready(function() {
				// Initialize navgoco with default options
				$("#demo1").navgoco({
					caretHtml: '',
					accordion: false,
					openClass: 'open',
					save: true,
					cookie: {
						name: 'navgoco',
						expires: false,
						path: '/'
					},
					slide: {
						duration: 400,
						easing: 'swing'
					},
					// Add Active class to clicked menu item
					onClickAfter: active_menu_cb,
				});

				$("#collapseAll").click(function(e) {
					e.preventDefault();
					$("#demo1").navgoco('toggle', false);
				});

				$("#expandAll").click(function(e) {
					e.preventDefault();
					$("#demo1").navgoco('toggle', true);
				});
			});
	</script>
@endsection