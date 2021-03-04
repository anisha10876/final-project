@extends('backend.partial.master')


@section('content')




<form  method="post" action="{{ route('addrolessubmit') }}" class="text-capitalize">
    @csrf
    <div class="form-group">
        <label for="FAQ Name">Add Role</label>
        <input type="text"  name="role" id="role" placeholder="add role" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Add Roles</button>
</form>


@endsection


@push('script')

@endpush
