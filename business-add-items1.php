<?php
session_start();



include('connection.php');
include('function1.php');
include('function2.php');

$user_data = check_user($con);


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
   $item_price = $_POST['itemPrice'];
   $Quantity = $_POST['itemQuantity'];
   $BrandName = $_POST['brandName'];
   $Name = $_POST['itemName'];
   $Category = $_POST['category'];
   $description = $_POST['description'];
   $item_image = $_POST['productImg'];
   $business_id = $user_data['business_id'];

    if($_POST['delivery']=='on'){$delivery = 1;} else {$delivery = 0;}
    if($_POST['walkIn']=='on'){$walkin = 1;} else {$walkin = 0;}
    

    //something was posted


   if(!empty($BrandName) && !empty($Name))
   {
        //save to database

        
        $query = "INSERT INTO additem VALUES(
            '$item_price',
            '$Quantity',
            '$BrandName',
            '$Name',
            '$Category',
            '$description',
            '$item_image',
            '$delivery',
            '$walkin',
            '$business_id',
            '')";

            mysqli_query($con,$query);
            header("Location: business-add-items.php");
            die;
   }else
   {
       echo "Please enter some valid information.";
   }
}

?>