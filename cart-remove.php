<?php
session_start();

include('function1.php');
include('connection.php');

if(isset($_GET['cartid']))
{
    $cart_id = $_GET['cartid'];
    $table = createCart($con);

    $sql = "DELETE FROM `$table` WHERE cart_id=$cart_id";

    if(!mysqli_query($con, $sql))
    {
        echo "Error Updating Table: ".mysqli_error($con);
    }


}

header("location: cart.php");



?>