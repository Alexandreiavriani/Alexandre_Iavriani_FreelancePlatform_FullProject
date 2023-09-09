<?php

include '../config.php';
$job_id=$_GET['job_id'];
$result = mysqli_query($conn,"SELECT want_job.user_id,message,title ,SendMessage_user_id,name,surname from want_job inner join user on want_job.SendMessage_user_id=user.user_id 
 inner join add_job on want_job.add_job_id=add_job.add_job_id WHERE want_job.add_job_id='$job_id'  ");


  

// $count3= mysqli_num_rows($result);





while($row = $result->fetch_assoc()){

   $work= $row['title'];
   $name= $row['name'];
   $user_id = $row['SendMessage_user_id'];
   $date=date('y-m-d h:i:s');
  
}

if(isset($_GET['job_id']) && isset($_GET['who_want_job_id']) && isset($_GET['work_user_id'])){
    $job_id=$_GET['job_id'];
    $who_want_job_id=$_GET['who_want_job_id'];
    $work_user_id=$_GET['work_user_id'];
    $want_job=$_GET['id'];
    
    




$insert1=mysqli_query($conn,"INSERT INTO notifications (name,message,create_date,user_id,work_name) VALUES 
    ('ადმინი','სამუშაო არ მიღებულა','$date', '$who_want_job_id','$work')");

 $sql=mysqli_query($conn,"DELETE  FROM  want_job Where want_job_id='$want_job'");

if($insert1 && $sql){
    header('location:../want_work.php');
}
}




?>