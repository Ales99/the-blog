<?php

session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: ../index.php");
    exit();
}
if($_SESSION['isAdmin'] == 0){
    header("Location:../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/header.css">
    <title>Posts page</title>

</head>
<body>
        <div class="header">
            <h2>The <span style="color: orange; font-size: 40px; font-family: ink free; font-weight: bold;">B</span>log</h2>
            <h2>Admin page</h2>
            <div class="navBar">
                    <li><a href="../index.php">Main Page</a></li>
                    <li><a href="../config files/displayUsers.php">Display users</a></li>
                    <li><a href="../config files/logout.php">LOGOUT</a></li>       
            </div> 
        </div>






</body>
</html>