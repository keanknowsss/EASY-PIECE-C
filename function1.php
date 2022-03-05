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


function getItem_data($con)
{

    $sql ="SELECT * FROM `additem`";
    $result=mysqli_query($con,$sql);

    if(mysqli_num_rows($result)>0) {
        return $result;
    }
}
