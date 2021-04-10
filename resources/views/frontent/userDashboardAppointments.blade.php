<div class="row">
    <div class="col-12">
        <h4 class="text-center">My Appointments</h4>
    </div>
    <div class="col-12 mt-2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Car</th>
                        <th>Photo</th>
                        <th>Owner</th>
                        <th>Interested Party</th>
                        <th>Date</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
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
                            <td>{{$appointment->car->user()}}</td>
                            <td>
                                @if($appointment->user_id == auth()->user()->id)
                                    Self
                                @else
                                    {{$appointment->user->name}}
                                @endif
                            </td>
                            <td>{{$appointment->date}}</td>
                            <td>
                                @if($appointment->user_id == auth()->user()->id)
                                    <a href="{{route('appointmentConfirm', $appointment->id)}}">
                                        <i class="fa fa-eye fa-2x"></i>
                                    </a>
                                @else
                                    <a href="#" data-toggle="modal" data-target="#app-modal">
                                        <i class="fa fa-eye fa-2x"></i>
                                    </a>
                                    @include('frontent.appointment_detail_modal')
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
