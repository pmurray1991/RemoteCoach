<?php
    session_start();
?>
<?php include("includes/Header.php");?>
<body>
    <?php include("includes/navbar.php"); ?>   
    <div class='container'>
        <?php
            var_dump($_SESSION);
            include("html/Program.html");
        ?>
    </div>
<script>
    getWorkout();
    </script>
<?php include ('includes/footer.php');?>
