@extends('backend.partial.master')


@section('content')

    <h1>All appointment from users.</h1>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Car</th>
                        <th>Image</th>
                        <th>Interested Party</th>
                        <th>Owner</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($appointments as $appointment)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td class="text-uppercase">
                                    {{$appointment->car->brands->name}} <br>
                                    <span>{{$appointment->car->name}}</span>
                                </td>
                                <td>
                                    <img src="{{ asset($appointment->car->image) }}" height="100px" width="auto" />
                                </td>
                                <td>{{$appointment->user->name}}</td>
                                <td>{{$appointment->car->user()}}</td>
                                <td>{{$appointment->date}}</td>
                                <td>{{$appointment->time}}</td>
                                <td>{{$appointment->location}}</td>
                                <td>
                                    <a href="{{route('deleteappointment', $appointment->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
