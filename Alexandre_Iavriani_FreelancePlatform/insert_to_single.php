<?php

include 'config.php';
$job_id=$_GET['job_id'];
$result = mysqli_query($conn,"SELECT want_job.user_id,message,title ,SendMessage_user_id,name,surname,user.user_id from want_job inner join user on want_job.SendMessage_user_id=user.user_id 
 inner join add_job on want_job.add_job_id=add_job.add_job_id WHERE want_job.add_job_id='$job_id'  ");


  

// $count3= mysqli_num_rows($result);





while($row = $result->fetch_assoc()){

   $work= $row['title'];
   $name= $row['name'];
   $user_id = $row['SendMessage_user_id'];
   
   date_default_timezone_set('Asia/Tbilisi');
   $date=date('y-m-d h:i:s');
  
}

if(isset($_GET['job_id']) && isset($_GET['who_want_job_id']) && isset($_GET['work_user_id']) && isset($_GET['customer_name']) ){
    $job_id=$_GET['job_id'];
    $who_want_job_id=$_GET['who_want_job_id'];
    $work_user_id=$_GET['work_user_id'];
    $want_job=$_GET['id'];
    $customer_name=$_GET['customer_name'];

    $insert=mysqli_query($conn,"INSERT INTO single (user_id,add_job_id,who_job_want_id) VALUES ($work_user_id,$job_id,$who_want_job_id)");




$insert1=mysqli_query($conn,"INSERT INTO notifications (name,message,create_date,user_id,work_name) VALUES 
    ('$customer_name','სამუშაო მიღებულია','$date', '$who_want_job_id','$work')");

 $sql=mysqli_query($conn,"DELETE  FROM  want_job Where want_job_id='$want_job'");

if($insert && $insert1 && $sql){
    header('location:want_work.php');
}
}




?>