@extends('backend.partial.master')


@section('content')

<div class="container">
    <h1>Testomonials</h1>
    <a href="{{route('addtestomonials')}}" class="btn btn-primary">Add Testomonials</a>
    <br><br>
    <table class="table">
        <thead class="thead-dark text-capitalize">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($testomonials as $testomonial)
          <tr data-row="{{ $loop->iteration }}">
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $testomonial->name }}</td>
            <td>
                @if($testomonial->hasImage())
                <img src="{{ asset($testomonial->image) }}" height="200px" width="200px" alt="">

                @else
                 <img src="{{ asset('images/b.jpg')}}" height="200px" width="200px" alt="">
                 @endif
            </td>
            <td>{{ $testomonial->description }}</td>

            <td>
                <a href="{{ route('edittestomonial',$testomonial->id) }}"><span style="color: green;"><i class="fas fa-edit fa-2x"></i></span></a>
                <a href="{{ route('deletetestomonial',$testomonial->id) }}"><span style="color: red;"><i class="fas fa-trash-alt fa-2x"></i></span></a>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>


</div>
@endsection
