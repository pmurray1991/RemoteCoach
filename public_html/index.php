<?php include("includes/Header.php");?>
<body>
    <?php include("includes/navbar.php"); ?>   
    <div class="container">
        <?php 
            if(isset($_SESSION["login"])){
                include("includes/Programs.php");
//                var_dump($_SESSION);
            }else{
                include("html/Login.html");
            }
        ?>
    </div>
    
        
</body>
<?php include("includes/footer.php"); ?>
