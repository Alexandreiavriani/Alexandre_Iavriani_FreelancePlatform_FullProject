<?php


include '../config.php';

session_start();
// session_destroy();

// $_SESSION = NULL; 


// header("Location: index.php");

if(isset($_SESSION['admin']))
{
   unset($_SESSION['admin']);
}
header("Location: index.php");


?>