<!DOCTYPE html>
<html>
	<head>
		<title></title>
		@include('admin.layouts.head')
		@yield('style')
	</head>
	<body class="hold-transition skin-purple sidebar-mini">
		
		<div class="wrapper">
			@include('admin.layouts.header')
			
			@include('admin.layouts.sidebar')
			@section('main-content')
			@show
			@include('admin.layouts.footer')
		</div>
		@yield('script')
		
	</body>
</html>