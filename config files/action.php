<?php
    include("config.php");
    $sql = "SELECT * 
            FROM `user`";
    $data = mysqli_query($conn,$sql);
    $json_data = array();
    
    if(mysqli_num_rows($data)>0){
    while($row = mysqli_fetch_assoc($data)){
        $json_data[] =  $row;
    
    }

    echo json_encode($json_data);  
}


    mysqli_close($conn);
?>