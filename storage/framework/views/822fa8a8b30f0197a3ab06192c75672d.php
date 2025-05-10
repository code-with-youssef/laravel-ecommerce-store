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
	<link rel="shortcut icon" type="image/png" href="<?php echo e(secure_asset('assets/img/favicon.png')); ?>">
	<!-- fontawesome -->
	<link rel="stylesheet" href="<?php echo e(secure_asset('assets/css/all.min.css')); ?>">
	<!-- bootstrap -->
	<link rel="stylesheet" href="<?php echo e(secure_asset('assets/bootstrap/css/bootstrap.min.css')); ?>">
	<!-- owl carousel -->
	<link rel="stylesheet" href="<?php echo e(secure_asset('assets/css/owl.carousel.css')); ?>">
	<!-- magnific popup -->
	<link rel="stylesheet" href="<?php echo e(secure_asset('assets/css/magnific-popup.css')); ?>">
	<!-- animate css -->
	<link rel="stylesheet" href="<?php echo e(secure_asset('assets/css/animate.css')); ?>">
	<!-- mean menu css -->
	<link rel="stylesheet" href="<?php echo e(secure_asset('assets/css/meanmenu.min.css')); ?>">
	<!-- main style -->
	<link rel="stylesheet" href="<?php echo e(secure_asset('assets/css/main.css')); ?>">
	<!-- responsive -->
	<link rel="stylesheet" href="<?php echo e(secure_asset('assets/css/responsive.css')); ?>">


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
							<a href="<?php echo e(route('home.index')); ?>">
								<img src="<?php echo e(asset('assets/img/logo.png')); ?>"  alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li >
									<form class="search-form" action="<?php echo e(route('search')); ?>" method="GET" autocomplete="off" >
										<button type="submit" class="search-button">
										  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<circle cx="11" cy="11" r="8"></circle>
											<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
										  </svg>
										</button>
										<input type="search" name="query" placeholder="Search..." class="allow-select search-input">
									</form>
								</li>
								<li><a href="<?php echo e(route("about")); ?>"> من نحن</a>
								</li>
								<li><a href="<?php echo e(route("theMost.index")); ?>">رائج الان</a>
								</li>
								<?php if (isset($component)) { $__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df = $attributes; } ?>
<?php $component = App\View\Components\NavLink::resolve(['route' => 'products.index','label' => 'جميع المنتجات'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\NavLink::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df)): ?>
<?php $attributes = $__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df; ?>
<?php unset($__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df)): ?>
<?php $component = $__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df; ?>
<?php unset($__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df); ?>
<?php endif; ?>
								<?php if (isset($component)) { $__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df = $attributes; } ?>
<?php $component = App\View\Components\NavLink::resolve(['route' => 'home.index','label' => 'الرئيسية'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\NavLink::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df)): ?>
<?php $attributes = $__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df; ?>
<?php unset($__attributesOriginal5c5186fe0c5c5f30b7e4c343793be4df); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df)): ?>
<?php $component = $__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df; ?>
<?php unset($__componentOriginal5c5186fe0c5c5f30b7e4c343793be4df); ?>
<?php endif; ?>
										
								<li>
									<a href="#"><i class="fas fa-user"></i></a>
										<ul class="sub-menu">
											
											<?php if(Auth::check()): ?>
											<?php if($currentUser->is_admin): ?>
											<li>
												<a href="<?php echo e(route('dashboard')); ?>" target="_blank"><i class="fas fa-tachometer-alt"></i>لوحة التحكم</a>
											</li>
											<?php endif; ?>
											<li>
												<a href="<?php echo e(route('cart.index',$currentUser)); ?>"><i class="fas fa-shopping-cart"></i>عربة التسوق</a>
											</li>
											<li><a href="<?php echo e(route('orders.index',$currentUser)); ?>">الطلبات</a></li>
												<li><a href="<?php echo e(route('profile.index')); ?>">الملف الشخصي</a></li>
												<li><a href="<?php echo e(route('logout')); ?>">تسجيل خروج</a></li>
											
											<?php else: ?> 
												<li><a href="<?php echo e(route('login.index')); ?>">تسجيل دخول</a></li>
												<li><a href="<?php echo e(route('register.index')); ?>">سجل لاول مرة</a></li>
											<?php endif; ?>
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

	




<?php echo $__env->yieldContent('content'); ?>








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
	<script src="<?php echo e(asset('assets/js/jquery-1.11.3.min.js')); ?>"></script>
	<!-- bootstrap -->
	<script src="<?php echo e(asset('assets/bootstrap/js/bootstrap.min.js')); ?>"></script>
	<!-- count down -->
	<script src="<?php echo e(asset('assets/js/jquery.countdown.js')); ?>"></script>
	<!-- isotope -->
	<script src="<?php echo e(asset('assets/js/jquery.isotope-3.0.6.min.js')); ?>"></script>
	<!-- waypoints -->
	<script src="<?php echo e(asset('assets/js/waypoints.js')); ?>"></script>
	<!-- owl carousel -->
	<script src="<?php echo e(asset('assets/js/owl.carousel.min.js')); ?>"></script>
	<!-- magnific popup -->
	<script src="<?php echo e(asset('assets/js/jquery.magnific-popup.min.js')); ?>"></script>
	<!-- mean menu -->
	<script src="<?php echo e(asset('assets/js/jquery.meanmenu.min.js')); ?>"></script>
	<!-- sticker js -->
	<script src="<?php echo e(asset('assets/js/sticker.js')); ?>"></script>
	<!-- main js -->
	<script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>

</body>
</html>

<?php /**PATH F:\E-commerce app\E-commerce-app\resources\views/Layouts/master.blade.php ENDPATH**/ ?>