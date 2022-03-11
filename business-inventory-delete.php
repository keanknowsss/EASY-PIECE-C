<?php
    session_start();

    include('connection.php');
    include('function1.php');

    $user_data = check_user($con);

    $item_id = $_POST['modalVal'];

    $sql = "DELETE FROM `additem` WHERE item_id =$item_id";

    if(!mysqli_query($con, $sql))
    {
        echo "Error Updating Table: ".mysqli_error($con);
    }

    header("location: business-inventory.php");
?>
