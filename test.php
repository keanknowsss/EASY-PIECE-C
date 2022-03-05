<?php

require("connection.php");


$id="4";
// $stmt = $con->prepare("SELECT * FROM 'additem' WHERE 'item_id'");
$query = "SELECT * FROM `additem` WHERE item_id = '$id' LIMIT 1";
$result = mysqli_query($con,$query);
if($result && mysqli_num_rows($result) > 0)
{
    $business_data = mysqli_fetch_assoc($result);
    $img = $business_data['Image'];
    
}



// $stmt->execute([$id]);
// $img = $stmt->fetch();
// $img = $img['img_data'];

header("Content-type: image/jpeg");
echo $img;