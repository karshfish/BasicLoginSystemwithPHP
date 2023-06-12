<?php
if(isset($_POST["signup"])):
    // Grabbing data
    $uid=$_POST["uname"];
    $pwd=$_POST["pwd"];
    $pwd_repeat=$_POST["pwd-repeat"];
    $email=$_POST["email"];



    // Instantiate SignUpContr class
    include "../classes/dbh_classes.php";
    include "../classes/signup_class.php";
    include "../classes/signupContr_class.php";
    $signup= new SignupContr($uid,$pwd,$pwd_repeat,$email);

    //Error Handlers
    $signup->signUpUser();

    // Going back to front page
    header("location:../index.php?error=none");
endif;

