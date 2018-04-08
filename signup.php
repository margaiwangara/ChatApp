<?php
//start session
session_start();

//require db
require_once "connectdb.php";

//initialize message var
$msg = FALSE;

if(isset($_POST['signup_submit']))
{
    //gather form values
    $username = validate($_POST['username']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $confirm_password = validate($_POST['confirm_password']);

    if(!empty($username) && !empty($email) && !empty($password) && !empty($confirm_password))
    {
        if(!preg_match("/^[A-Za-z0-9]{2,10}$/",$username))
        {
            $username = FALSE;
            $msg = "Invalid username input";        
        }
        if(!preg_match("/^[A-Za-z0-9\..]{6,}$/",$password))
        {
            $password = FALSE;
            $msg = "Invalid password input";
        }
        else
        {
            if($password != $confirm_password)
            {
                $password = FALSE;
                $msg = "Password and Confirm Password values must match!";
            }
        }
        
        if($username && $email && $password)
        {
            //encrypt password 
            $password = password_hash($password,PASSWORD_DEFAULT);

            //check if user already exists
            $existance = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'") or trigger_error("Existance query failed");
            if(mysqli_num_rows($existance) > 0)
                $msg = "<span style='color: red;'>Username or Email already exists</span>";
            else
            {
                //insert into db
                $query = mysqli_query($conn, "INSERT INTO users(username,email,password) VALUES('$username','$email','$password')") or trigger_error("Signup not successfull");

                if(mysqli_affected_rows($conn) == 1)
                {
                   //set sessions
                   $_SESSION['USERNAME'] = $username;
                   $_SESSION['EMAIL'] = $email;
                   $_SESSION['USER_ID'] = mysqli_insert_id($conn);

                   //redirection
                   header("Location:home.php");
                    
                   //success message
                   $msg = "<span class='text-success'>Registration Successful</span>"; 
                }
                else
                    $msg = "<span class='text-success'>Registration Failed</span>";
            }
            
        }

    }
    else
    {
        $msg = "All fields are required";
    }

}
?>