<?php
session_start();
       include("config.php");
        if(isset($_POST["submit"])){
            extract($_POST);
            if(empty($content)){
                header("Location: ../pages/posts.page.php?error=emptyfield");
                exit();
            }
            $userid = $_SESSION['user_id'];
            $sql = "INSERT INTO `description`(`desc_id`, `content`, `u_id`) VALUES ('NULL','$content','$userid')";
            if(!$conn->query($sql)){
                header("Location: ../pages/posts.page.php?error=statementfailed");
                exit();
            }
            header("Location: ../pages/posts.page.php");

        }
    mysqli_close($conn);
?>