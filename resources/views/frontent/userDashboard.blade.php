@extends('frontent.layout.app')
@section('main')
<style>
    /**Floating Tabs - Vertical **/
.floatingV-tab-wrap{
    width: 100%;
}
.floatingV-tab-wrap .nav {
    padding: 18px;
    border: none;
    background: #f9735b;
    border-radius: 7px;
}

.floatingV-tab-wrap .nav .nav-link.active {
    background: #212529;
    box-shadow: 0 0 10px #212529;
}

.floatingV-tab-wrap .nav .nav-link {
    color: #fff;
    font-weight: 400;
    font-size: 18px;
    border: none;
    text-align: center;
    padding-top: 10px;
    padding-bottom: 10px;
}

.floatingV-tab-wrap .tab-content {
    width: 100%;
    padding: 30px 20px 30px 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/**Floating Tabs - Vertical Ends **/
</style>
<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>User<em>Dashboard</em></h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ***** Testimonials Item Start ***** -->
<section class="section" id="features">
    <div class="container">
        <br>
        <div class="row">
            <div class="pills floatingV-tab-wrap py-3">

                <div class="heading-tab mb-2">
                    <h3>Dashboard</h3>
                </div>
                <div class="tab-wrap">
                    <div class="row">
                        <div class="col-3">
                            <div class="nav flex-column nav-pills" id="floatingV-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="floatingV-tab-1-tab" data-toggle="pill" href="#floatingV-tab-home"
                                    role="tab" aria-controls="floatingV-tab-1" aria-selected="true">Home</a>
                                <a class="nav-link" id="floatingV-tab-2-tab" data-toggle="pill" href="#floatingV-tab-sell-car" role="tab"
                                    aria-controls="floatingV-tab-2" aria-selected="false">Sell Car</a>
                                <a class="nav-link" id="floatingV-tab-3-tab" data-toggle="pill" href="#floatingV-tab-my-car" role="tab"
                                    aria-controls="floatingV-tab-3" aria-selected="false">My Cars</a>
                                <a class="nav-link" id="floatingV-tab-3-tab" data-toggle="pill" href="#floatingV-tab-my-app" role="tab"
                                    aria-controls="floatingV-tab-3" aria-selected="false">My Appointments</a>

                            </div>
                        </div>
                        <div class="col-9">
                            <div class="tab-content" id="floatingV-tabContent">
                                <div class="tab-pane fade show active" id="floatingV-tab-home" role="tabpanel"
                                    aria-labelledby="floatingV-tab-1-tab">
                                    <p>
                                        Welcome, {{Auth::user()->name}} !!
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                Error While Submitting Form.
                                            </div>
                                        @endif
                                    </p>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <h4>Update Profile</h4>
                                        </div>
                                        <div class="col-12">
                                            <form action="{{route('updateProfile')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                                                    </div>

                                                    <div class="col-6">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" disabled>
                                                    </div>

                                                    <div class="col-6">
                                                        <label>Phone</label>
                                                        <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}">
                                                    </div>
                                                    <div class="col-6 text-right" style="padding-top:30px">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <h4>Change Password</h4>
                                        </div>
                                        <div class="col-12">
                                            <form action="{{route('updatePassword')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>Old Password</label>
                                                            <input type="password" class="form-control" name="old_password" >
                                                        </div>
                                                        @if($errors->has('old_password'))
                                                            <span class="text-danger">{{$errors->first('old_password')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>New Password</label>
                                                            <input type="password" class="form-control" name="new_password">
                                                        </div>
                                                        @if($errors->has('new_password'))
                                                            <span class="text-danger">{{$errors->first('new_password')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>Confirm Password</label>
                                                            <input type="password" class="form-control" name="confirm_password">
                                                        </div>
                                                        @if($errors->has('confirm_password'))
                                                            <span class="text-danger">{{$errors->first('confirm_password')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-6 text-right" style="bottom: 0">
                                                        <button class="btn btn-primary" type="submit">Update</button>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="floatingV-tab-sell-car" role="tabpanel"
                                    aria-labelledby="floatingV-tab-2-tab">
                                    <p>
                                        @include('frontent.userDashboardSell')
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="floatingV-tab-my-car" role="tabpanel"
                                    aria-labelledby="floatingV-tab-3-tab">
                                    <p>
                                        @include('frontent.userDashboardCars')
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="floatingV-tab-my-app" role="tabpanel"
                                    aria-labelledby="floatingV-tab-3-tab">
                                    <p>
                                        @include('frontent.userDashboardAppointments')
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--Floating Tabs - Vertical Ends-->

        </div>
    </div>
</section>

@endsection
