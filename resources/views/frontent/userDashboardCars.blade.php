<div class="row">
    <div class="col-12">
        <h4 class="text-center">My Cars on sale.</h4>
    </div>
    <div class="col-12 mt-2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Photo</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user_cars as $userCar)
                        @if($userCar->car)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <a href="{{route('cardetails',$userCar->car->id)}}">
                                    {{$userCar->car->name}}
                                </a>
                            </td>
                            <td>{{$userCar->car->brands->name}}</td>
                            <td>
                                <img src="{{asset($userCar->car->image ?? '')}}" height="100px" class="p-2" alt="Car Photo">
                            </td>
                            <td>
                                @if($userCar->status == "on_sale")
                                    <a href="#" class="btn btn-success"> On Sale</a>
                                @elseif($userCar->status == "sold")
                                    <a href="#" class="btn btn-danger">Sold Out</a>
                                @endif
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
