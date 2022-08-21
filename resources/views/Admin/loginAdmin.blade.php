<!DOCTYPE HTML>
<html>
	<head>
		<title>Admin Manager</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
		SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		
		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

		<!-- Custom CSS -->
		<link href="css/style.css" rel='stylesheet' type='text/css' />

		<!-- font-awesome icons CSS -->
		<link href="css/font-awesome.css" rel="stylesheet"> 
		<!-- //font-awesome icons CSS-->

	<body>
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h2 class="title1">Login</h2>
				<div class="widget-shadow">
					<div class="login-body">
						@if(count($errors)>0)
							<div class="alert alert-danger">
								@foreach($errors->all() as $err)
									{{$err}}<br>
								@endforeach
							</div>
						@endif
						@if(session('thongbao'))
							<div class="alert alert-success">
								{{session('thongbao')}}
							</div>
						@endif
						<form action="{{route('LoginAD')}}" method="post">
						@csrf
							<input type="email" class="user" name="email" id="email" placeholder="Enter Email" required="">
							<input type="password" name="password" id="password" class="lock" placeholder="Password" required="">
							<div class="forgot-grid">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Remember me</label>
								<div class="forgot">
									<a href="#">forgot password?</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<input type="submit" name="Sign In" value="Sign In">							
						</form>
					</div>
				</div>			
			</div>
		</div>
	</body>
</html>