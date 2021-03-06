

@extends('frontent.layout.app')
@section('main')
<style>
    .table-compare tr td{
        text-align: center;
    }

    .table-compare tr th{
        text-align: center;
    }
</style>

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Compare <em>Cars</em></h2>
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
        <div class="row">
            <div class="col-8 offset-lg-2 text-center">

            </div>
        </div>

        @if(isset($compare_cars))
            <div class="row mt-3">
                <div class="col-12 text-center mb-2">
                    <h2>Comparision</h2>
                </div>
                @foreach($compare_cars as $car)
                    <div class="col-4">
                        <div class="card">
                            <div class="card-title text-center">
                                <h3 class="text-uppercase">
                                    {{$car->name}} &nbsp;&nbsp;&nbsp;
                                    <a href="{{route('removeFromCompare', $car->id)}}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </h3>
                            </div>
                            <div class="card-body">
                                <img src="{{asset($car->image)}}" alt="Car Image" style="width:100%; height:auto">
                            </div>
                            <div class="card-footer">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-compare">
                                        <tr>
                                            <th>Brand</th>
                                            <td>{{$car->brands->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Model</th>
                                            <td>{{$car->model}}</td>
                                        </tr>
                                        <tr>
                                            <th>Color</th>
                                            <td>{{$car->color}}</td>
                                        </tr>

                                        <tr>
                                            <th>Condition</th>
                                            <td>{{$car->getCondition()}}</td>
                                        </tr>
                                        <tr>
                                            <th>Km</th>
                                            <td>{{$car->km}}</td>
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
                                <div class="mt-1">
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
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

@endsection

