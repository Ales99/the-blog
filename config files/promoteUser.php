<?php
if(isset($_GET['userId'])){
    include("config.php");
    $user = $_GET['userId'];
    $sql = "UPDATE `users` SET `isAdmin`='1' WHERE id='$user'";
    $conn->query($sql);
    if(!$conn->query($sql)){
        die();
    }
    header("Location:displayUsers.php");
}