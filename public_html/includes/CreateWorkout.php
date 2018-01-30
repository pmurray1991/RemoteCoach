<script src="js/BuildWorkout.js"></script>
<form>
    <div class="form-group" id="pSelect">
        <label for='ProgramsList'>Available Programs</label>
        <select class="form-control" id='ProgramsList'>
            <option value="" selected disabled>Please Select</option>
        </select>
    </div>
    <div class="row" id="CWEW" hidden="True">
        <div class="form-group col-xs-4">
            <label for="workoutDay">Edit Workout day</label>
        </div>
        <div class="form-group col-xs-4" id="dayInput" hidden="True">

            <!--<label  for="workoutDay">Edit Workout day</label>-->
            <select class="form-control" id="workoutDay">
                <option value="" selected disabled>Select Workout</option>
            </select>
        </div>
    
        <div class="form-group col-xs-4">
            <button class="btn btn-success" style="white-space: normal">Add Workout</button>
        </div>
    </div>
    
    <div class="row" id="createWorkout" hidden="True">
        <div class="col-xs-4"><label>Select Exercise</label></div>
        <div class="col-xs-4"><label>Enter Reps and Sets</label></div>
        <div class="col-xs-4"><label>Exercise Sequence</label></div>
    </div>
    <div id="editWorkout" hidden="True">
        <div class="row"">
            <div class="col-xs-3"><label>Delete Row</label></div>
            <div class="col-xs-3"><label>Exercise Sequence</label></div>
            <div class="col-xs-3"><label>Exercise</label></div>
            <div class="col-xs-3"><label>Reps and Sets</label></div>   
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
</form>



