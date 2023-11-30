<?php
$port = "127.0.0.1";
$user = "root";
$password = "usbw";
$db = "vendas";
$bd_status = "ok";
$conn = new mysqli($port, $user, $password, $db);
if($conn->connect_error){
    $bd_status = "error";
    die("error: " . $conn -> connect_error);
}
?>