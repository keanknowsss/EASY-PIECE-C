<?php
    $conn = mysqli_connect('localhost','root','','webdev');

    if(mysqli_connect_error())
    {
        echo 'Failed to connect: ' . mysqli_connect_error();
    } else{
        
       $query = "INSERT INTO registrationuser VALUES(
           '$_POST[fullName]',
           '$_POST[emailCustomer]', 
            '$_POST[numberCustomer]',
            '$_POST[password]',
            '$_POST[birthDate]',
            '$_POST[sex]', 
            '$_POST[address]','')";
       


       
       if(mysqli_query($conn,$query))
       {
           echo 'record updated';
       }else{
           echo 'Error';
       }

    }
    mysqli_close($conn);
?>