@extends('frontent.layout.app')
@section('css')
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@endsection

@section('main')

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
                                @if($errors->has('email'))
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="cols-sm-2 control-label">Password</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                                @if($errors->has('password'))
                                    <span class="text-danger">{{$errors->first('password')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="form-group mt-5">
                        <button type="submit" id="button" class="btn btn-primary btn-lg btn-block login-button">login</button>
                    </div>

                </form>
                <div class="mt-5 mb-5">
                    <span>Don't have an account, </span><a href="{{route('registerpage')}}" class="btn btn-sm btn-success">Register</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
