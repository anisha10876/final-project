@extends('backend.partial.master')


@section('content')
<div class="container-fluid" style="margin-left: -10%;">
    <div class="row">
        <div class="col-md-2">

            <div class="card text-capitalize" style="width: 11rem;">
                <div class="card-header">
                  <h4>Car Brands</h4>
                </div>
                <ul class="list-group list-group-flush">
                @foreach($brands as $brand)
                  <a href="{{ route('carbrand',$brand->id) }}"><li class="list-group-item">{{ $brand->name }}</li></a>

                @endforeach
                </ul>
              </div>
        </div>

<div class="col-md-9">
            <h1>Cars Dashboard</h1>

            <a href="{{route('add_car')}}" class="btn btn-primary">Add Car</a>

            {{-- <a id="addcar" class="btn btn-primary">Add Car</a> --}}


    <br><br>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">SN</th>
                <th scope="col">Carname</th>
                <th scope="col">Image</th>
                <th scope="col">Brand</th>
                <th scope="col">price</th>
                <th scope="col">Status</th>
                <th scope="col">Condition</th>
                <th scope="col">Year</th>
                <th scope="col">Model</th>
                <th scope="col">Owner</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)


              <tr data-row="{{ $loop->iteration}}">
                <th>{{ $loop->iteration}}</th>
                <td>{{ $car->name }}</td>
                {{-- @dd(asset('images/b.jpg')) --}}


                <td>
                    @if($car->hasImage())
                        <img src="{{ asset($car->image) }}" height="200px" width="200px" alt="">
                    @else
                        <img src="{{ asset("images/b.jpg") }}" height="200px" width="200px" alt="">
                    @endif
                </td>
                <td>{{ $car->brands->name }}</td>
                <td>
                    <del>{{ $car->price }}</del><br>
                    <span title="Caculated with resale value algorithm">
                    {{$car->calculateResale()}}
                    </span>
                </td>
                <td>{{ $car->neg_status }}</td>
                <td>{{ $car->getCondition() }}</td>
                <td>{{ $car->year }}</td>
                <td>{{ $car->model }}</td>
                <td>
                    {{$car->user()}}
                </td>
                <td style="width: 120px">
                    <a href="{{ route('editcar',$car->id) }}"><span style="color: green;"><i class="fas fa-edit fa-2x"></i></span></a>
                    <a href="{{ route('deletecar',$car->id) }}"><span style="color: red;"><i class="fas fa-trash-alt fa-2x"></i></span></a>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>

</div>




{{--    @dd($brands)--}}
    {{-- <div class="row mt-5">
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
    </div> --}}

@endsection


@push('script')
<script>

    $(document).ready(function(e){
        $('#addcar').on('submit',function(e){
        e.preventDefault();

        var formData = new FormData($(this)[0]);
        console.log(...formData);
        });


    });

</script>
@endpush
