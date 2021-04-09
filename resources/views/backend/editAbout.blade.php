@extends('backend.partial.master')


@section('content')

    <h1>About Page Data</h1>
    <form  method="post" action="{{ route('updateAboutPage') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Our Goals</label>
                    <textarea name="about_goals" rows="8" class="form-control">{{$settings['about_goals']??''}}</textarea>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Our Work</label>
                    <textarea name="about_work" rows="8" class="form-control">{{$settings['about_work']??''}}</textarea>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Our Passion</label>
                    <textarea name="about_passion" rows="8" class="form-control">{{$settings['about_passion']??''}}</textarea>
                </div>
            </div>
            <div class="col-12 text-right">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

@endsection
