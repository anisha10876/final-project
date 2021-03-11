@extends('frontent.layout.app')
@section('main')
<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>Single <em>blog post</em></h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ***** Blog Start ***** -->
<section class="section" id="our-classes">
    <div class="container">
        <br>
        <br>
        <section class='tabs-content'>
            <article>
                <h4>{{$blog->name}}</h4>

                <p>
                    <i class="fa fa-user"></i>{{$blog->author}} &nbsp;|&nbsp;
                    <i class="fa fa-calendar"></i> {{$blog->created_at->format('Y-m-d')}} &nbsp;|&nbsp;
                </p>

                <div>
                    <img src="{{asset($blog->image)}}" alt="Blog Image">
                </div>
                <br>
                <p>
                    {!! $blog->description !!}
                </p>
                <ul class="social-icons">
                    <li>Share this:</li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                </ul>
            </article>
        </section>

        <br>
        <br>
        <br>

        {{-- <section class='tabs-content'>
            <div class="row">
                <div class="col-md-8">
                    <h4>Comments</h4>
                    <ul class="features-items">
                        <li>
                            <div class="feature-item" style="margin-bottom:15px;">
                                <div class="left-icon">
                                    <img src="assets/images/features-first-icon.png" alt="First One">
                                </div>
                                <div class="right-content">
                                    <h4>John Doe <small>27.07.2020 10:10</small></h4>
                                    <p><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta numquam maxime voluptatibus, impedit sed! Necessitatibus repellendus sed deleniti id et!"</em></p>
                                </div>
                            </div>

                            <div class="tabs-content">
                                <div class="feature-item" style="margin-bottom:15px;">
                                    <div class="left-icon">
                                        <img src="assets/images/features-first-icon.png" alt="First One">
                                    </div>
                                    <div class="right-content">
                                        <h4>John Doe <small>27.07.2020 11:10</small></h4>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta numquam maxime voluptatibus, impedit sed! Necessitatibus repellendus sed deleniti id et!"</em></p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="feature-item" style="margin-bottom:15px;">
                            <div class="left-icon">
                                <img src="assets/images/features-first-icon.png" alt="second one">
                            </div>
                            <div class="right-content">
                                <h4>John Doe <small>27.07.2020 12:10</small></h4>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta numquam maxime voluptatibus, impedit sed! Necessitatibus repellendus sed deleniti id et!"</em></p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h4>Leave a comment</h4>

                    <div class="contact-form">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input name="name" type="text" id="name" placeholder="Your Name*" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email*" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button">Submit</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section> --}}
    </div>
</section>
@endsection
