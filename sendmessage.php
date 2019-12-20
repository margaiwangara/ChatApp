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

    // json decode form data
    $data = json_decode(file_get_contents('php://input'), true);
    //get form data
    //$sender = validate($username);
    $receiver = validate($data['receiver']);
    $message = validate($data['message']);

    //some regex
    if(!preg_match("/^[A-Za-z0-9]{0,10}$/",$receiver))
    {
        $receiver = FALSE;
        $msg = "Invalid receiver name";
    }   
    
    if(!preg_match("/^[A-Za-z0-9\..\s ]{1,}$/",$message))
    {
        $message = FALSE;
        $msg = "Invalid input message or empty";
    }

    if($receiver && $message)
    {
        //get id of sender
        $sender_id = mysqli_query($conn, "SELECT id FROM users WHERE username = '$username'") or trigger_error("Id not acquired");
        if(mysqli_num_rows($sender_id) == 1)
        {
            $messageinfo = mysqli_fetch_assoc($sender_id);
            $sender = $messageinfo['id'];

             //send message
            $send = mysqli_query($conn, "INSERT INTO messages(sender, receiver, message) VALUES('$sender','$receiver','$message')") or trigger_error("Message query failed");
            if(!$send)
                $msg = 'Message not sent';
            else
                $msg = 'Message sent';
        }
       
    }
    
    echo json_encode(array('message' => $msg));
} 

?>