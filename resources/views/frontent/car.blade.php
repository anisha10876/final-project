

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
        <div class="contact-form">
            <form action="{{ route('filtercars') }}" method="get" id="contact">
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Car Name">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label>Brands:</label>
                            <a href="{{route('cars') }}">All cars</a>
                            <select name="brand" id="brand">
                                <option value="" readonly>Select Brand</option>
                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" @if(isset($searchdata) && $brand->id == $searchdata['brand']) selected @endif>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label for="">From</label>
                            <input type="number" class="form-control" name="price_from" placeholder="Rs.." value="{{$searchdata['price_from'] ?? ''}}">
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label for=""> To</label>
                            <input type="number" class="form-control" name="price_to" placeholder="Rs.." value="{{$searchdata['price_to'] ?? ''}}">
                        </div>
                    </div>
                    <div class="col-1">
                        <label for="">Km.</label>
                        <input type="number" class="form-control" name="max_km" placeholder="Max KM" value="{{$searchdata['max_km'] ?? ''}}">
                    </div>
                    <div class="col-3">
                        <label>Sort By:</label>
                        <select name="sort_by" class="form-control">
                            <option value="">Sort Options</option>
                            <option value="az">A-Z Aplphabetical</option>
                            <option value="za">Z-A Reverse</option>
                            <option value="lh">Price Low-High</option>
                            <option value="hl">Price High-Low</option>
                        </select>
                    </div>

                    <div class="col-2 mt-3 text-right">
                        <div class="main-button">
                            <button type="submit"> Filter </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <hr>

        <div class="row">

            @foreach($cars as $car)
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
                            <sup>Rs</sup>&nbsp;{{$car->price}}
                        </span>

                        <h4>{{ $car->name }}</h4>

                        <p>
                            <i class="fa fa-dashboard"></i> {{ $car->km }} km &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-cube"></i> {{ $car->cc }} cc &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-cog"></i> {{ $car->getCondition() }} &nbsp;&nbsp;&nbsp;
                        </p>

                        <ul class="social-icons">
                            <a class="btn btn-sm btn-primary" href="{{ route('cardetails',$car->id) }}">View Car</a></li>
                            <a class="btn btn-sm btn-outline-secondary text-dark float-right" href="{{ route('addToCompare',$car->id) }}">+ Add to Compare</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
         <br><br>

        {{-- <nav>
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
        </nav> --}}

    </div>
</section>
<!-- ***** Fleet Ends ***** -->
@endsection
