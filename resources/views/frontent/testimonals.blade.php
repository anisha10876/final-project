@extends('frontent.layout.app')
@section('main')
<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>Read our <em>Testimonials</em></h2>
                    <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ***** Testimonials Item Start ***** -->
<section class="section" id="features">
    <div class="container">
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-6">
                @foreach($testomonals as $testomonal)
                <ul class="features-items">
                    <li class="feature-item">
                        <div class="left-icon">
                            @if($testomonal->hasImage())
                            <img src="{{ asset($testomonal->image) }}" height="80px" width="80px" alt="First One">
                            @else
                            <img src="{{asset( 'images/b.jpg' )}}" height="200px" width="200px" alt="First One">
                            @endif
                        </div>
                        <div class="right-content">
                            <h4>{{ $testomonal->name }}</h4>
                            <p><em>{{ $testomonal->description }}</em></p>
                        </div>
                    </li>
                </ul>
            </div>
            @endforeach
        </div>
</section>
@endsection
