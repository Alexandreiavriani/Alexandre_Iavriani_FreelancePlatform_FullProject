<?php

include '../config.php';

date_default_timezone_set('Asia/Tbilisi');
$date=date('y-m-d h:i:s');
if(isset($_GET['id']) && isset($_GET['user_id'])){
    $admin_jobs_id=$_GET['id'];
    
    $user_id=$_GET['user_id'];
    $job=$_GET['job'];

    $insert1=mysqli_query($conn,"INSERT INTO notifications (name,message,create_date,work_name,user_id) VALUES 
    ('ადმინი','თქვენი სამუშაო არ გამოიგზავნა','$date','$job','$user_id')");

    $sql=mysqli_query($conn,"DELETE  FROM  admin_jobs Where admin_jobs_id='$admin_jobs_id'");

if( $sql && $insert1){
    header('location:jobs.php');
}
}

?>