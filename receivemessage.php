<?php
//session
if(session_status() == PHP_SESSION_NONE)
    session_start();

//db
require_once 'connectdb.php';

//initialized variables
$msg = FALSE;
$senders = $receivers = $usermessages = $name = $sent_date = FALSE;;
if(isset($_SESSION['USERNAME']))
{
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
            //get guest username
            $guest_username = mysqli_query($conn, "SELECT * FROM users WHERE id = '$guest'") or trigger_error("Guest Username query failed");
            if(mysqli_num_rows($guest_username) > 0)
            {
                //fetch data
                $guest_data = mysqli_fetch_assoc($guest_username);

                $name = $guest_data['username'];

                while($messagecontainer = mysqli_fetch_assoc($messages))
                {
                    //assign names to values instead of numbers;
                    if($messagecontainer['sender'] == $guest)
                        $messagecontainer['sender'] = ucwords($name);
                    else if($messagecontainer['sender'] == $_SESSION['USER_ID'])
                        $messagecontainer['sender'] = ucwords($_SESSION['USERNAME']);

                    if($messagecontainer['receiver'] == $guest)
                        $messagecontainer['receiver'] = ucwords($name);
                    else if($messagecontainer['receiver'] == $_SESSION['USER_ID'])
                        $messagecontainer['receiver'] = ucwords($_SESSION['USERNAME']);

                    //add values to containers
                    $senders [] = $messagecontainer['sender'];
                    $receivers [] = $messagecontainer['receiver'];
                    $usermessages [] = $messagecontainer['message'];

                    //explode one
                    $time = explode("-",$messagecontainer['created_at']);
                    $year = $time[0];
                    $month = $time[1];
                    
                    //explode two;
                    $exp2 = explode(" ",$time[2]);
                    $day = $exp2[0];

                    //explode three
                    $exp3 = explode(":",$exp2[1]);

                    //vars
                    $hour = $exp3[0];
                    $min = $exp3[1];
                    $sec = $exp3[2];
                    
                    $date = mktime($hour,$min,$sec,$month,$day,$year);
                    $sent_date [] = date('j M',$date)."&nbsp;'".date('y',$date)." at ".date('h.ia',$date);
                }
            }
            
        }else
            $msg = "There are no messages to display";

        echo json_encode(array('sender' => $senders, 'receiver' => $receivers, 'message' => $usermessages,'msg' => $msg,'user' => $_SESSION['USERNAME'],'created_at' => $sent_date));
    }
}
    


?>