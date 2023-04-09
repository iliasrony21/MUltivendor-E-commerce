
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('backend')}}/assets/images/favicon-32x32.png" type="image/png" />
	@include('admin.includes.css')
	<title>Admin Dashboard</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		@include('admin.includes.sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
		@include('admin.includes.header')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			 <div class="page-content">

             @yield('admin')
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		@include('admin.includes.footer')
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	@include('admin.includes.switcher')
	<!--end switcher-->
	<!-- Bootstrap JS -->
    @include('admin.includes.js')
</body>

</html>
