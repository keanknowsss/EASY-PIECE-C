<?php
session_start();

    include('connection.php');
    include('function2.php');

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
                                    header("Location: index1.php");
                                    die;
                                }
                            }
                    }
       }else
       {
           echo "Please enter some valid information.";
       }
    }

?>



