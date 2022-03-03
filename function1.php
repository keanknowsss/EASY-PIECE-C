<?php

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
    }
    //redirect to log in

    header("Location: login.html"); 
    die;
}


function check_business($con)
{
    if(isset($_SESSION['business_id']))
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

    header("Location: login.html"); 
    die;
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


