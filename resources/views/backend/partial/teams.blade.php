@extends('backend.partial.master')


@section('content')

<div class="container">
    <h1>Teams</h1>
    <a href="{{route('addteam')}}" class="btn btn-primary">Add Team</a>
    <br><br>
    <table class="table">
        <thead class="thead-dark text-capitalize">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">description</th>
            <th scope="col">Designation</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($teams as $team)
          <tr data-row="{{ $loop->iteration }}">
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $team->name }}</td>
            <td>
                @if($team->hasImage())
                <img src="{{ asset($team->image) }}" height="200px" width="200px" alt="">

                @else
                 <img src="{{ asset('images/b.jpg')}}" height="200px" width="200px" alt="">
                 @endif
            </td>
            <td>{{ $team->description }}</td>
            <td>{{ $team->designation }}</td>
            <td>
                <a href="{{ route('editteam',$team->id) }}"><span style="color: green;"><i class="fas fa-edit fa-2x"></i></span></a>
                <a href="{{ route('deleteteam',$team->id) }}"><span style="color: red;"><i class="fas fa-trash-alt fa-2x"></i></span></a>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>


</div>
@endsection
