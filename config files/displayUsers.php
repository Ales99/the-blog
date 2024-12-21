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
                    <li><a href="../config files/logout.php">LOGOUT</a></li>       
            </div> 
        </div>


<div class="rev-section">
    <input onkeyup='searchUser(this.value)' class='input' type='text' placeholder='Search user'>
    <div id="123" class="usersTable"></div>
</div>



<script>
    let character = "";
    function Page(pageNum) {
        if(pageNum == null){
            pageNum = 1
        }
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.status == 200 && xhr.readyState == 4) {
            document.getElementById("123").innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "showUserspagi.php?page=" + pageNum+"&q="+character, true);
    xhr.send();
}

function searchUser(c){
    if(!c){
        character = "";
    }
    else{
        character = c;
    }
        let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.status == 200 && xhr.readyState == 4) {
            document.getElementById("123").innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "showUserspagi.php?q="+c, true);
    xhr.send();
}
Page(1);
</script>