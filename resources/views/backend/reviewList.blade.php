@extends('backend.partial.master')


@section('content')

    <h1>Review about car from users.</h1>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>Car</th>
                        <th>Star</th>
                        <th>Review</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($reviews as $review)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$review->user->name}}</td>
                                <td>{{$review->car->name}}</td>
                                <td>{{$review->star}}</td>
                                <td>{{$review->review}}</td>
                                <td>
                                    <a href="{{route('reviewDelete', $review->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
