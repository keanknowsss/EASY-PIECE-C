<?php

include ("connection.php");


if (isset($_POST['name']))
{
    $name = $_POST['name'];
    $cont = $_POST['cont'];

    $sql = "INSERT INTO `test`(`name`, `cont`) VALUES ('$name','$cont')";

    $result = mysqli_query($con, $sql);

    if($result == true)
    {
        echo "Inserted . . .";
    }
}