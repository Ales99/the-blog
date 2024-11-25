<?php
    include("config files/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/editor.css">
    <title>Editor</title>
</head>
<body>
    <button class="homeBtn" onclick="homePage()">X</button>
    <form action="editor.php" method="post">
     <div class="blog">
        <div class="head">
        <textarea type="text" class="title" placeholder="your Name..." name="username"></textarea>
    </div>
    <textarea type="text" class="article" placeholder="Start writing..." name="desc"></textarea>
    </div>
    <div class="btn">
         <input type="submit" name="publish" class="publish-btn" value="Publish">
    </div>
</form>

<script>
    function homePage(){
        window.location.href="index.php";
    }
</script>
</body>
</html>
<?php
   
        if(isset($_POST["publish"])){
            $name = filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
            $description = filter_input(INPUT_POST,"desc",FILTER_SANITIZE_SPECIAL_CHARS);
            if(empty($name)||empty($description)){
                echo"<script>alert(`fill all fields`)</script>";
            }
            else{$sql = "INSERT INTO `user` (`ID`, `Name`, `Desc`) 
                    VALUES (NULL, '$name', '$description')";
            mysqli_query($conn,$sql);
            
            header("location:index.php");}
        }
    mysqli_close($conn);
?>

