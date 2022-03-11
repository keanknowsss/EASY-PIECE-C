<?php

session_start();


include('connection.php');
include('function1.php');

$user_data = check_user($con);


if(isset($_POST['submit']))
{
    $item_id = $_POST['id'];
    $item_price = $_POST['itemPrice'];
    $Quantity = $_POST['itemQuantity'];
    $BrandName = $_POST['brandName'];
    $Name = $_POST['itemName'];
    $Category = $_POST['category'];
    $description = $_POST['description'];
    $business_id = $user_data['business_id'];


    if($_POST['delivery']=='on'){$delivery = 1;} else {$delivery = 0;}
    if($_POST['walkIn']=='on'){$walkin = 1;} else {$walkin = 0;}
    

//
    $item_image = $_FILES['image']['name'];
    $target = "products/". basename($item_image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) 
    {
        $msg = "Image Uploaded Successfully";
    }
    else
    {
        $msg = "There was a problem uploading image";
    }

    if(!empty($BrandName) && !empty($Name))
    {
        $query = "UPDATE additem SET item_price='$item_price',Qty='$Quantity',BrandName='$BrandName',Name='$Name',Category='$Category',Description='$description',Image='$item_image',ForDelivery='$delivery',ForWalkin='$walkin',business_id='$business_id' WHERE item_id='$item_id'";

        if(!mysqli_query($con, $query))
    {
        echo "Error Updating Item: ".mysqli_error($con);
    }

    }

    header("location: business-inventory.php");
}

?>