<?php

    include("config.php");
    
    $userId = $_SESSION['user_id'];
    $sql = "SELECT * FROM `description` WHERE u_id = '$userId'";
    $data = $conn->query($sql);
    
    
    


    mysqli_close($conn);
?>