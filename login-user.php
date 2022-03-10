<?php
session_start();

include('connection.php');
include('function1.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
 
   $Email = $_POST['emailCustomer'];
  
   $Pass = $_POST['password'];
  

   if(!empty($Email) && !empty($Pass))
   {
        //read to database

        $query = "SELECT * FROM `registrationuser` WHERE Email = '$Email' LIMIT 1";

            $result = mysqli_query($con,$query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                    {
                        $user_data = mysqli_fetch_assoc($result);
                        
                        if($user_data['password'] === $password)
                        {
                            $_SESSION['privilage'] = 'customer';
                            $_SESSION['user_id'] = $user_data['user_id'];
                            header("Location: index.php");
                            die;
                        }
                    }
            }
            
            header("Location: login.php");
            echo '<script>alert("Please enter some valid information.");</script>';
            
   }else
   {
       echo '<script>alert("Please enter some valid information.");</script>';
       header("Location: login.php");
        
   }
}

?>