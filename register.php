<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "login_register_guvi";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Database connection failed;");
}


        if (isset($_POST["submit"])) {
           $fullName = $_POST["username"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["confirm_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 characters long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           
           $emailsql = "SELECT * FROM user_login WHERE email = '$email'";
           $result = mysqli_query($conn, $emailsql);
           $emailCount = mysqli_num_rows($result);

           $namesql = "SELECT * FROM user_login WHERE username = '$fullName'";
           $nameresult = mysqli_query($conn, $namesql);
           $nameCount = mysqli_num_rows($nameresult);

           if ($emailCount>0) {
            array_push($errors,"Email already exists!");
           }
           if ($nameCount>0) {
            array_push($errors,"Username already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                
                echo "$error\n";
            }
           }else{
            
            $sql = "INSERT INTO user_login (username, email, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                http_response_code(200);
                die('success');
                
                echo "You are registered successfully.";
                
                
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>