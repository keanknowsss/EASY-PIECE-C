<?php
session_start();

include('function1.php');
include('connection.php');

debug_to_console($_POST['selectedValues']);