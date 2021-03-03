@extends('backend.partial.master')


@section('content')
@if($searchcar->isNotEmpty())
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Search Results:</h1>
            @foreach($searchcar as $c)
            <div class="card" style="width: 20rem;">
                @if($c->hasImage())
                <img class="card-img-top" src="{{ asset($c->image) }}" height="200px" alt="Card image cap">
                @else
                <img class="card-img-top" src="{{ asset("images/b.jpg") }}" width="200px" alt="Card image cap">
                @endif
                <div class="card-body">
                  <p class="card-text">Name : {{ $c->name }}</p>
                  <ol>
                    Model<li col-2>{{ $c->model }}</li>

                  </ol>
                </div>
              </div>
            @endforeach
        </div>
    </div>
</div>
@else
<h1>No products available for this result</h1>
@endif
@endsection


