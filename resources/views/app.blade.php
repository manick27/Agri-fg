
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="icon" href="{{ asset('frontend/images/icon.png') }}" type="image/icon type">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/line-awesome.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/jquery.range.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/line-awesome-font-awesome.min.css') }}">
	<link href="{{ asset('frontend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/jquery.mCustomScrollbar.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/lib/slick/slick.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/lib/slick/slick-theme.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style1.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/responsive.css') }}">

	<script type="text/javascript" src="{{ asset('frontend/js/upload.js') }}"></script>

	<link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}" type="text/css">

	@livewireStyles
  	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
</head>

<body>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{ asset('asset/img/logo.png') }}" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <!-- <div class="header__top__right__language">
                <img src="{{ asset('asset/img/language.png') }}" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div> -->
			@if(Auth::user())
				<div class="header__top__right__auth">
					<a href="/user-profile"><i class="fa fa-user"></i> {{ Auth::user()->name }} - {{ Auth::user()->available }} FCFA</a>
				</div>
				@if(Auth::user()->is_admin == 1)

				<div class="header__top__right__auth">
					<a href="/admin"> Admin</a>
				</div>
				@endif
				<div class="header__top__right__auth">
					<a href="/logout"> Déconnexion</a>
				</div>
			@else
				<div class="header__top__right__auth">
					<a href="/login"><i class="fa fa-user"></i> Connectez Vous</a>
				</div>
			@endif
		</div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                             <!-- <div class="header__top__right__language">
                                <img src="{{ asset('asset/img/language.png') }}" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div> -->
							@if(Auth::user())
								<div class="header__top__right__auth">
									<a href="/user-profile"><i class="fa fa-user"></i> {{ Auth::user()->name }} - {{ Auth::user()->available }} FCFA</a>
								</div>
								@if(Auth::user()->is_admin == 1)

								<div class="header__top__right__auth">
									<a href="/admin"> Admin</a>
								</div>
								@endif
								<div class="header__top__right__auth">
									<a href="/logout"> Déconnexion</a>
								</div>
							@else
								<div class="header__top__right__auth">
									<a href="/login"><i class="fa fa-user"></i> Connectez Vous</a>
								</div>
							@endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <!-- Header Section End -->


		@livewireScripts

		@yield('content')

		<script>
			window.livewire.on('show-notifications', () => {
				$('#notification').css('display','block');
			})
		</script>

		<script>
			$('#main').bind("click", ToggleDisplay);
			function ToggleDisplay() {
				$(".user-account-settingss").hide();
				$("#notification").hide();
			}

			$('#main1').bind("click", ToggleDisplay);
			function ToggleDisplay() {
				$(".user-account-settingss").hide();
				$("#notification").hide();
			}

			$(function(){
				var $overlay = $('#widget #overlay'),
					$textarea = $('#widget textarea')
				;
				$textarea.css({
					textIndent: $overlay.width() + 'px'
				});
			});
		</script>

<script src="{{ asset('ecom/js/jquery.min.js') }}"></script>
		<script src="{{ asset('ecom/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('ecom/js/slick.min.js') }}"></script>
		<script src="{{ asset('ecom/js/nouislider.min.js') }}"></script>
		<script src="{{ asset('ecom/js/jquery.zoom.min.js') }}"></script>
		<script src="{{ asset('ecom/js/main.js') }}"></script>



		<script src="{{ asset('asset/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('asset/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('asset/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('asset/js/main.js') }}"></script>

</html>
