<?php 
//start session
session_start();

//session destruction
if(isset($_SESSION['USERNAME']) || isset($_SESSION['EMAIL']))
{
    //session destroy
    session_destroy();

    //redirect
    header("Location:registration.php");
}   

?>