@extends('frontent.layout.app')

@section('css')
<style>

body {
  font-family: 'open sans';
  overflow-x: hidden; }

img {
  max-width: 100%; }

.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }
  @media screen and (max-width: 996px) {
    .preview {
      margin-bottom: 20px; } }

.preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px; }
  .preview-thumbnail.nav-tabs li {
    width: 18%;
    margin-right: 2.5%; }
    .preview-thumbnail.nav-tabs li img {
      max-width: 100%;
      display: block; }
    .preview-thumbnail.nav-tabs li a {
      padding: 0;
      margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
      margin-right: 0; }

.tab-content {
  overflow: hidden; }
  .tab-content img {
    width: 100%;
    -webkit-animation-name: opacity;
            animation-name: opacity;
    -webkit-animation-duration: .3s;
            animation-duration: .3s; }

.card {
  margin-top: 50px;
  background: #eee;
  padding: 3em;
  line-height: 1.5em; }

@media screen and (min-width: 997px) {
  .wrapper {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex; } }

.details {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }

.colors {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.product-title, .price, .sizes, .colors {
  text-transform: UPPERCASE;
  font-weight: bold; }

.checked, .price span {
  color: #ff9f1a; }

.product-title, .rating, .product-description, .price, .vote, .sizes {
  margin-bottom: 15px; }

.product-title {
  margin-top: 0; }

.size {
  margin-right: 10px; }
  .size:first-of-type {
    margin-left: 40px; }

.color {
  display: inline-block;
  vertical-align: middle;
  margin-right: 10px;
  height: 2em;
  width: 2em;
  border-radius: 2px; }
  .color:first-of-type {
    margin-left: 20px; }

.add-to-cart, .like {
  background: #ff9f1a;
  padding: 1.2em 1.5em;
  border: none;
  text-transform: UPPERCASE;
  font-weight: bold;
  color: #fff;
  -webkit-transition: background .3s ease;
          transition: background .3s ease; }
  .add-to-cart:hover, .like:hover {
    background: #b36800;
    color: #fff; }

.not-available {
  text-align: center;
  line-height: 2em; }
  .not-available:before {
    font-family: fontawesome;
    content: "\f00d";
    color: #fff; }

.orange {
  background: #ff9f1a; }

.green {
  background: #85ad00; }

.blue {
  background: #0076ad; }

.tooltip-inner {
  padding: 1.3em; }

@-webkit-keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

@keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }
</style>
@endsection

@section('main')

<div class="container mt-5 mb-4">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    @if($car->hasImage())
                    <img src="{{ asset($car->image) }}" height="400px" width="100%" />

                    <ul class="social-icons mt-3 ml-5">
                        <li><a href="#"><i class="fa fa-facebook fa-2x"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin fa-2x"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance fa-2x"></i></a></li>
                    </ul>
                    @else
                    <img src="{{ asset('images/b.jpg') }}" height="400px" width="100%" />
                    {{-- <i class="fa fa-facebook fas-2x"></i>
                    <ul>
                        <li><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin fa-2x"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance fa-2x"></i></a></li>
                    </ul> --}}
                    @endif
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{ $car->name }}</h3>
                    <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">41 reviews</span>
                    </div>
                    <h3 class="product-description">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</h3>
                    <div class="down-content">
                        <span>
                            price :
                            <del><sup>$</sup>{{ $car->price + 500 }} </del> &nbsp; <sup>$</sup>{{ $car->price }}
                        </span>
                        <div class="mt-3">
                            <span style="font-weight: 500;"> Kilometer </span> : <i class="fa fa-dashboard fa-2x"></i> {{ $car->km }} km &nbsp;&nbsp;&nbsp;
                            <span  style="font-weight: 500;">CC : <i class="fa fa-cube fa-2x"></i> {{ $car->cc }} cc &nbsp;&nbsp;&nbsp; </span>
                            <i class="fa fa-cog fa-2x"></i> {{ $car->condition }} &nbsp;&nbsp;&nbsp;
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h1 style="margin-left: 40%;"> Similar cars</h1>
    <div class="row">
        @if($similarcars->isNotEmpty())
        @if($similarcars)
        @foreach($similarcars as $similarcar)

        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                @if($similarcar->hasImage())
                <img class="card-img-top" src="{{ asset($similarcar->image) }}" height="250px" width="250px" alt="Card image cap">
                @else
                <img class="card-img-top" src="{{ asset('images/b.jpg') }}" height="250px" width="250px" alt="Card image cap">
                @endif
                <div class="card-body">
                  <h5 class="card-title">{{ $similarcar->name }}</h5>
                  <p class="card-text">{{ $similarcar->model }}</p>
                  <a href="{{ route('cardetails',$similarcar->id) }}" class="btn btn-primary">+View Product</a>
                </div>
              </div>
            </div>

        @endforeach


        @endif
        @else
        <div class="col-md-12"  style="background: red">
            <h1 style="margin-left: 30%">Sorry!!No any products!!</h1>

        </div>
        @endif
    </div>
</div>


@endsection
