@extends('frontent.layout.app')
@section('main')
<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>Meet our <em>Team</em></h2>
                    <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section" id="trainers">
    <div class="container">
        <br>
        <br>
        <div class="row">
            @foreach($teams as $team)
            <div class="col-md-3 col-sm-6">
                <div class="trainer-item">
                    <div class="image-thumb">
                        @if($team->hasImage())
                        <img src="{{ asset($team->image) }}" height="300px" width="300px" alt="">
                        @else
                        <img src="{{ asset('images/b.jpg') }}" height="200px" width="200px" alt="">
                        @endif
                    </div>
                    <div class="down-content">
                        <span>{{ $team->designation }}</span>
                        <h4>{{ $team->name}}</h4>
                        <p>{{ $team->description }}</p>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
