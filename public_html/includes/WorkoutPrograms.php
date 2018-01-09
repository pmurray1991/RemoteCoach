<div class="row" id ="ExistingPrograms">
        <h5>Workout Programs</h5>
    </div>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Create Workout Program</button>
    
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create New Program</h4>
                </div>
                <div class="modal-body">
                    <div id="PNForm" >
                        <div id="pName" class="form-group">
                            <label for="programName">Program Name:</label>
                            <input type="text" class="form-control" id='programName'>
                            <label for="ProgramDescription">Program Description:</label>
                            <textarea class="form-control" id="ProgramDescription" maxlength="250" placeholder="Program Description"></textarea>
                            <button id="programNameSubmit" class='btn btn-primary' style="float:right" onclick="NewWorkoutProgram()">Create</button>
                        </div>
                    </div>
                        
                    </div>
                    <div id="pickDate" style="display: none">
                        <input type="text" class="form-control" id="datepicker">
                        <button id="backButton" class="btn btn-default" style="float: left">Back</button>
                        <button id="programNameSubmit" class='btn btn-primary' style="float:right">Next</button>
                    </div>
                    <div class="modal-footer">
                    
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
                
            </div>

        </div>
<script src="js/CreateWorkout.js"></script>
    <script>
        var programName;
        var programDescription;
        var headerValue;
        $("#programNameSubmit").click(function(){
            programName = $("#programName").val();
            programDescription = $("#ProgramDescription").val();
            
        });
        $( "#datepicker" ).datepicker();
        
        $("#backButton").click(function(){
            headervalue = $(".modal-header h4").html();
            if(headervalue == "Select Workout Date"){
                $("#pName").fadeIn();
                $("#pickDate").hide();
            }
        });
        
        </script>