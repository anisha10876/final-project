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
            <div class="col-12">
                <form method="post" action="{{route('calculateResaleSubmit')}}">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Brands</label>
                                <select name="brand_id" class="form-control" required>
                                    {{-- @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
