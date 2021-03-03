@extends('backend.partial.master')


@section('content')

    <h1>Brands</h1>
    <div>
        <a href="{{route('add_brand')}}" class="btn btn-primary">add brand</a>
    </div>


{{--    @dd($brands)--}}
    <div class="row mt-5">
        <div class="col-12">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($brands as $brand)
                <tr>
                    <th scope="row">{{$brand->id}}</th>
                    <td>{{$brand->name}}</td>
                    <td>{{$brand->slug}}</td>
                    <td>
                        <a href="{{route('editbrand',$brand->id)}}" class="btn btn-success">edit</a>
                        <a href="{{route('deletebrand',$brand->id)}}" class="btn btn-danger">delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
