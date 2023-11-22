<?php
$host = "localhost";
$user = "incredorable12";
$pw = "cumber0719!";
$db = "incredorable12";

$connect = new mysqli($host, $user, $pw, $db);
$connect->set_charset("utf-8");

// if(mysqli_connect_errno()){
//     echo "DATABASE Connect False";
// } else {
//     echo "DATABASE Connect True";
// }
?>