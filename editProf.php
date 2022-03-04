<?php
include('connection.php');
include('function1.php');

$user_data = check_user($con);
$u_id = $user_data['user_id'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    //something was posted
    $FullName = $_POST['fullName'];
    $Email = $_POST['emailCustomer'];
    $PhoneNumber = $_POST['numberCustomer'];
    $BirthDate = $_POST['birthDate'];
    $Sex = $_POST['sex'];
    $Addrss = $_POST['address'];

    
    $query = "UPDATE registrationuser SET 
    FullName = '$FullName', Email = '$Email', PhoneNumber = '$PhoneNumber', BirthDate = '$BirthDate', Sex = '$Sex', Addrss = '$Addrss' WHERE user_id = $u_id";

    mysqli_query($con,$query);
    header("Location: customer.php");
    die;
}

?>