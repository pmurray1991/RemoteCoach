<?php
    if(session_id() == '' || !isset($_SESSION)) {
        // session isn't started
        session_start();
    }
?>
<?php include("includes/Header.php");?>
<body>
    <?php include("html/navbar.php"); ?>   
    <div id="content">
        
        <?php 
        if($_SESSION["login"] == '1'){
            echo "Got Here!";
        
        } ?>
    </div>
    
</body>
<?php include("includes/footer.php"); ?>
