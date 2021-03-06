@extends('backend.partial.master')


@section('content')

    <h1>Add Car</h1>
    <form  method="post" action="{{ route('addcarsubmit') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="Car Name">Car Name</label>
            <input type="text" name="name" id="name" placeholder="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="Car Name">Car image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="Car Name">Car broucher</label>
            <input type="file" name="broucher" id="broucher" class="form-control">
        </div>

        <div class="form-group">
            <label for="fordescription">description</label>
            <textarea name="description" id="fordescription" cols="30" rows="10" class='form-control'></textarea>
        </div>


        <div class="form-group">
            <label for="Car Name">Car Brand</label>

            <select class="form-control" name="brand" id="exampleFormControlSelect1">
                @foreach($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>

        </div>


        <div class="form-group">
            <label for="Car Name">Car price</label>
            <input type="number" name="price" id="price" placeholder="add price" class="form-control">
        </div>
        <div class="form-group">
            <label for="Car Name">Status</label>
            <input type="number" name="status" id="status" placeholder="add status" class="form-control">
        </div>

        <div class="form-group">
            <label for="Car Name">Condition</label>
            <select name="condition" class="form-control">
                <option value="">Select Car Condition</option>
                <option value="brand_new">Brand New</option>
                <option value="">Used</option>
                <option value="old">Old</option>
            </select>
        </div>
        <div class="form-group">
            <label for="Add year">Year</label>
            <input type="text" name="year" id="year" placeholder="add year" class="form-control">
        </div>
        <div class="form-group">
            <label for="Add model">Model</label>
            <input type="text" name="model" id="model" placeholder="add model" class="form-control">
        </div>
        <div class="form-group">
            <label for="Add km">Add kilometer</label>
            <input type="number" name="km" id="km" placeholder="add kilometer" class="form-control">
        </div>
        <div class="form-group">
            <label for="Add color">color</label>
            <input type="text" name="color" id="color" placeholder="add color" class="form-control">
        </div>
        <div class="form-group">
            <label for="Add CC">cc</label>
            <input type="number" name="cc" id="cc" placeholder="add CC" class="form-control">
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
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>
                            <button class="btn btn-primary btn-sm btn-add-specifications">
                                Add New
                            </button>
                        </th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Add Car</button>
    </form>


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
