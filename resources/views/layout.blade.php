<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="{{ asset('asset/img/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('asset/img/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('asset/img/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('asset/img/apple-touch-icon-114x114.png') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/fonts/font-awesome/css/font-awesome.css') }}">

    <!-- Slider
    ================================================== -->
    <link href="{{ asset('asset/css/owl.carousel.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('asset/css/owl.theme.css') }}" rel="stylesheet" media="screen">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/nivo-lightbox/nivo-lightbox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/nivo-lightbox/default.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">


    <!-- Mon style
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/more.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @livewireStyles
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Navigation
      ==========================================-->
    <nav id="menu" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand page-scroll" href="#page-top">AGRI FG</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#about" class="page-scroll">A Propos</a></li>
                    <li><a href="#services" class="page-scroll">Services</a></li>
                    <li><a href="#portfolio" class="page-scroll">Gallerie</a></li>
                    <li><a href="#testimonials" class="page-scroll">COmmentaires</a></li>
                    <li><a href="#contact" class="page-scroll">Contact</a></li>
                    <li><a href="/login" class="page-scroll" style="font-size: 2rem; font-weight: bold" title="Connectez-vous!">Admin</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    @yield('content')

  <!-- Footer Section -->
  <div id="footer">
    <div class="container text-center">
      <div class="col-md-8 col-md-offset-2">
        <div class="social">
          <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
          </ul>
        </div>
        <p>&copy; 2016 Landscaper. Designed by <a href="http://www.templatewire.com" rel="nofollow">TemplateWire</a></p>
      </div>
    </div>
    <!-- Footer Section End -->

    <!-- Js Plugins -->

    @livewireScripts


    {{-- <script type="text/javascript" src="{{ asset('asset/js/jquery.1.11.1.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('asset/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/SmoothScroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/nivo-lightbox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/jquery.isotope.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/owl.carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/jqBootstrapValidation.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/contact_me.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/main.js') }}"></script>



</body>

</html>
