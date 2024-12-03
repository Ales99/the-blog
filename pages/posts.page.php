<?php
session_start()
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
            <div class="navBar">
                <?php 
                if(!isset($_SESSION['user_id'])){
                    header("Location: ../index.php");
                }
                else{
                ?>
                    <li><a href="../index.php">Main Page</a></li>
                    <li id="openModal">Create new post</li>
                    <li><a href="../config files/logout.php">LOGOUT</a></li>
                    <?php
                    }
                    ?>                
            </div> </div>



<dialog id="myModal">
    <h2>Create new post</h2>
    <form action="../config files/insert.php" method="post">
    <textarea class="article" name="content"></textarea>
    <button type="submit" class="close-btn" id="closeModal" name="submit" value="submit">Post</button>
    </form>
    
</dialog>

<div class="rev-section">
        
        <h2 class="title">Your <span style="color: orange; font-family: ink free; font-size: 70px">P</span>osts</h2>
        <p class="note">Be respectful!!! </p>
        <div class="reviews" id="reviews">
            
            <?php
            include "../config files/getData.php";
            if($data->num_rows>0){
                while($row = $data->fetch_assoc()){
            ?> 
            <div class="review">
                <div class="body-review">
                    <div class="desc-review"><?=$row['content']?></div>
                    <button class="button-rev"><a href="../config files/delete.php?id=<?=$row['desc_id']?>">🗑</a></button>
                </div>
            </div>
            <?php 
                }
            }
            else{
                echo "<div class='review'>";
                echo "<h2 class='title'>No posts yet</h2>";
                echo "</div>";
            }
            ?> 
        
        </div>
        
</div>

<script>
    const openModal = document.getElementById('openModal');
 const closeModal = document.getElementById('closeModal');
 const modal = document.getElementById('myModal');

 // Show the modal
 openModal.addEventListener('click', () => {
     modal.showModal();
 });

 // Close the modal
 closeModal.addEventListener('click', () => {
     modal.close();
 });

 // Close the modal when clicking outside
 modal.addEventListener('click', (event) => {
     if (event.target === modal) {
         modal.close();
     }
 });
</script>
</body>
</html>