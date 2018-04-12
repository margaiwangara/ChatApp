<?php
//session
session_start();

//connect db
require_once 'connectdb.php';

//initialize msg
$rq_msg = FALSE;
if(isset($_SESSION['USERNAME']))
{
    $owner = $_SESSION['USER_ID'];
    $guest = validate($_POST['guest']);

    //check if request already exists
    $request_query = mysqli_query($conn, "SELECT * FROM not_strangers WHERE (sender = '$owner' OR reciever = '$owner') AND (sender = '$guest' OR receiver = '$guest') AND (request_status = 'pending' OR request_status = 'known')") or trigger_error("Request query failed");
    if(mysqli_num_rows($request_query) > 0)
    {
        
        //some code goes here
        $rq_msg = "Your request is already accepted";
    }
    else
    {
        //check if it exists
        $denied_request = mysqli_query($conn, "SELECT * FROM not_strangers WHERE (sender = '$owner' OR receiver = '$owner') AND (sender = '$guest' OR receiver = '$guest') AND (request_status = 'denied')") or trigger_error("Denied query failed");
        if(mysqli_num_rows($denied_request) > 0)
        {
            //update option
            $update_denied = mysqli_query("UPDATE not_strangers SET request_status = 'pending' WHERE (sender = '$owner' OR receiver = '$owner') AND (sender = '$guest' OR receiver = '$guest') AND (request_status = 'denied')") or trigger_error("Denied update query failed");

            if(mysqli_affected_rows($update_denied) == 1)
            {
                $rq_msg = "Request sent";
            }
            else
            {
                $rq_msg = "Request not sent";
            }
        }
        else
        {
            $send_request = mysqli_query($conn, "INSERT INTO not_strangers(sender,receiver,request_status) VALUES('$owner','$guest','0')") or trigger_error("Request sending query failed");
            if(mysqli_affected_rows($conn) == 1)
            {
                $rq_msg = "Request sent";
            }
            else
            {
                $rq_msg = "Request not sent due to a technical issue";
            }
        }
        
    }
}
else
    $rq_msg = "Please log in to get known";



?>