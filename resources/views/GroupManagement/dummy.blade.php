{{--DATATABLES--}}
<link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.bootstrap4.min.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('css/custom.css')}}"/>

<script src="{{asset('js/dataTables/jQuery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables/dataTables.bootstrap4.min.js')}}"></script>

<script type="text/javascript" src="{{ asset('js/filestyle/bootstrap-filestyle.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/filestyle/bootstrap-filestyle.min.js') }}"></script>

<style>
		.container {
		margin-top:20px;
		}
		.image-preview-input {
			position: relative;
			overflow: hidden;
			margin: 0px;    
			color: #333;
			background-color: #fff;
			border-color: #ccc;    
		}
		.image-preview-input input[type=file] {
			position: absolute;
			top: 0;
			right: 0;
			margin: 0;
			padding: 0;
			font-size: 20px;
			cursor: pointer;
			opacity: 0;
			filter: alpha(opacity=0);
		}
		.image-preview-input-title {
			margin-left:2px;
		}
</style>

{{--  <script src="{{asset('js/navgoco/jquery-1.10.2.min.js')}}"></script>  --}}
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


<div class="col-md-3" style="background-color:#F5F5F5;">
	<div class="col-md-12" style="background-color:white;">
		@include('GroupManagement.treeList')
	</div>
</div>