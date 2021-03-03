@extends('backend.partial.master')


@section('content')

    <h1>Add Testomonials</h1>
    <form  method="post" action="{{ route('edittestomonialssubmit',$testomonial->id) }}" class="text-capitalize" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="Testomonial Name">Testomonial Name</label>
            <input type="text" name="name" value="{{ $testomonial->name }}" id="name" placeholder="add Name" class="form-control">
        </div>
        <div class="form-group">
            <label for="Testomonial Name">Testomonial Image</label><br>
            @if($testomonial->hasImage())
             <img src="{{ asset($testomonial->image) }}" height="200px" width="200px" alt="">
             @else
             <img src="{{ asset('images/b.jpg') }}" height="200px" width="200px" alt="">
            @endif
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">description</label><br>
           <textarea name="description" id="" cols="80" rows="10">{{ $testomonial->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Edit Testomonials</button>
    </form>


@endsection


@push('script')

@endpush

