<?php
//session
if(session_status() == PHP_SESSION_NONE)
    session_start();

//database
require_once 'connectdb.php';

$msg = FALSE;
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_SESSION['USERNAME']))
        $username = $_SESSION['USERNAME'];
    //get form data
    $sender = validate($username);
    $receiver = validate($_POST['receiver']);
    $message = validate($_POST['message']);

    //some regex
    if(!preg_match("^[1-9][0-9]{1,10}$",$receiver))
    {
        $receiver = FALSE;
        $msg = "Invalid receiver name";
    }   
    
    if(!preg_match("^[A-Za-z0-9\..\s ]{5,}$",$message))
    {
        $message = FALSE;
        $msg = "Invalid input message or empty";
    }

    if($receiver && $message)
    {
        //send message
        $send = mysqli_query($conn, "INSERT INTO messages(sender, receiver, message) VALUES('$sender','$receiver','$message')") or trigger_error("Message query failed");
        if($send)
        {
            //message sent successfully
            $msg = "Message sent successfully";
        }
        else
            $msg = "Message not sent";
    }
}   
?>