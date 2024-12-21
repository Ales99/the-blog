<?php
session_start();
include("config.php");
if(isset($_GET['id'])){//receive the id
    $itemId = (int)$_GET['id'];
  $sql = "DELETE FROM `description` WHERE desc_id=$itemId";
  mysqli_query($conn,$sql);
  if($_SESSION['isAdmin'] == 1){
    header("Location: ../index.php");
  }
  else{
  header("Location: ../pages/posts.page.php");
      }
} 
mysqli_close($conn);
?>