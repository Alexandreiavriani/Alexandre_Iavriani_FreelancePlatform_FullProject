<?php

$conn=mysqli_connect('localhost','root','','freelance') or die('connection failed');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn -> set_charset("utf8");


?>