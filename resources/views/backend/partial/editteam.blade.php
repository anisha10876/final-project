@extends('backend.partial.master')


@section('content')

    <h1>Edit Team</h1>
    <form  method="post" action="{{ route('editteamsubmit',$team->id) }}" class="text-capitalize" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="FAQ Name">User name</label>
            <input type="text" value="{{ $team->name }}" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="FAQ Name">User Image</label><br><br>
            @if($team->hasImage())
            <img src="{{ asset($team->image) }}" height="200px" width="200px" alt="">
            @else
                <img src="{{ asset('images/b.jpg') }}" height="200px" width="200px" alt="">
            @endif <br> <br>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="FAQ Name">User Designation</label>
            <input type="text" value="{{ $team->designation }}" name="designation" id="designation"  class="form-control">
        </div>
        <div class="form-group">
            <label for="description">description</label><br>
           <textarea name="description" id="" cols="80" rows="10">{{ $team->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Edit User </button>
    </form>


@endsection


@push('script')

@endpush
