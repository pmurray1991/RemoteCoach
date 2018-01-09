
<form>
    <div class="form-group">
        <label for="exerciseName">Exercise Name</label>
        <input class="form-control" id="exerciseName" maxlength="100">
        <span class="error text-danger" id="ExistEx" hidden="True">Exercise Already Exists</span>
    </div>
    <div class="form-group">
        <label for="exerciseDescription">Exercise Name</label>
        <textarea maxlength="255" rows="3" class="form-control" id="exerciseDescription"></textarea>
    </div>
    <div class="form-group">
        <label for="Ex_URL">URL for Video of Exercise</label>
        <input class="form-control" id="Ex_URL">
    </div>
    <div class="form-group">
        <label for='UnitMeasure'>Units of Measure</label>
        <select class="form-control" id='UnitMeasure'>
            <option value="" selected disabled>Please Select</option>
        </select>
    </div>
    <button id='AddExerciseButton' class='btn btn-primary'>Add Exercise</button>
</form>
<script src="js/Exercises.js"></script>