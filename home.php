<?php
session_start();
?>
<html>
    <?php
    $name=$_SESSION["useruname"];
    if(isset($_SESSION["userid"])){

    ?>
    <li><a href='#'><?php echo"<h1>Your are beautiful $name </h1>"; ?></a></li>
    <button type="submit" action="include/logut_inc.php">Logout</button>
<?php
    }
    else{
        ?>
        <li><a href='#'>SignUp</a></li>
        <li><a href='#'>Login</a></li>
        <?php
    }?>

</html>
