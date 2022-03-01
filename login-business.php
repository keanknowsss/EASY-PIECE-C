<?php
    $conn = mysqli_connect('localhost','root','','webdev');

    if(mysqli_connect_error())
    {
        echo 'Failed to connect: ' . mysqli_connect_error();
    } else{

       
            $BusEmail = $_POST['businessEmail'];
            $Password = $_POST['password'];

            $query = "SELECT * FROM `registrationbusiness` WHERE BusinessEmail = '$BusEmail' limit 1";

            $result = mysqli_query($conn, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result)>0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['password']=== $password)
                    {
                        header("Location: index.html");
                    }
                }
            }
         
    }

?>