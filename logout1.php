<?php 

session_start();

if(isset($_SESSION['business_id']))
{
    unset($_SESSION['business_id']);
    unset($_SESSION['privilage']);
}

header("Location: index.php");

?>