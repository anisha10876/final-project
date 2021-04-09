<div class="row">
    <div class="col-12">
        <form method="post" action="{{route('sellmycar')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-6">
                    <div class="form-group">
                        <label for="Car Name">Car Name</label>
                        <input type="text" name="name" id="name" placeholder="name" class="form-control" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="Car Name">Car image</label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="Car Name">Car broucher</label>
                        <input type="file" name="broucher" id="broucher" class="form-control" required>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="Car Name">Car Brand</label>

                        <select class="form-control" required name="brand" id="exampleFormControlSelect1">
                            @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="Car Name">Car price</label>
                        <input type="number" name="price" id="price" placeholder="add price" class="form-control" required>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="Car Name">Negoiable ?</label>
                        <input type="radio" value="1" name="status" selected> Yes
                        <input type="radio" value="0" name="status"> No
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="Car Name">Condition</label>
                        <select name="condition" class="form-control" required>
                            <option value="">Select Car Condition</option>
                            <option value="brand_new">Brand New</option>
                            <option value="used">Used</option>
                            <option value="old">Old</option>
                        </select>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="Add year">Year</label>
                        <input type="text" name="year" id="year" placeholder="add year" class="form-control" required>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="Add model">Model</label>
                        <input type="text" name="model" id="model" placeholder="add model" class="form-control" required>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="Add km">Kilometer</label>
                        <input type="number" name="km" id="km" placeholder="add kilometer" class="form-control" required>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="Add color">color</label>
                        <input type="text" name="color" id="color" placeholder="add color" class="form-control" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="Add CC">cc</label>
                        <input type="number" name="cc" id="cc" placeholder="add CC" class="form-control" required>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="fordescription">description</label>
                        <textarea name="description" id="fordescription" cols="30" rows="3" class='form-control'></textarea>
                    </div>
                </div>
                <div class="col-12 text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
