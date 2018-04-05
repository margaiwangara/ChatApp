<?php
/**Get all registered people and display on homepage */

//require db
require_once 'connectdb.php';

//initialize variables
$username = $email = $ids = [];
$msg = FALSE;
$noOfPeople = 0;

if(isset($_SESSION['USERNAME']))
    $user = $_SESSION['USERNAME'];

$users = mysqli_query($conn, "SELECT * FROM users WHERE username != '$user'") or trigger_error("Couldn't get users");

if(mysqli_num_rows($users) > 0)
{
    $noOfPeople = mysqli_num_rows($users);
    while($allusers = mysqli_fetch_assoc($users))
    {
        $username [] = $allusers['username'];
        $email [] = $allusers['email'];
        $ids [] = $allusers['id'];
    }
}
else
    $msg = "There are no users to display";


?>