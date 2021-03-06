@extends('backend.partial.master')


@section('content')

    <h1>Edit FAQ</h1>
    <form  method="post" action="{{ route('editfaqsubmit',$faq->id) }}" class="text-capitalize">
        @csrf
        <div class="form-group">
            <label for="FAQ Name">FAQ title</label>
            <input type="text" value="{{ $faq->title }}" name="title" id="title" placeholder="add title" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">description</label><br>
           <textarea name="description" id="" cols="80" rows="10">{{ $faq->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Edit FAQ</button>
    </form>


@endsection


@push('script')

@endpush
