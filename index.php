<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/header.css">
    <title>header</title>
</head>
<body>
        
        <div class="header">
            <h2>The <span style="color: orange; font-size: 40px; font-family: ink free; font-weight: bold;">B</span>log</h2>
            <div class="navBar">
                <?php 
                if(!isset($_SESSION['user_id'])){
                    ?>
                    <li id="redirectB"><a href="pages/login.page.php">Login</a></li>  
                <?php
                }
                else{
                ?>
                    
                    <?php
                    if($_SESSION['isAdmin'] == 1){
                    echo "<li>Welcome back Admin</li>";
                       echo "<li><a href='  config files/displayUsers.php'>Admin page</a></li>";
                    }
                    else{
                        echo "<li>Welcome back ".$_SESSION['username']."</li>";
                        echo"<li><a href='pages/posts.page.php'>Your Posts</a></li>";
                    }

                    ?>
                    
                    <li><a href="config files/logout.php">LOGOUT</a></li>
                    <?php
                    }
                    ?>


                
            </div> </div>
            
    <div class="rev-section">
        
        <h2 class="title">Welcome to The <span style="color: orange; font-family: ink free; font-size: 70px">B</span>log</h2>
        <p class="note">This website is designed so you could share your thoughts
            and ideas without being afraid of people's discrimination.Enjoy!!
        </p>
        <div class="reviews" id="reviews">
            
            <?php
            include "config files/config.php";
            $sql= "SELECT username,content,desc_id FROM `users`,`description` WHERE u_id = id;";
            $data = $conn->query($sql);
            if($data->num_rows>0){
                while($row = $data->fetch_assoc()){
            ?> 
            <div class="review">
                <div class="body-review">
                    <div class="name-review"><?=$row['username'] ?> :</div>
                    <div class="desc-review"><?=$row['content']?></div>
                    <?php
                    if(isset($_SESSION['isAdmin'])&&$_SESSION['isAdmin'] == 1){
                    echo"<button class='button-rev'><a href='config files/delete.php?id=".$row['desc_id']."'>🗑</a></button>";
                }
                ?>
                </div>

            </div>
            <?php 
                }
            }
            ?> 
        
        </div>
        
</div>
        
      
<script src="index.js"></script>
        
</body>
</html>