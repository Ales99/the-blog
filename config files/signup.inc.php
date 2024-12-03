<?php
require_once "config.php";
if(isset($_POST['submit'])){
    extract($_POST);
    $sql = "SELECT * FROM `users` WHERE username = '$username' OR email = '$email'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        header("Location: ../pages/signup.page.php?error=usernameoremailalreadytaken");
        exit();
    } 
    else{
        $hashedPass = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users`(`id`, `username`, `email`, `password`) VALUES ('NULL','$username','$email','$hashedPass')";
        if(!$conn->query($sql)){
            header("Location: ../pages/signup.page.php?error=statmentfailed");
            exit();
        }
        header("Location: ../pages/login.page.php");    
    }
    
}