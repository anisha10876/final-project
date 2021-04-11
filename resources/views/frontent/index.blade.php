
@extends('frontent.layout.app')
@section('main')
<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner" id="top">
    <video autoplay muted loop id="bg-video">
        <source src="assets/images/video.mp4" type="video/mp4" />
    </video>

    <div class="video-overlay header-text">
        <div class="caption">
            <h6>Grab new set of wheels</h6>
            <h2>Best <em>car dealer</em> in town!</h2>
            <div class="main-button">
                <a href="{{route('contact')}}">Contact Us</a>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<!-- ***** Cars Starts ***** -->
<section class="section" id="trainers">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2>Featured <em>Cars</em></h2>
                    <img src="assets/images/line-dec.png" alt="">
                    <p>Nunc urna sem, laoreet ut metus id, aliquet consequat magna. Sed viverra ipsum dolor, ultricies fermentum massa consequat eu.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($cars->sortByDesc('created_at')->take(3) as $car)
            <div class="col-lg-4">
                <div class="trainer-item">
                    <div class="image-thumb">
                        @if($car->hasImage())
                        <img src="{{ asset($car->image) }}" height="200px" width="200px" alt="">
                        @else
                        <img src="{{ asset('images/b.jpg') }}" height="200px" width="200px" alt="">
                        @endif
                    </div>
                    <div class="down-content">
                            <span>
                                <sup>Rs</sup>&nbsp;{{ $car->price }}
                            </span>

                        <h4>{{ $car->name }}</h4>

                        <p>
                            <i class="fa fa-dashboard"></i> {{ $car->km }}km &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-cube"></i> {{ $car->cc }} cc &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-cog"></i> {{ $car->getCondition() }} &nbsp;&nbsp;&nbsp;
                        </p>

                        <ul class="social-icons">
                            <a class="btn btn-sm btn-primary" href="{{ route('cardetails',$car->id) }}">+ View Car</a>
                            <a class="btn btn-sm btn-outline-secondary text-dark float-right" href="{{ route('addToCompare',$car->id) }}">+ Add to Compare</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <br>

        <div class="main-button text-center">
            <a href="{{ route('cars') }}">View All Cars</a>
        </div>
    </div>
</section>
<!-- ***** Cars Ends ***** -->

{{-- Buy Car Section --}}

<!-- ***** Cars Starts ***** -->
<section class="section" id="trainers" style="background-color: #bebecd;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2>Become A<em>Seller</em></h2>
                    <img src="assets/images/line-dec.png" alt="">
                    <p>Register in our site and sell your car to get reasonable price range.</p>
                    <div class="text-center">
                        <a href="{{route('userdashboard')}}" class="btn btn-primary">Sell Your Car</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- Buy Car Section ENd --}}

<section class="section section-bg" id="schedule" style="background-image: url(assets/images/about-fullscreen-1-1920x700.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading dark-bg">
                    <h2>Read <em>About Us</em></h2>
                    <img src="assets/images/line-dec.png" alt="">
                    <p>We are building the platform to make buying and selling cars fun, fair, and accessible to everyone.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="cta-content text-center">
                    <p>Our purpose is to drive integrity by being honest & transparent in every interaction.</p>
                    <p>You know what you need better than we do. So when you visit one of our stores, we’ll let you take the lead. Go ahead, sit behind the wheel. Ask for a test drive. Every vehicle you see has a low, no-haggle price, so you can focus on what matters. Of course, our friendly sales consultants will always be there if you have any questions.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ***** Blog Start ***** -->
<section class="section" id="our-classes">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2>Read our <em>Blog</em></h2>
                    <img src="assets/images/line-dec.png" alt="">
                    <p>We present you with latest news from the motoring world.</p>
                </div>
            </div>
        </div>
        <div class="row" id="tabs">
            <div class="col-lg-4">
                <ul>
                    @foreach($blogs->sortByDesc('created_at') as $blog)
                        <li><a href='#tabs-{{$blog->id}}'>{{$blog->name}}</a></li>
                    @endforeach
                    <div class="main-rounded-button"><a href="{{route('blogs')}}">Read More</a></div>
                </ul>
            </div>
            <div class="col-lg-8">
                <section class='tabs-content'>
                    @foreach($blogs->sortByDesc('created_at') as $blog)
                    <article id='tabs-{{$blog->id}}'>
                        <img src="{{asset($blog->image)}}" alt="Blog Image">
                        <h4>{{$blog->name}}</h4>
                        <p>
                            <i class="fa fa-user"></i>{{$blog->author}} &nbsp;|&nbsp;
                            <i class="fa fa-calendar"></i> {{$blog->created_at->format('Y-m-d')}} &nbsp;|&nbsp;
                        </p>
                        <p>
                            {{ substr($blog->description,0,150) }}
                        </p>
                        <div class="main-button">
                            <a href="{{route('blogdetail',$blog->id)}}">Continue Reading</a>
                        </div>
                    </article>
                    @endforeach
                </section>
            </div>
        </div>
    </div>
</section>
<!-- ***** Blog End ***** -->

<!-- ***** Call to Action Start ***** -->
<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <h2>Send us a <em>message</em></h2>
                    <p>We will get in touch with you as soon as possible.</p>
                    <div class="main-button">
                        <a href="{{route('contact')}}">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Call to Action End ***** -->

<!-- ***** Testimonials Item Start ***** -->
<section class="section" id="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2>Read our <em>Testimonials</em></h2>
                    <img src="assets/images/line-dec.png" alt="waves">
                    <p>Hear what our clients think about our company and services we provide.</p>
                </div>
            </div>
            @foreach($testimonials as $testimonial)
                <div class="col-lg-6">
                    <ul class="features-items">
                        {{-- <li class="feature-item"> --}}
                            <div class="left-icon">
                                @if($testimonial->hasImage())
                                <img src="{{ asset($testimonial->image) }}" height="80px" width="80px" alt="First One">
                                @else
                                <img src="{{asset( 'images/b.jpg' )}}" height="200px" width="200px" alt="First One">
                                @endif
                            </div>
                            <div class="right-content">
                                <h4>{{$testimonial->name}}</h4>
                                <p><em>"{{$testimonial->description}}"</em></p>
                            </div>
                        {{-- </li> --}}
                    </ul>
                </div>
            @endforeach
        </div>

        <br>

        <div class="main-button text-center">
            <a href="{{route('testimonals')}}">Read More</a>
        </div>
    </div>
</section>
<!-- ***** Testimonials Item End ***** -->
@endsection

