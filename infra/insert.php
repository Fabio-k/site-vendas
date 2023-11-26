<?php
if($_POST){
    require_once "connection.php";
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(strlen($password) < 8) {
        echo "Password should be at least 8 characters";
        return;
    }

    // Check if password contains both numbers and letters
    if(!preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {
        echo "Password should contain both numbers and letters";
        return;
    }

    $sql = "SELECT * FROM user WHERE nome = '$username'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        echo "username already exists";
    }
    else{
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (nome, password_hash) VALUES ('$username', '$hashed_password')";
        if($conn->query($sql) === TRUE){
            echo "user created";
        }
        else{
            echo "error: " . $sql . "<br>" . $conn->error;
        }
    }
}
