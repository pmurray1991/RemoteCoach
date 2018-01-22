<?php
session_start();
?>
<nav class = "navbar navbar-inverse" role = "navigation" id="menubar">
   
   <div class = "navbar-header">
      <button type = "button" class = "navbar-toggle" 
         data-toggle = "collapse" data-target = "#example-navbar-collapse">
         <span class = "sr-only">Toggle navigation</span>
         <span class = "icon-bar"></span>
         <span class = "icon-bar"></span>
         <span class = "icon-bar"></span>
      </button>
		
      <a class = "navbar-brand" id="index"href = "#">Remote Coach</a>
   </div>
   
   <div class = "collapse navbar-collapse" id = "example-navbar-collapse">
	
      <ul class = "nav navbar-nav">
         <!--<li><a href = "#Program">Program</a></li>-->
         <!--<li><a href = "CreateWorkoutProgram.php">Build Workout</a></li>-->
         <?php
            if(isset($_SESSION["login"])){
                echo('<li data-toggle="collapse" data-target=".navbar-collapse.in"><a id ="ProgramPage"  href = "#Program">Program</a></li>');
                echo('<li><a id="MakeProgram" data-toggle="collapse" data-target=".navbar-collapse.in" href = "#MakeProgram">Make Program</a></li>');
                echo('<li><a id ="CreateExercise" data-toggle="collapse" data-target=".navbar-collapse.in" href = "#CreateExercise">Create Exercise</a></li>');
                echo('<li><a id ="CreateWorkout" data-toggle="collapse"  data-target=".navbar-collapse.in" href = "#CreateWorkout">Create Workout</a></li>');
                echo('<li><a id ="Logout" data-toggle="collapse"  data-target=".navbar-collapse.in" href ="#Logout">Logout</a></li>');
            }
         ?>
         
			
      </ul>
   </div>
   
</nav>
<!--<script src="js/PageChange.js"></script>-->
