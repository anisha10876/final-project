<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Appointment Details For My Car</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tr>
                <th>Date:</th>
                <td>{{$appointment->date}}</td>
            </tr>
            <tr>
                <th>Time:</th>
                <td>{{$appointment->time}}</td>
            </tr>
            <tr>
                <th>Location:</th>
                <td>{{$appointment->location}}</td>
            </tr>
            <tr>
                <th>Reason:</th>
                <td>{{$appointment->reason}}</td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div
