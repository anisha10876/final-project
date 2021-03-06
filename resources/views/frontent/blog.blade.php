@extends('frontent.layout.app')
@section('main')
<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>Read our <em>Blog</em></h2>
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
        <div class="row">
            <div class="col-lg-8">
                <section class='tabs-content'>
                    <article>
                        <img src="assets/images/blog-image-1-940x460.jpg" alt="">
                        <h4>Lorem ipsum dolor sit amet, consectetur adipisicing.</h4>

                        <p><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i>  15 comments</p>

                        <p>Phasellus convallis mauris sed elementum vulputate. Donec posuere leo sed dui eleifend hendrerit. Sed suscipit suscipit erat, sed vehicula ligula. Aliquam ut sem fermentum sem tincidunt lacinia gravida aliquam nunc. Morbi quis erat imperdiet, molestie nunc ut, accumsan diam.</p>
                        <div class="main-button">
                            <a href="#">Continue Reading</a>
                        </div>
                    </article>

                    <br>
                    <br>

                    <article>
                        <img src="assets/images/blog-image-2-940x460.jpg" alt="">
                        <h4>Aspernatur excepturi magni, placeat rerum nobis magnam libero! Soluta.</h4>
                        <p><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i>  15 comments</p>
                        <p>Integer dapibus, est vel dapibus mattis, sem mauris luctus leo, ac pulvinar quam tortor a velit. Praesent ultrices erat ante, in ultricies augue ultricies faucibus. Nam tellus nibh, ullamcorper at mattis non, rhoncus sed massa. Cras quis pulvinar eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                        <div class="main-button">
                            <a href="#">Continue Reading</a>
                        </div>
                    </article>

                </section>
            </div>

            <div class="col-lg-4">

                <h5 class="h5">Recent posts</h5>

                <ul>
                    <li>
                        <p><a href="#">Dolorum corporis ullam, reiciendis inventore est repudiandae</a></p>
                        <small><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10</small>
                    </li>

                    <li><br></li>

                    <li>
                        <p><a href="#">Culpa ab quasi in rerum dolorum impedit expedita</a></p>
                        <small><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10</small>
                    </li>

                    <li><br></li>

                    <li>
                        <p><a href="#">Explicabo soluta corrupti dolor doloribus optio dolorum</a></p>

                        <small><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10</small>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
