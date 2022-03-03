<?php
session_start();

include('connection.php');
include('function1.php');
include('function2.php');

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