<?php
if(isset($_GET['userId'])){
    include("config.php");
    $userid = $_GET['userId'];
    $sql = "DELETE FROM users where id='$userid'";
    if(!$conn->query($sql)){
        die();
    }
    header("Location:displayUsers.php");

}