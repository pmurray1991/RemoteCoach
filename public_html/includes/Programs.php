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
    <ul class="nav nav-tabs nav-justified container row">
        <li><a data-toggle="tab" href="#PendingList">Pending</a></li>
        <li><a data-toggle="tab" href="#CompletedList">Completed</a></li>
    </ul>
    <div class="tab-content" id="tabs">
        <div class="tab-pane active" id="PendingList">
        </div>
        <div class="tab-pane" id="CompletedList">

        </div>
    </div>
<script src="js/GetWorkoutProgram.js"></script>
