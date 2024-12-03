<?php
require_once "config.php";
if(isset($_POST['submit'])){
    extract($_POST);
    $sql = "SELECT password FROM `users` WHERE username = '$username' OR email = '$username' ";
    if(!$result = $conn->query($sql)){
        header("Location: ../pages/login.page.php?error=statementfailed");
        exit();
    }
    if($result->num_rows == 0){
        header("Location: ../pages/login.page.php?error:Wrongpassword");
        exit();
    }
    else{
        $sql = null;
        $userPass = $result->fetch_assoc();
    if(!password_verify($password,$userPass['password'])){
        header("Location: ../pages/login.page.php?error:Wrongpassword");
        exit();
    }
    else{
        $sql = "SELECT * FROM `users` WHERE username = '$username' OR email = '$username'";
        $result = $conn->query($sql);
        $user = $result->fetch_assoc();
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: ../index.php");
    }
    }
    

}