<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>JO - Store</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
	<!-- owl carousel -->
	<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
	<!-- magnific popup -->
	<link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
	<!-- animate css -->
	<link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
	<!-- mean menu css -->
	<link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}">
	<!-- main style -->
	<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="{{route('home.index')}}">
								<img src="{{asset('assets/img/logo.png')}}"  alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li >
									<form class="search-form" action="{{route('search')}}" method="GET" autocomplete="off" >
										<button type="submit" class="search-button">
										  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<circle cx="11" cy="11" r="8"></circle>
											<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
										  </svg>
										</button>
										<input type="search" name="query" placeholder="Search..." class="allow-select search-input">
									</form>
								</li>
								<li><a href="{{route("about")}}"> من نحن</a>
								</li>
								<li><a href="{{route("theMost.index")}}">رائج الان</a>
								</li>
								<x-nav-link route="products.index" label="جميع المنتجات" />
								<x-nav-link route="home.index" label="الرئيسية" />
										
								<li>
									<a href="#"><i class="fas fa-user"></i></a>
										<ul class="sub-menu">
											{{--if there is a token, then the user is logged in--}}
											@if(Auth::check())
											@if($currentUser->is_admin)
											<li>
												<a href="{{route('dashboard')}}" target="_blank"><i class="fas fa-tachometer-alt"></i>لوحة التحكم</a>
											</li>
											@endif
											<li>
												<a href="{{route('cart.index',$currentUser)}}"><i class="fas fa-shopping-cart"></i>عربة التسوق</a>
											</li>
											<li><a href="{{ route('orders.index',$currentUser)}}">الطلبات</a></li>
												<li><a href="{{ route('profile.index') }}">الملف الشخصي</a></li>
												<li><a href="{{ route('logout')}}">تسجيل خروج</a></li>
											{{--if there is no token just show the login and register options--}}
											@else 
												<li><a href="{{ route('login.index') }}">تسجيل دخول</a></li>
												<li><a href="{{ route('register.index') }}">سجل لاول مرة</a></li>
											@endif
										</ul>
								</li>
								
								
							


							</ul>
						</nav>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
	
	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<input type="text">
							<button type="submit">بحث <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->

	




@yield('content')








<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">من نحن</h2>
						<p>J× Store – متجر إلكتروني موثوق يوفر لك أفضل المنتجات بأسعار مناسبة وتجربة تسوّق سهلة وآمنة.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">تواصل معنا</h2>
						<ul>
							<li>youssef.ashraf.othman.ali@gmail.com</li>
							<li>01129423668</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">للاشتراك</h2>
						<p>اشترك ليصلك اخرالعروض.</p>
						<form action="/">
							<input type="email" placeholder="Email">
							<button type="submit"><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->
	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>حقوق النشر &copy; 2025 - <a href="https://www.linkedin.com/in/youssef-ashraf-7a8721249/">Youssef Ashraf</a>,كل الحقوق محفوظة.<br>
					</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="{{asset('assets/js/jquery-1.11.3.min.js')}}"></script>
	<!-- bootstrap -->
	<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
	<!-- count down -->
	<script src="{{asset('assets/js/jquery.countdown.js')}}"></script>
	<!-- isotope -->
	<script src="{{asset('assets/js/jquery.isotope-3.0.6.min.js')}}"></script>
	<!-- waypoints -->
	<script src="{{asset('assets/js/waypoints.js')}}"></script>
	<!-- owl carousel -->
	<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
	<!-- magnific popup -->
	<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
	<!-- mean menu -->
	<script src="{{asset('assets/js/jquery.meanmenu.min.js')}}"></script>
	<!-- sticker js -->
	<script src="{{asset('assets/js/sticker.js')}}"></script>
	<!-- main js -->
	<script src="{{asset('assets/js/main.js')}}"></script>

</body>
</html>

