<?php
$port = "127.0.0.1";
$user = "root";
$password = "usbw";
$db = "users";
$conn = new mysqli($port, $user, $password, $db);
if($conn->connect_error){
    die("error: " . $conn -> connect_error);
}
else{
    echo "sucess!";
}
?>