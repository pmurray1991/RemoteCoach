<script src="js/BuildWorkout.js"></script>
<div class="row">
    <h5 class="col-xs-2">Available Programs</h5>
</div>
<div class="row">

    <ul class="nav nav-tabs col-xs-1" id="ProgramsList">
    </ul>
    <div class="tab-content col-xs-offset-1 col-xs-10" id="tabs">
        <div class="tab-pane" id="WorkoutsPage">
            <div class="row">
                <label class="col-xs-offset-4" for="datepicker">Select Date: </label>
                <input data-provide="datepicker" type="text" id="datepicker"  placeholder="Date">
            </div>
            <div id="editWorkout" hidden="True">
                <div class="row"">
                    <div class="col-xs-3"><label>Delete Row</label></div>
                    <div class="col-xs-3"><label>Exercise Sequence</label></div>
                    <div class="col-xs-3"><label>Exercise</label></div>
                    <div class="col-xs-3"><label>Reps and Sets</label></div>
                </div>
            </div>
        </div>
    </div>


</div>

    <!-- Modal -->
<div id="youSure" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Are you Sure?</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to remove that exercise?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" id="deleteRow" class="btn btn-danger" data-dismiss="modal">Delete</button>
      </div>
    </div>

  </div>
</div>
    <div class="row" hidden="True">
        <div class="form-group col-xs-4" id="theExercise" hidden="True">
            <select class="form-control" id="workoutEx">
                <option value="" selected disabled>Select Exercise</option>
            </select>
        </div>
        <div class="form-group col-xs-4" id="SetsAndReps" hidden="True">
            <input class="form-control" id="setsreps" maxlength="50">
        </div>
        <div class="form-group col-xs-4" id="WorkoutSequence" hidden="True">
            <input class="form-control" id="wseq" maxlength="11">
        </div>
    </div>
    <div class="row" hidden="True">
        <button class="btn btn-danger" id="CWBack">Back</button>
        <button class="btn btn-primary" id="CWNext">Next</button>
    </div>



