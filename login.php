<?php

if(session_status() == PHP_SESSION_NONE)
    //start session
    session_start();

//connect db
require_once 'connectdb.php';

//init
$lgmsg = FALSE;
if(isset($_POST['login_submit']))
{
    //get values
    $user_identifier = validate($_POST['user_identifier']);
    $password = validate($_POST['password']);

    if(!empty($user_identifier) && !empty($password))
    {
        //check availability
        $access = mysqli_query($conn, "SELECT * FROM users WHERE email = '$user_identifier' OR username = '$user_identifier'") or trigger_error("Login query failed");
        if(mysqli_num_rows($access) == 1)
        {
            //confirm password
            $login_data = mysqli_fetch_assoc($access);

            $id = $login_data['id'];
            echo $login_data['password'];
            if(password_verify($password,$login_data['password']))
            {
                //access account
                //set sessions
                $_SESSION['USERNAME'] = $login_data['username'];
                $_SESSION['EMAIL'] = $login_data['email'];
                $_SESSION['USER_ID'] = $id;

                ///redirect
                header("Location:home.php");
            }
            else
                //message
                $lgmsg = "<span class='text-danger'>Invalid Username/Email or Password</span>";
        }
    }
    else
        //message
        $lgmsg = "<span class='text-danger'>All fields are required</span>";
}

?>