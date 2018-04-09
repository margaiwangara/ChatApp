<?php
//session
if(session_status() == PHP_SESSION_NONE)
    session_start();

//db
require_once 'connectdb.php';

//initialized variables
$msg = FALSE;
$senders = $receivers = $usermessages = [];
if(isset($_SESSION['USERNAME']))
    $owner_id = $_SESSION['USERNAME'];

//get id of receiver
$guest = validate($_GET['id']);

//get owner id
$owner_query = mysqli_query($conn, "SELECT id FROM users WHERE username = '$owner_id'") or trigger_error("Owner query failed");
if(mysqli_num_rows($owner_query) > 0)
{
    $owner_info = mysqli_fetch_assoc($owner_query);

    $owner_id = $owner_info['id'];

    $messages = mysqli_query($conn, "SELECT * FROM messages WHERE (receiver = '$owner_id' OR sender = '$owner_id') AND (receiver = '$guest' OR sender = '$guest')") or trigger_error("Messages query failed");
    if(mysqli_num_rows($messages) > 0)
    {
        while($messagecontainer = mysqli_fetch_assoc($messages))
        {
            $senders [] = $messagecontainer['sender'];
            $receivers [] = $messagecontainer['receiver'];
            $usermessages [] = $messagecontainer['message'];
        }
    }else
        $msg = "There are no messages to display";

    echo json_encode(array('sender' => $senders, 'receiver' => $receivers, 'message' => $usermessages,'admin' => $owner_id));
}

?>