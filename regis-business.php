<?php
session_start();

    include('connection.php');
    include('function2.php');

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $BusName = $_POST['businessName'];
        $BusContact = $_POST['businessContact'];
        $Email = $_POST['businessEmail'];
        $BusAddress = $_POST['businessAddress'];
        $BusPass = $_POST['password'];
        $BusOwnerName = $_POST['ownerName'];
        $BusOwnerCont = $_POST['contactOwner'];

       if(!empty($BusName) && !empty($BusContact) && !empty($Email) && !empty($BusAddress) && !empty($BusPass) && !empty($BusOwnerName) && !empty($BusOwnerCont))
       {
            //save to database

           
            $query = "INSERT INTO registrationbusiness VALUES(
                '$BusName',
                '$BusContact',
                '$Email',
                '$BusAddress',
                '$BusPass',
                '$BusOwnerName',
                '$BusOwnerCont',
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



