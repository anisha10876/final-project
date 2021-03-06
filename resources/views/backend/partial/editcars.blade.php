@extends('backend.partial.master')


@section('content')

    <h1>Edit Car</h1>
    <div class="row">
        <div class="col-12">
            <form  method="post" action="{{ route('editcarsubmit',$car->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="Car Name">Car Name</label>
                    <input type="text" name="name" value="{{ $car->name }}" id="name" placeholder="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Car Name">Car image</label><br>
                    @if($car->hasImage())
                        <img src="{{ asset($car->image) }}" height="200px" width="200px" alt="">
                    @else
                        <img src="{{ asset("images/b.jpg") }}" height="200px" width="200px" alt="">
                    @endif
                    <input type="file" name="image" id="image" class="form-control">
                </div>


                <div class="form-group">
                    <label for="fordescription">description</label>
                    <textarea name="description" id="fordescription" cols="30" rows="10" class='form-control'>{!!$car->description!!}</textarea>
                </div>

                <div class="form-group">
                    <label for="Car Name">Car Brand</label>

                    <select class="form-control" name="brand" id="exampleFormControlSelect1">
                        @foreach($brands as $brand)

                        <option value="{{ $brand->id }}"
                        @if($brand->id == $car->brand_id) selected @endif>{{ $brand->name }}
                        </option>
                        @endforeach
                    </select>

                </div>


                <div class="form-group">
                    <label for="Car Name">Car price</label>
                    <input type="number" name="price" value="{{ $car->price }}" id="price" placeholder="add price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Car Name">Negoiable ?</label>
                    <input type="radio" value="1" name="status" {{$car->neg_status == 1 ? "selected" : ''}}> Yes
                    <input type="radio" value="0" name="status" {{$car->neg_status == 0 ? "selected" : ''}}> No
                </div>

                <div class="form-group">
                    <label for="Car Name">Condition</label>
                    <select name="condition" class="form-control">
                        <option value="">Select Car Condition</option>
                        <option value="brand_new" @if($car->condition == "brand_new") selected @endif>Brand New</option>
                        <option value="used" @if($car->condition == "used") selected @endif>Used</option>
                        <option value="old" @if($car->condition == "old") selected @endif>Old</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Add year">Year</label>
                    <input type="text" name="year" value="{{ $car->year }}" id="year" placeholder="add year" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Add model">Model</label>
                    <input type="text" name="model" value="{{ $car->year }}" id="model" placeholder="add model" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Add km">Add kilometer</label>
                    <input type="number" name="km" id="km" value="{{ $car->km }}" placeholder="add kilometer" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Add color">color</label>
                    <input type="text" name="color" id="color" value="{{ $car->color }}" placeholder="add color" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Add CC">cc</label>
                    <input type="number" name="cc" id="cc" value="{{ $car->cc }}" placeholder="add CC" class="form-control">
                </div>

                <h4><label>Add Specifications</label></h4>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-specifications">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Title</th>
                                <th>Specification</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            @foreach($car->specifications as $cspec)
                            <tr data-row="{{ $loop->iteration }}">
                                <th>{{ $loop->iteration }}</th>
                                <th><input type="text" value="{{ $cspec->title }}" name="spec[{{ $cspec->id }}][title]" class="form-control"></th>
                                {{-- <th><input type="text" value="" name="spec[{{ $cspec->id }}][specification]" class="form-control"></th> --}}
                                <th><textarea name="spec[{{ $cspec->id }}][specification]" id="" cols="30" rows="10">{{ implode(unserialize($cspec->specifications)) }}</textarea></th>
                                <th>
                                    <button class="btn btn-primary btn-sm btn-add-specifications">
                                        Delete
                                    </button>
                                </th>
                            </tr>
                            @endforeach
                            </tfoot>
                        </table>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Edit Car</button>
            </form>
        </div>
    </div>


@endsection


@push('script')
<script>
    function generateRandomInteger() {
    return Math.floor(Math.random() * 90000) + 10000;
}

jQuery(document).on('click', '.btn-delete-specifications', function (e) {
    e.preventDefault();
    var $this = $(this);
    $this.closest("tr").remove();
});

jQuery(document).on('click', '.btn-add-specifications', function (e) {
    e.preventDefault();
    // console.log('tgd');
    var lastRow = $('table.table-specifications > tbody > tr').last().attr('data-row');
    var counter = lastRow ? parseInt(lastRow) + 1 : 1;
    var randomInteger = generateRandomInteger();
    var newRow = jQuery('<tr data-row="' + counter + '">' +
        '<td>' + counter + '</td>' +
        '<td><textarea name="spec[' + randomInteger + '][title]" class="form-control" required></textarea></td>' +
        // '<td><input type="text" name="features[feature][' + randomInteger + ']" class="form-control" required/></td>' +
        '<td>' + '<textarea name="spec[' + randomInteger + '][specification]" class="form-control" required></textarea>' +
        '</td>' +
        '<td><button type="button" class="btn btn-danger btn-sm btn-delete-specifications" data-feature=""><i class="fa fa-minus-circle"></i></button></td>' +
        '</tr>');
    jQuery('table.table-specifications').append(newRow);
});



</script>
@endpush
