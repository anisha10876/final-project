@extends('backend.partial.master')


@section('content')

<div class="container">
    <h1>Blogs</h1>
    <a href="{{route('addblog')}}" class="btn btn-primary">Add Blogs</a>
    <br><br>
    <table class="table">
        <thead class="thead-dark text-capitalize">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">description</th>
            <th scope="col">Author</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
          <tr data-row="{{ $loop->iteration }}">
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $blog->name }}</td>
            <td>
                @if($blog->hasImage())
                <img src="{{ asset($blog->image) }}" height="200px" width="200px" alt="">

                @else
                 <img src="{{ asset('images/b.jpg')}}" height="200px" width="200px" alt="">
                 @endif
            </td>
            <td>{{ $blog->description }}</td>
            <td>{{ $blog->author }}</td>
            <td>
                <a href="{{ route('editblog',$blog->id) }}"><span style="color: green;"><i class="fas fa-edit fa-2x"></i></span></a>
                <a href="{{ route('deleteblog',$blog->id) }}"><span style="color: red;"><i class="fas fa-trash-alt fa-2x"></i></span></a>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>


</div>
@endsection
