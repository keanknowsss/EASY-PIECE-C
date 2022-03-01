<?php
    $conn = mysqli_connect('localhost','root','','webdev');

    if(mysqli_connect_error())
    {
        echo 'Failed to connect: ' . mysqli_connect_error();
    } else{
        
        
       $BusName = $_POST['businessName'];
       $BusContact = $_POST['businessContact'];
       $Email = $_POST['Email'];
       $BusAddress = $_POST['businessAddress'];
       $BusPass = $_POST['password'];
       $BusOwnerName = $_POST['ownerName'];
       $BusOwnerCont = $_POST['ownerContact'];

       $query = "INSERT INTO registrationbusiness VALUES(
           '$BusName',
           '$BusContact',
           '$Email',
           '$BusAddress',
           '$BusPass',
           '$BusOwnerName',
           '$BusOwnerCont',
           '')";
       


       
       mysqli_query($conn,$query);
       header("Location: login.html");
    }
    mysqli_close($conn);

?>