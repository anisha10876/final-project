@extends('backend.partial.master')


@section('content')

    <h1>Add Blog</h1>
    <form  method="post" action="{{ route('editblogsubmit',$blog->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="Car Name">Blog Name</label>
            <input type="text" name="name" value="{{ $blog->name }}" id="name" placeholder="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="Car Name">Blog image</label><br>
            @if($blog->hasImage())
                <img src="{{ asset($blog->image) }}" height="200px" width="200px" alt="">
            @else
                <img src="{{ asset("images/b.jpg") }}" height="200px" width="200px" alt="">
            @endif
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="Add color">Author</label>
            <input type="text" name="author" id="author " value="{{ $blog->author }}" placeholder="add color" class="form-control">
        </div>
        <div class="form-group">
            <label for="Add CC">Description</label><br>
            <textarea name="description" id="" cols="80" rows="10">{{ $blog->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Edit Blog</button>
    </form>


@endsection


@push('script')

@endpush
