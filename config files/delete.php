<?php 
include("config.php");
if(isset($_GET['id'])){//receive the id from the js file
    $itemId = (int)$_GET['id'];
  $sql = "DELETE FROM `description` WHERE desc_id=$itemId";
  mysqli_query($conn,$sql); 
  header("Location: ../pages/posts.page.php");

} 
mysqli_close($conn);
?>