<?php
session_start();

    include('connection.php');
    include('function1.php');

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        
        $Email = $_POST['businessEmail'];
        
        $BusPass = $_POST['password'];
        
       if(!empty($Email) && !empty($BusPass))
       {
            //read to database

           
            $query = "SELECT * FROM `registrationbusiness` WHERE BusinessEmail = '$Email' LIMIT 1";
            
                $result = mysqli_query($con,$query);

                if($result)
                    {
                        if($result && mysqli_num_rows($result) > 0)
                            {
                                $business_data = mysqli_fetch_assoc($result);
                                
                                if($business_data['Password'] === $BusPass)
                                {
                                    $_SESSION['privilage'] = 'business';
                                    $_SESSION['business_id'] = $business_data['business_id'];
                                    header("Location: index.php");
                                    die;
                                }else
                                    {
                                        header("Location: login.php");
                                    }
                            }
                            // if wala email sa business database
                            else
                            {
                                $query = "SELECT * FROM `admin` WHERE admin_email = '$Email' LIMIT 1";

                                $result=mysqli_query($con,$query);
                                if($result && mysqli_num_rows($result) > 0)
                                {
                                    $admin_data = mysqli_fetch_assoc($result);
                                
                                    if($admin_data['admin_pass'] === $BusPass)
                                    {
                                        header("Location: admin_profile.php");
                                        die;
                                    }else
                                    {
                                        header("Location: login.php");
                                    }
                                }
                            }
                    }
                    else
                    {
                        header("Location: login.php");

                    }


       }else
       {
        echo '<script>alert("Please enter some valid information.");</script>';
        header("Location: login.php");

       }
    }

?>



