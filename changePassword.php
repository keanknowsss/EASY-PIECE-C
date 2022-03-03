<?php

include('connection.php');
include('function1.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
 
   
  
   $Pass = $_POST['password'];
  

   if(!empty($Pass))
   {
        //read to database

        $query = "UPDATE `registrationuser` SET Pass ='$Pass' WHERE user_id = '$id'";
        mysqli_query($con,$query);
        header("Location: customer.php");
        die;
            

            
   }
}
?>