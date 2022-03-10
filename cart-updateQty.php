<?php
session_start();
include('function1.php');
include('connection.php');


if(isset($_POST['CartId']))
{
    $cart_id = $_POST['CartId'];
    $qty = $_POST['Quantity'];
    $table = createCart($con);


    // debug_to_console($cart_id);
    $sql = "UPDATE $table SET qty = '$qty' where cart_id = $cart_id"; 

    if(!mysqli_query($con, $sql))
    {
        echo "Error Updating Table: ".mysqli_error($con);
    }

    $cart_id="";
    $qty="";
    
}

