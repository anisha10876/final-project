@extends('backend.partial.master')


@section('content')

<div class="container">
    <h1>FAQs</h1>
    <a href="{{route('addfaq')}}" class="btn btn-primary">Add FAQ</a>
    <br><br>
    <table class="table">
        <thead class="thead-dark text-capitalize">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($faqs as $faq)
          <tr data-row="{{ $loop->iteration }}">
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $faq->title }}</td>
            <td>{{ $faq->description }}</td>
            <td>
                <a href="{{ route('editfaq',$faq->id) }}"><span style="color: green;"><i class="fas fa-edit fa-2x"></i></span></a>
                <a href="{{ route('deletefaq',$faq->id) }}"><span style="color: red;"><i class="fas fa-trash-alt fa-2x"></i></span></a>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>


</div>
@endsection
