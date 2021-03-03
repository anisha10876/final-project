@extends('backend.partial.master')


@section('content')

    <h1>Add New Brands</h1>
    <div>
{{--        <a href="{{route('add_brand')}}" class="btn btn-primary">add brand</a>--}}
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <form class="" method="post" action="{{route('postbrand')}}">
                @csrf
                <div class="form-group">
                    <label for="">brand name</label>
                    <input type="text" name="name">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">submit</button>
                </div>
            </form>
        </div>
    </div>


    {{--    @dd($brands)--}}


@endsection
