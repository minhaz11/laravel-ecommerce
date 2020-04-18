<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('Frontend')}}/images/icons/favicon.png"/>
    <link href="{{asset('adminFrontend')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend')}}/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend')}}/fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend')}}/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend')}}/fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend')}}/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend')}}/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend')}}/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend')}}/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend')}}/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend')}}/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend')}}/vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend')}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend')}}/css/main.css">
<!--===============================================================================================-->


</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<span class="topbar-child1">
					Free shipping for standard order over $100
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
                        minhaz217@gmail.com
					</span>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="{{route('index')}}" class="logo">
                    <img src="{{asset('Frontend')}}/images/icons/logo.png" alt="IMG-LOGO">
                    <p class="font-weight-bold text-uppercase"><small>Amazing footwears</small></p>
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="{{route('index')}}">Home</a>
							</li>

							<li>
                                <a href="{{route('allProducts')}}">Shop</a>

							</li>

							<li class="sale-noti">
                                <a href="">Categories</a>
                                <ul class="sub_menu">
                                    @foreach ($categories as $cat)
                                     <li><a href="{{route('cat_product',['id'=> $cat->id])}}">{{$cat->categoryName}}</a></li>
                                    @endforeach
								</ul>
							</li>
							<li>
								<a href="about.html">About</a>
							</li>

							<li>
								<a href="contact.html">Contact</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
                    @if (Session::get('customer_id'))
                        <a href="{{route('logout_customer')}}" class="header-wrapicon1 dis-block">
                            Logout
                        </a>
                    @else
                       <a href="{{route('signUp')}}" class="header-wrapicon1 dis-block">
                            Login
                        </a>
                    @endif


					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="{{asset('Frontend')}}/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">{{$getTotalQuantity}}</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown" >
                            <ul class="header-cart-wrapitem">
                            @foreach ($getCartContents as $item)
                                <li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="{{asset('uploads/product_image')}}/{{$item->attributes->productImage}}" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<p  class="header-cart-item-name">
											{{$item->name}}
                                        </p>

										<span class="header-cart-item-info">
                                            ${{$item->price}}
                                        <p><small>Quan: {{$item->quantity}}</small></p>
										</span>
                                    </div>


								</li>
                            @endforeach
							</ul>

							<div class="header-cart-total">
                                @if ($getSubTotal==0)
                                    No items in cart
                                @else
                                Total: ${{$getSubTotal}}
                                @endif

							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{{$isEmpty==true? ' ': route('viewCart')}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
                                <a href="{{$isEmpty==true? ' ':route('clearCart')}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Clear Cart
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="{{route('index')}}" class="logo-mobile">
				<img src="{{asset('Frontend')}}/images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					@if (Session::get('customer_id'))
					<a href="{{route('logout_customer')}}" class="header-wrapicon1 dis-block">
						Logout
					</a>
				@else
				   <a href="{{route('signUp')}}" class="header-wrapicon1 dis-block">
						Login
					</a>
				@endif

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="{{asset('Frontend')}}/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">{{$getTotalQuantity}}</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								@foreach ($getCartContents as $item)
									<li class="header-cart-item">
										<div class="header-cart-item-img">
											<img src="{{asset('uploads/product_image')}}/{{$item->attributes->productImage}}" alt="IMG">
										</div>

										<div class="header-cart-item-txt">
											<p  class="header-cart-item-name">
												{{$item->name}}
											</p>

											<span class="header-cart-item-info">
												${{$item->price}}
											<p><small>Quan: {{$item->quantity}}</small></p>
											</span>
										</div>


									</li>
								@endforeach
								</ul>

							<div class="header-cart-total">
								@if ($getSubTotal==0)
								No items in cart
								@else
								Total: ${{$getSubTotal}}
								@endif
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{{$isEmpty==true? ' ': route('viewCart')}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
                                <a href="{{$isEmpty==true? ' ':route('clearCart')}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Clear Cart
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">

						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								fashe@example.com
							</span>

						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="{{route('index')}}">Home</a>

					</li>

					<li class="item-menu-mobile">
                     <a href="{{route('allProducts')}}">Shop</a>
					</li>

					<li class="item-menu-mobile">
                        <a>Category</a>
                        <ul class="sub-menu">
                            @foreach ($categories as $cat)
                            <li><a href="{{route('cat_product',['id'=> $cat->id])}}">{{$cat->categoryName}}</a></li>
                           @endforeach
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>
					<li class="item-menu-mobile">
						<a href="about.html">About</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.html">Contact</a>
					</li>
				</ul>
			</nav>
		</div>
    </header>


   @yield('content')

    <!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>

				<ul>
                    @foreach ($categories as $cat)
                    <li class="p-b-9"><a class="s-text7" href="{{route('cat_product',['id'=> $cat->id])}}">{{$cat->categoryName}}</a></li>
                    @endforeach

				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Partners
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
                            Addidas
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
                            Rebook
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Nike
						</a>
					</li>

				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Payment
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Paypal
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Cash On Delivery
						</a>
					</li>

				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div>
		</div>

		{{--  --}}
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('Frontend')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('Frontend')}}/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('Frontend')}}/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="{{asset('Frontend')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('Frontend')}}/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('Frontend')}}/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="{{asset('Frontend')}}/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('Frontend')}}/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('Frontend')}}/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('Frontend')}}/vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
    <script src="{{asset('Frontend')}}/js/main.js"></script>

    <!---====sign up customer--->
    <script src="{{asset('customer')}}/form.js"></script>

</body>
</html>
