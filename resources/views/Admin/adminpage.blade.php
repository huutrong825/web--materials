<!DOCTYPE HTML>
<html>
	<head>
		<title>Admin Manager</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
		SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href="{{asset('css/styleadmin.css')}}" rel="stylesheet" >
		<!-- Bootstrap Core CSS -->
		<link href="{{asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css' />

		<!-- Custom CSS -->
		<link href="{{asset('css/style.css')}}" rel='stylesheet' type='text/css' />

		<link href="{{asset('css/admin.style.css')}}" rel='stylesheet' type='text/css' />
		<!-- font-awesome icons CSS -->
		<link href="{{asset('css/font-awesome.css')}}" rel="stylesheet"> 
		<!-- //font-awesome icons CSS-->

		<!-- side nav css file -->
		<link href="{{asset('css/SidebarNav.min.css')}}" media='all' rel='stylesheet' type='text/css'/>
		<!-- //side nav css file -->
		
		<!-- js-->
		<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
		<script src="{{asset('js/modernizr.custom.js')}}"></script>

		<!--webfonts-->
		<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
		<!--//webfonts--> 

		<!-- chart -->
		<script src="{{asset('js/Chart.js')}}"></script>
		<!-- //chart -->

		<!-- Metis Menu -->
		<script src="{{asset('js/metisMenu.min.js')}}"></script>
		<script src="{{asset('js/custom.js')}}"></script>
		<link href="{{asset('css/custom.css')}}" rel="stylesheet">

		<!--//Metis Menu -->
		
		

			<!-- requried-jsfiles-for owl -->
							<link href="{{asset('css/owl.carousel.css')}}" rel="stylesheet">
							<script src="{{asset('js/owl.carousel.js')}}"></script>
								<script>
									$(document).ready(function() {
										$("#owl-demo").owlCarousel({
											items : 3,
											lazyLoad : true,
											autoPlay : true,
											pagination : true,
											nav:true,
										});
									});
								</script>
							<!-- //requried-jsfiles-for owl -->
	</head> 
	
	<body class="cbp-spmenu-push">
		<div class="main-content">
			<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
				<!--left-fixed -navigation-->
				<aside class="sidebar-left">
					<nav class="navbar navbar-inverse">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<h1><a class="navbar-brand" href="index.html"><span class="fa fa-area-chart"></span> Glance<span class="dashboard_text">Admin Manager</span></a></h1>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="sidebar-menu">
							<li class="header">MAIN NAVIGATION</li>
							<li class="treeview">
								<a href="{{route('adminp')}}">
								<i class="fa fa-dashboard"></i> <span>Dashboard</span>
								</a>
							</li>
							<li class="treeview">
								<a href="#">
								<i class="fa fa-laptop"></i>
								<span>Sản phẩm</span>
								<i class="fa fa-angle-left pull-right"></i>
								</a>
								<ul class="treeview-menu">
									<li><a href="{{route('allprod')}}"><i class="fa fa-angle-right"></i> Tất cả</a></li>
									<li><a href="{{route('prodlist')}}"><i class="fa fa-angle-right"></i> Danh sách</a></li>
								</ul>
							</li>
							<li class="treeview">
								<a href="{{route('catelist')}}">
								<i class="fa fa-pie-chart"></i>
								<span>Loại hàng</span>
								</a>
							</li>
							<li class="treeview">
							<li>
								<a href="{{route('supplist')}}">
								<i class="fa fa-th"></i> <span>Nhà cung ứng</span>
								</a>
							</li>
							<li class="treeview">
								<a href="#">
								<i class="fa fa-laptop"></i>
								<span>Thống kê báo cáo</span>
								<i class="fa fa-angle-left pull-right"></i>
								</a>
								<ul class="treeview-menu">
								<li><a href="{{route('all')}}"><i class="fa fa-angle-right"></i> Tổng quan</a></li>
								<li><a href="{{route('BillOrder')}}"><i class="fa fa-angle-right"></i> Danh sách hóa đơn</a></li>
								<li><a href="{{route('turnoner')}}"><i class="fa fa-angle-right"></i> Doanh số</a></li>
								</ul>
							</li>
							
							<li class="treeview">
								<a href="#">
								<i class="fa fa-folder"></i> <span>Nhập hàng</span>
								<i class="fa fa-angle-left pull-right"></i>
								</a>
								<ul class="treeview-menu">
								<li><a href="{{route('inputImp')}}"><i class="fa fa-angle-right"></i> Import</a></li>
								</ul>
							</li>
							<li class="treeview">
								<a href="#">
								<i class="fa fa-folder"></i> <span>Người dùng</span>
								<i class="fa fa-angle-left pull-right"></i>
								</a>
								<ul class="treeview-menu">
								<li><a href="{{route('userlist')}}"><i class="fa fa-angle-right"></i> Danh sách</a></li>
								<li><a href="{{route('ThemUser')}}"><i class="fa fa-angle-right"></i> Thêm</a></li>
								<li><a href="{{route('Change')}}"><i class="fa fa-angle-right"></i>Quyền quản trị</a></li>
								</ul>
							</li>
							<li class="header">LABELS</li>
							<li><a href="{{route('home')}}"><i class="fa fa-angle-right text-yellow"></i> <span>Exit</span></a></li>							
							</ul>
						</div>
					</nav>
				</aside>
			</div>
				<!--left-fixed -navigation-->
				
				<!-- header-starts -->
			<div class="sticky-header header-section ">
				<div class="header-left">
					<!--toggle button start-->
					<button id="showLeftPush"><i class="fa fa-bars"></i></button>
					<!--toggle button end-->
					
					<!--notification menu end -->
					<div class="clearfix"> </div>
				</div>
				<div class="header-right">						
					<div class="profile_details">		
						<ul>
							<li class="dropdown profile_details_drop">								
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="">
								@auth
									<div class="profile_img">	
										<span class="prfil-img"><img src="{{asset('images/2.jpg')}}" alt=""> </span> 
										<div class="user-name">
											<p>{{Auth::User()->name}}</p>
											<span>{{Auth::User()->Type}}</span>
										</div>
										<i class="fa fa-angle-down lnr"></i>
										<i class="fa fa-angle-up lnr"></i>
										<div class="clearfix"></div>	
									</div>	
								</a>
								
								<ul class="dropdown-menu drp-mnu">
									<li> <a href="{{route('SuaUser',['id'=>Auth::User()->id])}}"><i class="fa fa-cogs"></i> Settings</a> </li> 
									<li> <a href="{{route('ProfileAD')}}"><i class="fa fa-suitcase"></i> Profile</a> </li> 
									<li> <a href="{{route('LogoutAD')}}"><i class="fa fa-sign-out"> Logout</i></a> </li>
								</ul>
								@endauth								
							</li>
						
						</ul>
					</div>
					<div class="clearfix"> </div>				
				</div>
				<div class="clearfix"> </div>	
			</div>
			<!-- //header-ends -->

			<!-- main content start-->
			
			<div id="page-wrapper">
			@yield('content')
			</div>
			
		
			<div class="footer">
				<p>&copy; <?php echo date('m/Y'); ?> Quản lý vật liệu xây dựng | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>		
			</div>

		</div>
			

		
		
		

	
		
		<!-- Classie --><!-- for toggle left push menu script -->
			<!-- Classie --><!-- for toggle left push menu script -->
			<script src="{{asset('js/classie.js')}}"></script>
			<script>
				var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
					showLeftPush = document.getElementById( 'showLeftPush' ),
					body = document.body;
					
				showLeftPush.onclick = function() {
					classie.toggle( this, 'active' );
					classie.toggle( body, 'cbp-spmenu-push-toright' );
					classie.toggle( menuLeft, 'cbp-spmenu-open' );
					disableOther( 'showLeftPush' );
				};
				

				function disableOther( button ) {
					if( button !== 'showLeftPush' ) {
						classie.toggle( showLeftPush, 'disabled' );
					}
				}
			</script>
		<!-- //Classie --><!-- //for toggle left push menu script -->
			
		<!--scrolling js-->
		<script src="{{asset('js/jquery.nicescroll.js')}}"></script>
		<script src="{{asset('js/scripts.js')}}"></script>
		<!--//scrolling js-->
		
		<!-- side nav js -->
		<script src="{{asset('js/SidebarNav.min.js')}}" type='text/javascript'></script>
		<script>
		$('.sidebar-menu').SidebarNav()
		</script>
		<!-- //side nav js -->  
		<!-- Bootstrap Core JavaScript -->
		<script src="{{asset('js/bootstrap.js')}}"> </script>
		<!-- //Bootstrap Core JavaScript -->
		
	</body>
</html>