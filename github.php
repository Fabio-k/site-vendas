<?php
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
    
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['id'] = $github_id;
    header("Location: http://localhost");
}