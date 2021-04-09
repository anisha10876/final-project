@extends('frontent.layout.app')
@section('css')
    <!-- Google Fonts -->
    {{-- <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
    <style>
        .input-group{
            position: relative;
        }
        .input-group-addon{
            position: absolute;
            top: 0px;
            line-height: 38px;
            padding: 0px 10px;
            background: #dbdbdb;
            z-index: 1;
            color: #ed563b;
            border-radius: 4px 0px 0px 4px;
        }
        .input-group input{
            padding-left: 45px;
            border-radius: 4px !important;
        }
    </style>
@endsection

@section('main')

<section class="section" id="trainers" style="padding-bottom: 10px">
    <div class="container">
    <div class="row main mt-5">
        <div class="col-4 offset-lg-4">
            <div class="main-login main-center" >
                <h1 class="text-center mb-3">Login</h1>
                @if(session()->has('error'))
                    <spam>{{ session()->get('error') }}</spam>
                @endif
                <form class="" method="post" action="{{route('login')}}">
                    @csrf

                    <div class="form-group">
                        <label for="email" class="cols-sm-2 control-label">Your Email</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                            </div>
                            @if($errors->has('email'))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="cols-sm-2 control-label">Password</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                            </div>
                            @if($errors->has('password'))
                                <span class="text-danger">{{$errors->first('password')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mt-3 text-right" style="font-size: 13px">
                        <span>Forgot Password, </span><a href="{{route('forgotPasswordPage')}}" class="">Reset Here.</a>
                    </div>

                    <div class="form-group mt-5">
                        <button type="submit" id="button" class="btn btn-primary btn-block login-button">Login</button>
                    </div>

                </form>
                <div class="mt-3" style="font-size: 13px">
                    <span>Don't have an account, </span><a href="{{route('registerpage')}}" class="">Register</a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


@endsection
