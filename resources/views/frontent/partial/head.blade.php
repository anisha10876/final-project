<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>PHPJabbers.com | Free Car Dealer Website Template</title>

    @include('frontent.partial.script')
    @yield('css')
</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- ***** Preloader End ***** -->


<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">Car Dealer<em> Website</em></a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{route('home')}}"> Home</a></li>
                        <li><a href="{{route('cars')}}">Cars</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('about')}}">About Us</a>
                                <a class="dropdown-item" href="{{route('blog')}}">Blog</a>
                                <a class="dropdown-item" href="{{route('team')}}">Team</a>
                                <a class="dropdown-item" href="{{route('testimonals')}}">Testimonials</a>
                                <a class="dropdown-item" href="{{route('faq')}}">FAQ</a>
                                <a class="dropdown-item" href="{{route('terms')}}">Terms</a>
                            </div>
                        </li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                        @guest
                        <li><a href="{{route('postlogin')}}">login</a></li>
                        @else
                        <li><a href="{{route('logout')}}">logout</a></li>
                        @endguest
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
            @include('backend.partial.messages')

        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
