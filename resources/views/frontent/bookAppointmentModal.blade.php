<div class="modal fade" id="bookAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <form method="post" action="{{route('post_book_appointment')}}">
        @csrf
        <input type="hidden" name="car_id" value="{{$car->id}}">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book An Appointment? "<span class="text-uppercase">{{$car->name}}</span>"</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Phone No:</label>
                    <input type="text" name="phone" class="form-control" placeholder="+977-" required>
                </div>
                <div class="form-group">
                    <label for="">Date:</label>
                    <input type="text" class="form-control datepicker" autocomplete="off" id="app-date" name="date" required readonly>
                </div>
                <div class="form-group">
                    <label for="">Time:</label>
                    <input type="text" class="form-control" name="time" required>
                </div>
                <div class="form-group">
                    <label for="">Reason :</label>
                    <input type="text" class="form-control" name="reason" placeholder="Eg: Test Drive, Buying" required>
                </div>
                <div class="form-group">
                    <label for="">Location</label>
                    <input type="text" class="form-control" name="location" required>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Book Now</button>
            </div>
        </div>
    </form>
    </div>
  </div>

<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
        rel = "stylesheet">
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<!-- Javascript -->
<script>
    $(function() {
        $( "#app-date" ).datepicker({
            dateFormat:"yy-m-d"
        });
    });
</script>
