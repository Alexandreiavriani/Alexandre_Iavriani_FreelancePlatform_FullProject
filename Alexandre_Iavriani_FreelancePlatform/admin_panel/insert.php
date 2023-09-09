<?php

include '../config.php';



$result = mysqli_query($conn,"SELECT * from admin_jobs inner join user on admin_jobs.user_id=user.user_id
inner join add_job on admin_jobs.add_job_id=add_job.add_job_id ");







date_default_timezone_set('Asia/Tbilisi');

$date=date('y-m-d h:i:s');


if(isset($_GET['job_id']) && isset($_GET['user_id']) && isset($_GET['file']) && isset($_GET['customer_id']) && isset($_GET['customer_name'])){
    $job_id=$_GET['job_id'];
    $user_id=$_GET['user_id'];
    $filename=$_GET['file'];
    $admin_jobs_id=$_GET['admin_jobs_id'];
    $job=$_GET['job'];
    $customer_id=$_GET['customer_id'];
    $customer_name=$_GET['customer_name'];
    
    $insert=mysqli_query($conn,"INSERT INTO send_job (file,user_id,add_job_id,customer_name) VALUES ('$filename',$user_id,$job_id,'$customer_name')");




    $insert1=mysqli_query($conn,"INSERT INTO notifications (name,message,create_date,work_name,user_id) VALUES 
    ('ადმინი','თქვენი სამუშაო გამოგზავნილია','$date','$job','$user_id')");

    $insert2=mysqli_query($conn,"INSERT INTO notifications (name,message,create_date,work_name,user_id) VALUES 
    ('ადმინი','ნახეთ გამოგზავნილი სამუშაო','$date','$job','$customer_id')");

    $sql=mysqli_query($conn,"DELETE  FROM  admin_jobs Where admin_jobs_id='$admin_jobs_id'");

if($insert && $insert1 && $sql){
    header('location:jobs.php');
}
}



?>