<?php
session_start();
require_once("connection.php");
require_once("function1.php");

$user_data = check_user($con);


// creates a table for cart for user and initialize data
if($_POST['submit'])
{
    //get values for the table
    $table = createCart($con);
    $user_id="";
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];


    switch($_SESSION['privilage'])
    {
        case "customer":
            $user_id = $_SESSION['user_id'];
            break;
        case "business":
            $user_id = $_SESSION['business_id'];
            break;
    }

    //get the row of the item to check if there is a duplicate
    $item_data = getItemDuplicate($user_id, $item_id, $con);

    if ($item_data['qty'] > 0) // update the quantity of the row
    {
        $quantity += $item_data['qty'];
        $sql = "UPDATE $table SET qty = '$quantity' where item_id = $item_id"; 

    }
    else    // insert new row
    {
        $sql = "INSERT INTO $table VALUES (
            '',
            '$user_id',
            '$item_id',
            '$quantity'
        )";
    }
    


    if(!mysqli_query($con, $sql))
    {
        echo "Error Inserting Order: ".mysqli_error($con);
    }

    header("location: product.php?id=".$item_id);
}
