<?php 

session_start();

if(isset($_SESSION['user_id']))
{
    unset($_SESSION['user_id']);
    unset($_SESSION['privilage']);
}

header("Location: index.php");

?>