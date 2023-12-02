<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "login_register_guvi";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Database connection failed;");
    
}

        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            
            $sql = "SELECT * FROM user_login WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    echo("Login successful");
                    // header("Location: profile.html");
                    die();
                }else{
                    echo "Password does not match";
                }
            }else{
                echo "Email does not match";
            }
        }


?>