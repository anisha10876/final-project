@extends('frontent.layout.app')
@section('main')
<section class="section" id="our-classes">
    <div class="container">
        <br>
        <br>
        <br>
        <div class="row" id="tabs">
            <div class="col-lg-4">
                <ul>
                    <li><a href='#tabs-1'><i class="fa fa-soccer-ball-o"></i> Our Goals</a></li>
                    <li><a href='#tabs-2'><i class="fa fa-briefcase"></i> Our Work</a></a></li>
                    <li><a href='#tabs-3'><i class="fa fa-heart"></i> Our Passion</a></a></li>
                </ul>
            </div>
            <div class="col-lg-8">
                <section class='tabs-content'>
                    <article id='tabs-1'>
                        <img src="assets/images/about-image-1-940x460.jpg" alt="">
                        <h4>Our Goals</h4>

                        <p>{{ $settings['about_goals'] ?? '' }}</p>
                    </article>
                    <article id='tabs-2'>
                        <img src="assets/images/about-image-2-940x460.jpg" alt="">
                        <h4>Our Work</h4>

                        <p>{{ $settings['about_work'] ?? '' }}</p>
                    </article>
                    <article id='tabs-3'>
                        <img src="assets/images/about-image-3-940x460.jpg" alt="">
                        <h4>Our Passion</h4>

                        <p>{{ $settings['about_passion'] ?? '' }}</p>
                    </article>
                </section>
            </div>
        </div>
    </div>
</section>
@endsection
