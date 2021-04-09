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
    <div class="row">
        <div class="col-8">
            <div class="card p-3">
                <div class="container-fliud">
                    <div class="wrapper row">
                        <div class="col-6">
                            <h3 class="product-title">{{ $car->name }}</h3>
                        </div>
                        <div class="col-6 text-right">
                            <h4>
                                Rs.&nbsp;<del>{{ $car->price }}</del>
                                <span title="From resale value calculation algorithm">
                                    {{$car->calculateResale()}}
                                </span>
                            </h4>
                        </div>
                        <div class="preview col-12">
                            @if($car->hasImage())
                            <img src="{{ asset($car->image) }}" height="400px" width="100%" />

                            @else
                                <img src="" height="400px" width="100%" alt="Car Image" />
                            @endif
                        </div>
                        <div class="col-6 mt-3">
                            <h4 style="font-weight: 500;"> Description </h4>
                        </div>
                        <div class="details col-6 mt-3">
                            @if($car->broucher != "")
                                <div class="text-right">
                                    <a class="btn btn-sm btn-primary" target="_blank"
                                        href="{{ asset($car->broucher) }}">
                                        <i class="fa fa-download"></i>&nbsp;
                                        Brochure
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="col-12 mt-2">
                            {!! $car->description !!}
                        </div>
                        <div class="col-6">
                            <div class="down-content">
                                <div class="mt-3">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Brand</th>
                                                <td>{{$car->brands->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Model</th>
                                                <td>{{$car->model}}</td>
                                            </tr>
                                            <tr>
                                                <th>CC</th>
                                                <td>{{$car->cc}}</td>
                                            </tr>
                                            <tr>
                                                <th>Year</th>
                                                <td>{{$car->year}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="down-content">
                                <div class="mt-3">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Kilometer</th>
                                                <td>{{$car->km}}</td>
                                            </tr>
                                            <tr>
                                                <th>Condition</th>
                                                <td>{{$car->getCondition()}}</td>
                                            </tr>
                                            <tr>
                                                <th>Color</th>
                                                <td>{{$car->color}}</td>
                                            </tr>
                                            <tr>
                                                <th>Negotiable</th>
                                                <td>
                                                    @if($car->neg_status == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-3">
                                @if(Auth::check())
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#bookAppointmentModal">Book an appointment</button>
                                    @include('frontent.bookAppointmentModal')
                                @else
                                    <a class="btn btn-primary" href="{{route('loginpage')}}">
                                        Book an appointment
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <div class="mt-3">
                                <a href="{{route('buy_car')}}" class="btn btn-success">Buy Car</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col-12">
                    <div class="card p-3">
                        <div class="container-fliud">
                            <div class="card-title text-center text-white alert" style="background-color: #ed563b">
                                <h4>For More Information</h3>
                            </div>
                            <div class="card-body">
                                <div>
                                    <i class="fa fa-phone"></i> &nbsp;
                                    <span>+977-9811223344</span>
                                </div>
                                <div>
                                    <i class="fa fa-envelope"></i> &nbsp;
                                    <span>info@carrentals.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card p-3">
                        <div class="container-fliud">
                            <div class="card-title text-center text-white alert" style="background-color: #ed563b">
                                <h4>Connect With Us</h4>
                            </div>
                            <div class="card-body">
                                <ul class="social-icons text-center">
                                    <li><a href="#"><i class="fa fa-facebook fa-lg"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter fa-lg"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin fa-lg"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram fa-lg"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="container">
    <h1 class="text-center mb-3"> Similar cars from "<span class="text-uppercase">{{$car->brands->name}}</span>"</h1>
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
                        <a class="btn btn-sm btn-primary" href="{{ route('cardetails',$car->id) }}">+ View Car</a></li>
                    </div>
                </div>
                </div>

            @endforeach


            @endif
        @else
        <div class="col-md-12 mt-3">
            <h3 class="text-center text-danger">Sorry!!No similar products!!</h1>
        </div>
        @endif
    </div>
</div>


@endsection
