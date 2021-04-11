@extends('frontent.layout.app')
@section('main')
<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>Calculate<em>Resale Value</em></h2>
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
            @if(isset($formSubmit))
            <div class="col-8 offset-lg-2 alert alert-success text-center">
                <h4>The resale value of your car is between</h4>
                <h4>Rs.<strong>{{(int)$lowResale}}</strong> and Rs.<strong>{{(int)$highResale}}</strong></h4>
            </div>
            @endif
            <div class="col-8 offset-lg-2">
                <form method="post" action="{{route('calculateResaleSubmit')}}">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Brand</label>
                                <select name="brand_id" class="form-control" required>
                                    <option value="">Select Car Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Model Year</label>
                                <select class="form-control" name="year" required>
                                    <option value="">Select Make Year</option>
                                    @for($i=2021; $i>=1995; $i--)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Initial Car Price</label>
                                <input type="number" class="form-control" name="price" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Brief Description of Car</label>
                                <textarea name="description" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
