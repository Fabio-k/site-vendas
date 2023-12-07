<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (!isset($_GET['code'])) {
    $url = "https://github.com/login/oauth/authorize?client_id=687dea1145cd28dd5e2b&redirect_uri=http://localhost/github.php";
    header("Location: $url");
} else {
    echo $_GET['code'];
    $code = $_GET['code'];
    $post = http_build_query([
        'client_id' => '687dea1145cd28dd5e2b',
        'redirect_uri' => 'http://localhost/github.php',
        'client_secret' => '7b284ba6cd994e2f5392cf14723fbc64b324f73d',
        'code' => $code,
    ]);
    $context = stream_context_create([
        "http" => [
            "method" => "POST",
            "header" => ["Content-Type: application/x-www-form-urlencoded"],
            "content" => $post,
        ]
    ]);
    $json_data = file_get_contents("https://github.com/login/oauth/access_token", false, $context);
    parse_str($json_data, $output);
    $access_token = $output['access_token'];
    

    $context = stream_context_create([
    "http" => [
        "method" => "GET",
        "header" => ["Authorization: token " . $access_token,
                     "User-Agent: MyApp"]
    ]
    ]);
    $json_data = file_get_contents("https://api.github.com/user", false, $context);
    $user_data = json_decode($json_data, true);

    $github_id = $user_data['id'];
    $username = $user_data['login'];
    $avatar_url = $user_data['avatar_url'];
    $name = $user_data['name'];
    echo "--" . $github_id . "--" . $username . "--";
    require_once 'infra/conexao.php';
    $sql = "SELECT * FROM users WHERE github_id = $github_id";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if(mysqli_num_rows($result) == 0){
        $sql = "INSERT INTO users (github_id, nome) VALUES ($github_id, '$username')";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $sql = "SELECT * FROM users WHERE github_id = $github_id";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $row = mysqli_fetch_assoc($result);
        $username = $row['nome'];
        $id = $row['id'];
    }else{
        $row = mysqli_fetch_assoc($result);
        $username = $row['nome'];
        $id = $row['id'];
    }
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['id'] = $id;
    header("Location: /view/index.php");
    
}