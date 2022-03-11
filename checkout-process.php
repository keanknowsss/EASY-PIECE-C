<?php
session_start();
require "connection.php";
require "function1.php";

if($_POST['submit'])
{
    $order = createOrder($con);

    // cart id
    // get quantity using cart id
    $selectedItems = $_POST['idString'];
    $selectedItemsArray = explode(",",$selectedItems);


    // random order number
    $order_placement_id = rand(10000, 999999);


    // total
    $total = $_POST['total'];

    $procurement = $_POST['procurement'];


    for($i = 0; $i<count($selectedItemsArray); $i++)
    {
        $cart = itemsinCart(createCart($con), $selectedItemsArray[$i], $con);

        $item_id = $cart['item_id'];

        // debug_to_console($cart);

        $qty = $cart['qty'];


        $query = "INSERT INTO $order VALUES(
            '',
            '$item_id',
            '$qty',
            '$order_placement_id',
            '$total',
            '$procurement'
        )";
    
        $result = mysqli_query($con, $query);
        if (!$result) 
        {
            die('Invalid query: ' . mysql_error());
        }
        

        // create db and insert data to transaction

        //get data of item and business
        $item = getProduct($cart['item_id'], $con);

        $business = getBusiness($item['business_id'], $con);

        $transaction = createTransaction($con, $business['business_id']);

        $subtotal = $item['item_price']*$qty;

        $query = "INSERT INTO $transaction VALUES(
            '',
            '$item_id',
            '$qty',
            '$order_placement_id',
            '$subtotal',
            '$procurement'
        )";
    
        $result = mysqli_query($con, $query);
        if (!$result) 
        {
            die('Invalid query: ' . mysql_error());
        }


        //delete cart row
        $cart_table = createCart($con);
        // debug_to_console($cart['cart_id']);
        $x = $cart['cart_id'];

        $query = "DELETE FROM $cart_table WHERE cart_id = $x";
    
        $result = mysqli_query($con, $query);
        if (!$result) 
        {
            die('Invalid query: ' . mysql_error());
        }

    }

    
}




header('location: '.$_SESSION['privilage'].'-order.php');

?>