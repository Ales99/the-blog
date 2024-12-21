<?php
session_start();
include("config.php");
    $q = isset($_GET['q']) ? $_GET['q']:null;
$sql = $q ? "SELECT COUNT(*) FROM users WHERE username LIKE '$q%'" :"SELECT COUNT(*) FROM users";
$result = $conn->query($sql);
if($result->num_rows > 0){
$userCount = $result->fetch_column();
$maxCount = 5;
$totalPages = ceil($userCount/$maxCount);
$pageNow = isset($_GET['page']) ? $_GET['page'] : 1;
$pageNow <= 1 ? $pageNow = 1: null; 
$pageNow >= $totalPages ? $pageNow = $totalPages: null;
$x = ($pageNow - 1) * $maxCount;

$sql2 = $q ? "SELECT * FROM `users` WHERE username LIKE '$q%' ORDER BY `id` LIMIT $x , $maxCount":
            "SELECT * FROM `users` ORDER BY `id` LIMIT $x , $maxCount";
$users= $conn->query($sql2);
echo "<table border='1px'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Name</th>";
echo "<th>isAdmin</th>";
echo "<th>Delete</th>";
echo "<th>Promote</th>";
echo "</tr>";
while($row = $users->fetch_assoc()){
    echo "<tr>";
    echo "<td>".$row['id']."</td>"; 
    echo "<td>".$row['username']."</td>";
    $isAdmin = $row['isAdmin'] == 1 ? "yes":"no";
    echo "<td>".$isAdmin."</td>";
    echo "<td><a style='color: red; text-decoration: none;' href='DeleteUser.php?userId=".$row['id']."'>X</a></td>";
    $promote = $row['isAdmin'] == 1 ? "-":"<a style='color: black; text-decoration: none;' href='promoteUser.php?userId=".$row['id']."'>Promote</a>";
    echo "<td>".$promote."</td>";
    echo "</tr>";   
}
echo "</table>";
$prevPage = $pageNow <1 ? 1:$pageNow-1;
echo"<button class='prev-nextBtn' onclick='Page(".$prevPage.")'>prev</button>";
$nextPage = $pageNow == $totalPages? $totalPages:$pageNow+1;
echo"<button class='prev-nextBtn' onclick='Page(".$nextPage.")'>Next Page</button>";

}




?>




