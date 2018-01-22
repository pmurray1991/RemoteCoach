<?php
if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
?>
<h1>Available Programs</h1>
<div class="container">
    <div id="selectionRow" class="row">
        <div class="dropdown col-xs-6 col-md-offset-3 col-md-3 text-center">
            <button id =programDropDown class="btn btn-primary button-dropdown" type="button" data-toggle="dropdown">
                <?php
                if(isset($_SESSION['program_id'])){
                ?>
                <span id="programsText" data-value="<?php echo $_SESSION['program_id']; ?>"
                      class="text"><?php echo $_SESSION['program_name']; ?></span>
                    <span class="caret"></span>
                <?php
                }else{

                ?>
                    <span id="programsText" data-value="-1" class="text">Select Program</span>
                    <span class="caret"></span>
                <?php } ?>

            </button>
            <ul id="workoutProgramList" class="dropdown dropdown-menu">

            </ul>

        </div>
        <div class="input-group col-xs-6 col-md-3 text-center">
            <input class="btn-group" type="text" id="datepicker"  placeholder="Date">
<!--            <ul id="DayList" class="dropdown dropdown-menu">-->
<!--                <li><a href="#">Day</a></li>-->
<!--                <li><a href="#">Week</a></li>-->
<!--            </ul>-->

        </div>
    </div>
    <div id="WorkoutList">

<!--    </div>-->
<!--    <div class="row seven-cols">-->
<!--        <div id="Column_1" class="col-md-1 col-xs-12 text-center">-->
<!--            <div id="DateButton_1"></div>-->
<!--            <div id="Workout_1"></div>-->
<!--        </div>-->
<!--        <div id="Column_2" class="col-md-1 col-xs-12 text-center">-->
<!--            <div id="DateButton_2"></div>-->
<!--            <div id="Workout_2"></div>-->
<!--        </div>-->
<!--        <div id="Column_3" class="col-md-1 col-xs-12 text-center">-->
<!--            <div id="DateButton_3"></div>-->
<!--            <div id="Workout_3"></div>-->
<!--        </div>-->
<!--        <div id="Column_4" class="col-md-1 col-xs-12 text-center">-->
<!--            <div id="DateButton_4"></div>-->
<!--            <div id="Workout_4"></div>-->
<!--        </div>-->
<!--        <div id="Column_5" class="col-md-1 col-xs-12 text-center">-->
<!--            <div id="DateButton_5"></div>-->
<!--            <div id="Workout_5"></div>-->
<!--        </div>-->
<!--        <div id="Column_6" class="col-md-1 col-xs-12 text-center">-->
<!--            <div id="DateButton_6"></div>-->
<!--            <div id="Workout_6"></div>-->
<!--        </div>-->
<!--        <div id="Column_7" class="col-md-1 col-xs-12 text-center">-->
<!--            <div id="DateButton_7"></div>-->
<!--            <div id="Workout_7"></div>-->
<!--        </div>-->
<!--    </div>-->


</div>
<script src="js/GetWorkoutProgram.js"></script>
