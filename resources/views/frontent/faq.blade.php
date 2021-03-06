@extends('frontent.layout.app')
@section('main')
<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>Read our <em>FAQ</em></h2>
                    <p>List of common questions that we get from our clientele.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ***** Our Classes Start ***** -->
<section class="section" id="our-classes">
    <div class="container">
        <br>
        <br>
        <br>

        <section class='tabs-content'>
            <article>
                @foreach($faqs as $faq)
                <h4><i class="fa fa-question-circle"></i> {{ $faq->title }}</h4>
                <p> <a href="#">{{ $faq->description }}</a> </p>

                <br>
                @endforeach
            </article>
        </section>
    </div>
</section>
@endsection
