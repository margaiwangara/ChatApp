<?php
if(session_status() == PHP_SESSION_NONE)
    //sessions
    session_start();

//database
require_once 'connectdb.php';

//initialize
$req_msg = FALSE;
$totalRequesters = 0;
$requester = $rq_when = [];
if(isset($_SESSION['USERNAME']))
{
    $owner = $_SESSION['USER_ID'];

    //check availability
    $request_available = mysqli_query($conn, "SELECT * FROM not_strangers WHERE receiver = '$owner' AND request_status = 'pending'") or trigger_error("Check request query failed");
    if(mysqli_num_rows($request_available) > 0)
    {
        $totalRequesters = mysqli_num_rows($request_available);
        while($request_data = mysqli_fetch_assoc($request_available))
        {
            $requester [] = $request_data['sender'];
            $rq_when [] = $request_data['sent_date'];
        }
    }
}

?>