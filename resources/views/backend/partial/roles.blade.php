@extends('backend.partial.master')


@section('content')

    <h1>Add roles</h1>
    <a href="{{ route('addroles') }}" class="btn btn-primary">Add roles </a>

@endsection


@push('script')

@endpush


{{-- {{ route('editfaqsubmit',$faq->id) }} --}}
