

@extends('frontent.layout.app')
@section('main')

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Our <em>Cars</em></h2>
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
<section class="section" id="trainers">
    <div class="container">
        <br>
        <br>
        <div class="contact-form">
            <form action="{{ route('filtercars') }}" method="get" id="contact">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Brands: {{ $brand->name }}</label>
                            <select name="brand" id="brand">
                                @foreach($brands as $b)
                                <option value="{{ $b->id }}" @if($b->id == $brand->id) selected @endif>{{ $b->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                <div class="col-sm-4 offset-sm-4">
                    <div class="main-button text-center">
                        {{-- <a href="#">Search</a> --}}
                        <button type="submit"> Search </button>
                    </div>
                </div>
                <br>
                <br>
            </form>
        </div>

        <div class="row">

            @foreach($carbrands as $car)
            <div class="col-lg-4">
                <div class="trainer-item">
                    <div class="image-thumb">
                        @if($car->hasImage())
                        <img src="{{ asset($car->image) }}" height="200px" width="200px" alt="">
                        @else
                            <img src="{{ asset("images/b.jpg") }}" height="200px" width="200px" alt="">
                        @endif
                    </div>
                    <div class="down-content">
                            <span>
                                <del><sup>$</sup>{{ $car->price+500 }} </del> &nbsp; <sup>$</sup>{{ $car->price }}
                            </span>

                        <h4>{{ $car->name }}</h4>

                        <p>
                            <i class="fa fa-dashboard"></i> {{ $car->km }} km &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-cube"></i> {{ $car->cc }} cc &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-cog"></i> {{ $car->condition }} &nbsp;&nbsp;&nbsp;
                        </p>

                        <ul class="social-icons">
                            <li><a href="car-details.html">+ View Car</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
         <br><br>

        <nav>
            <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</section>
<!-- ***** Fleet Ends ***** -->
@endsection
