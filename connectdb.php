<?php

$server = "localhost";
$username = "margai";
$password = "082131";
$dbname = "chatapp";

$conn = mysqli_connect($server,$username,$password,$dbname);
if(!$conn)
    echo "<span style='color:red;'>Connection Failed</span>";

function validate($data)
{
    global $conn;
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = mysqli_real_escape_string($conn, $data);
    $data = stripslashes($data);

    return $data;
}


?>