<?php

require "connection.php";


function check_user($con)
{
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM `registrationuser` WHERE user_id = '$id' LIMIT 1";

        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }else if(isset($_SESSION['business_id'])) 
        {   
            $id = $_SESSION['business_id'];
            $query = "SELECT * FROM `registrationbusiness` WHERE business_id = '$id' LIMIT 1";

            $result = mysqli_query($con,$query);
            if($result && mysqli_num_rows($result) > 0)
            {
                $business_data = mysqli_fetch_assoc($result);
                return $business_data;
            }
        }     

    //redirect to log in

    header("Location: main-page.php"); 
    die;
}


// FOR DEBUGGING PURPOSES
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}


function random_num($length)
{
    $text = "";
    if($length < 5)
    {
        $length = 5;
    }

    $len = rand(4,$length);

    for ($i=0; $i < $len; $i++)
    {
        $text = rand(0,9);
    }

    return $text;

}


// GET ITEM DATA
function getItem_data($con)
{

    $sql ="SELECT * FROM additem";
    $result=mysqli_query($con,$sql);

    return $result;
}


// GET SPECIFIC ITEM DATA
function getProduct($id, $con)
{
    $query = "SELECT * FROM `additem` WHERE item_id = '$id' LIMIT 1";
    
    $result = mysqli_query($con, $query);

    if($result && mysqli_num_rows($result) > 0)
    {
        $item_data = mysqli_fetch_assoc($result);
        return $item_data;
    }
}


// GET BUSINESS DATA
function getBusiness($id, $con)
{
    $query = "SELECT * FROM `registrationbusiness` WHERE business_id = '$id' LIMIT 1";
    
    $result = mysqli_query($con, $query);

    if($result && mysqli_num_rows($result) > 0)
    {
        $getData = mysqli_fetch_assoc($result);
        return $getData;
    }
}


// GET BUSINESS DATA
function getCustomer($id, $con)
{
    $query = "SELECT * FROM `registrationuser` WHERE user_id = '$id' LIMIT 1";
    
    $result = mysqli_query($con, $query);

    if($result && mysqli_num_rows($result) > 0)
    {
        $getData = mysqli_fetch_assoc($result);
        return $getData;
    }
}



function createCart($con)
{
    $query = "";
    switch($_SESSION['privilage'])
    {
        case "customer":
            $tablename = "user_".$_SESSION['user_id']."_cart";
            break;
        case "business":
            $tablename = "business_".$_SESSION['business_id']."_cart";
            break;
    }
    $query = "CREATE TABLE IF NOT EXISTS $tablename
            (cart_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            user_id INT(11) NOT NULL, item_id INT(11) NOT NULL,
            qty INT(11) NOT NULL)";


    if(!mysqli_query($con, $query))
    {
        echo "Error Creating Table: ".mysqli_error($con);
    }

    return $tablename;
}



function getItemDuplicate($id, $item_id, $con)
{
    switch($_SESSION['privilage'])
    {
        case "customer":
            $tablename = "user_".$id."_cart";
            break;
        case "business":
            $tablename = "business_".$id."_cart";
            break;
    }

    $query = "SELECT * FROM `$tablename` WHERE item_id = '$item_id'";

    if(!($result = mysqli_query($con, $query)))
    {
        echo "Error Retrieving Item Data by ID: ".mysqli_error($con);
    }
    else 
    {
        $getData = mysqli_fetch_assoc($result);
        return $getData;
    }
    

}




function getCart($tablename, $con)
{

    $sql = "SELECT * FROM $tablename";
    
    $result = mysqli_query($con, $sql);
    return $result;


}



function itemsinCart($tablename, $cartId, $con)
{
    $sql = "SELECT * FROM $tablename WHERE cart_id = $cartId LIMIT 1";

    if($result = mysqli_query($con, $sql))
    {
        $getData = mysqli_fetch_assoc($result);
        return $getData;
    }
    else
    {
        echo '<script>alert("Error: "'.mysql_error().'</script>';
    }
    
}


function createOrder($con)
{
    $query = "";
    switch($_SESSION['privilage'])
    {
        case "customer":
            $tablename = "user_".$_SESSION['user_id']."_order";
            break;
        case "business":
            $tablename = "business_".$_SESSION['business_id']."_order";
            break;
    }
    $query = "CREATE TABLE IF NOT EXISTS $tablename
            (order_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            item_id INT(11) NOT NULL, qty INT(11) NOT NULL, 
            order_placement_id INT(11) NOT NULL, total FLOAT NOT NULL, procurement VARCHAR(100) NOT NULL, shipping_fee FLOAT NOT NULL)";


    if(!mysqli_query($con, $query))
    {
        echo "Error Creating Table: ".mysqli_error($con);
    }

    return $tablename;
}



function createTransaction($con, $id)
{
    $query = "";
    $tablename = "business_".$id."_transaction";

    $query = "CREATE TABLE IF NOT EXISTS $tablename
            (transaction_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            item_id INT(11) NOT NULL, qty INT(11) NOT NULL, 
            order_placement_id INT(11) NOT NULL, subtotal FLOAT NOT NULL, procurement VARCHAR(100) NOT NULL,
            customer_privilege VARCHAR(100) NOT NULL, customer_id INT(11) NOT NULL, shipping_fee FLOAT NOT NULL)";


    if(!mysqli_query($con, $query))
    {
        echo "Error Creating Table: ".mysqli_error($con);
    }

    return $tablename;
}


