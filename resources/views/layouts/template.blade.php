<!DOCTYPE html>
<html lang="en">

<head>
    <title>VIX &mdash; Website Articles</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('asset') }}/'fonts/icomoon/style.css'">

    <link rel="stylesheet" href="{{ asset('asset') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="{{ asset('asset') }}/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="{{ asset('asset') }}/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="{{ asset('asset') }}/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="{{ asset('asset') }}/css/aos.css">
    <link href="{{ asset('asset') }}/css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('asset') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/css/app.css"">

    <style>
        .article-link {

            color: white;
            text-decoration: none;
            background-color: #333;
            padding: 10px;
            border-radius: 4px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
            display: inline-block;
            margin-right: 10px;

        }
    </style>



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>



        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-6 d-flex">
                        <a href="index.html" class="site-logo">
                            VIX
                        </a>

                        <a href="#"
                            class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                                class="icon-menu h3"></span></a>

                    </div>
                    <div class="col-12 col-lg-6 ml-auto d-flex">
                        <div class="ml-md-auto top-social d-none d-lg-inline-block">
                            <a href="#" class="d-inline-block p-3"></a>
                            <a href="#" class="d-inline-block p-3"></a>
                            <a href="#" class="d-inline-block p-3"></a>
                        </div>
                        <form action="#" class="search-form d-inline-block">

                            <div class="d-flex">
                                <input type="email" class="form-control" placeholder="Football...">
                                {{-- <button type="submit" class="btn btn-secondary"><span
                                        class="glyphicon glyphicon-search" aria-hidden="true"></span></button> --}}
                            </div>
                        </form>


                    </div>
                    <div class="col-6 d-block d-lg-none text-right">

                    </div>
                </div>
            </div>
            <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">

                <div class="container">
                    <div class="d-flex align-items-center">

                        <div class="mr-auto">
                            <nav class="site-navigation position-relative text-right" role="navigation">
                                <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
                                    <li class="active">
                                        <a href="{{ route('articles.index') }}" class="nav-link text-left">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('articles.create') }}" class="nav-link text-left">Add
                                            Articles</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('categories.create') }}" class="nav-link text-left">Add
                                            Categories</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('categories.index') }}" class="nav-link text-left">List
                                            Categories</a>
                                    </li>
                                    @auth
                                        <li>
                                            <a href="{{ route('logout') }}" class="nav-link btn btn-link text-left"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    @endauth
                                </ul>
                            </nav>

                        </div>

                    </div>
                </div>

            </div>

        </div>



        <div class="site-section">
            @yield('content')
        </div>

    </div>
    <!-- .site-wrap -->



    <script src="{{ asset('asset') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('asset') }}/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="{{ asset('asset') }}/js/jquery-ui.js"></script>
    <script src="{{ asset('asset') }}/js/popper.min.js"></script>
    <script src="{{ asset('asset') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('asset') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('asset') }}/js/jquery.stellar.min.js"></script>
    <script src="{{ asset('asset') }}/js/jquery.countdown.min.js"></script>
    <script src="{{ asset('asset') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('asset') }}/js/jquery.easing.1.3.js"></script>
    <script src="{{ asset('asset') }}/js/aos.js"></script>
    <script src="{{ asset('asset') }}/js/jquery.fancybox.min.js"></script>
    <script src="{{ asset('asset') }}/js/jquery.sticky.js"></script>
    <script src="{{ asset('asset') }}/js/jquery.mb.YTPlayer.min.js"></script>




    <script src="{{ asset('asset') }}/js/main.js"></script>

</body>

</html>
