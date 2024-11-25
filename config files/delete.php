<?php 
include("config.php");
if(isset($_POST['id'])){//receive the id from the js file
    $itemId = (int)$_POST['id'];
  $sql = "DELETE FROM `user` WHERE id=$itemId";
  mysqli_query($conn,$sql);
 echo json_encode(['success'=>true]);//sends a success message to javascript

}
    else echo "No ID Recieved";
mysqli_close($conn);
?>