<?php
if(isset($_POST["login"])):
    // Grabbing data
    $uid=$_POST["uname"];
    $pwd=$_POST["pwd"];




    // Instantiate SignUpContr class
    include "../classes/dbh_classes.php";
    include "../classes/login_class.php";
    include "../classes/loginContr_classes.php";
    $login= new LoginContr($uid,$pwd);

    //Error Handlers
    $login->LoginUser();

    // Going to the home page
    header("location:../home.php?error=none");
endif;