@extends('frontent.layout.app')
@section('main')

    <section class="section mt-2" id="features" style="margin-bottom: 20px">
        <div class="container">
            <div class="row main mt-5">
                <div class="col-8 offset-lg-2">
                    <div class="card">
                        <div class="card-title">
                            <h3 class="text-center">Appointment Confirmed !</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <p>
                                        <span style="color:#ed563b">Hello {{$appointment->user->name}} ,</span> <br>
                                        Thank you for placing your appointment on our site. As soon as your
                                        details are studied and confirmed, we will get back to you. Thank you
                                        for your patience.
                                    </p>
                                </div>
                                <div class="col-12 text-center border border-primary">
                                    <h4>Appointment ID : {{$appointment->id}}</h4>
                                </div>
                                <div class="col-4 text-center border border-primary">
                                    <h5 class="text-uppercase ">{{ $appointment->car->brands->name ?? '' }} - {{$appointment->car->name}}</h5>
                                </div>
                                <div class="col-4 text-center border border-primary">
                                    <h5>FOR</h5>
                                </div>
                                <div class="col-4 text-center border border-primary">
                                    <h5>{{$appointment->reason}}</h5>
                                </div>
                                <div class="col-4 text-center border border-primary">
                                    <img src="{{asset($appointment->car->image ?? '')}}"
                                         alt="Car Image" height="100px" class="p-2">
                                </div>
                                <div class="col-4 text-center border border-primary">
                                    <div>
                                        <strong>Date:</strong> {{$appointment->date}}
                                    </div>
                                    <div>
                                        <strong>Time:</strong> {{$appointment->time}}
                                    </div>
                                </div>
                                <div class="col-4 text-center border border-primary">
                                    <div>
                                        <strong>Location:</strong> {{$appointment->location}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
