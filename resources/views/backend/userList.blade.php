@extends('backend.partial.master')


@section('content')

    <h1>Customer List</h1>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date Joined</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->created_at->format('Y-m-d')}}</td>
                            </tr>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
