<?php
       include("config.php");
        if(isset($_POST["insert"])){
            $name = filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
            $description = filter_input(INPUT_POST,"desc",FILTER_SANITIZE_SPECIAL_CHARS);
            if(empty($name)||empty($description)){
                echo"<script>alert(`fill all fields`)</script>";
            }
            else{$sql = "INSERT INTO `user` (`ID`, `Name`, `Desc`) 
                    VALUES (NULL, '$name', '$description')";
            mysqli_query($conn,$sql);
            header("location: ../index.php");
    }
        }
    mysqli_close($conn);
?>