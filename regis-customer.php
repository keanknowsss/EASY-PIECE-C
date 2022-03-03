<?php
session_start();

    include('connection.php');
    include('function1.php');

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
       $FullName = $_POST['fullName'];
       $Email = $_POST['emailCustomer'];
       $PhoneNumber = $_POST['numberCustomer'];
       $Pass = $_POST['password'];
       $BirthDate = $_POST['birthDate'];
       $Sex = $_POST['sex'];
       $Addrss = $_POST['address'];

       if(!empty($FullName) && !empty($Email) && !empty($PhoneNumber) && !empty($Pass) && !empty($BirthDate) && !empty($Sex) && !empty($Addrss))
       {
            //save to database

            $user_id = random_num(20);
            $query = "INSERT INTO registrationuser VALUES(
                '$FullName',
                '$Email',
                '$PhoneNumber',
                '$Pass',
                '$BirthDate',
                '$Sex',
                '$Addrss',
                '')";

                mysqli_query($con,$query);
                header("Location: login.html");
                die;
       }else
       {
           echo "Please enter some valid information.";
       }
    }

?>


       
       


       
      