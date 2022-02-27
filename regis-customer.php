<?php
    $conn = mysqli_connect('localhost','root','','webdev');

    if(mysqli_connect_error())
    {
        echo 'Failed to connect: ' . mysqli_connect_error();
    } else{
        
        
       $FullName = $_POST['fullName'];
       $Email = $_POST['emailCustomer'];
       $PhoneNumber = $_POST['numberCustomer'];
       $Pass = $_POST['password'];
       $BirthDate = $_POST['birthDate'];
       $Sex = $_POST['sex'];
       $Addrss = $_POST['address'];

       $query = "INSERT INTO registrationuser VALUES(
           '$FullName',
           '$Email',
           '$PhoneNumber',
           '$Pass',
           '$BirthDate',
           '$Sex',
           '$Addrss',
           '')";
       


       
       mysqli_query($conn,$query);
       header("Location: login.html");
    }
    mysqli_close($conn);

?>