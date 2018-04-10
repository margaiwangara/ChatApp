<?php
//start session
session_start();

//db
require_once 'connectdb.php';

//values from form
$owner = $_SESSION['USER_ID'];
$guest = validate($_GET['guest']);

//initial
$status = FALSE;

//check availability in db
$available = mysqli_query($conn, "SELECT * FROM message_status WHERE (sender = '$owner' OR receiver = '$owner') AND (sender = '$guest' OR receiver = '$guest')") or trigger_error("Status query failed");
if(mysqli_num_rows($available) > 0)
{
    //update status
    $typing = mysqli_query($conn, "UPDATE status_table SET message_status = '1' WHERE (sender = '$owner' OR receiver = '$owner') AND (sender = '$guest' OR receiver = '$guest')") or trigger_error("Status update query failed");
    if(mysqli_affected_rows($conn) == 1)
    {
        $status = 1;
    }
    else
    {
        $status = 0;
    }
}
else
{
    //insert into table
    $inavailable = mysqli_query($conn, "INSERT INTO message_status(sender,receiver,message_status) VALUES('$owner','$guest','1')") or trigger_error("Status insert failed");
    if(mysqli_affected_rows($conn) == 1)
    {
        $status = 1;
    }
    else
    {
        $status = 0;
    }
}

echo $status;

?>