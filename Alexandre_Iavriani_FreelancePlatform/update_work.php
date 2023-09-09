<?php

include 'config.php';

$job_id=$_GET['id'];


      $title1=$_GET['title'];
      $description1=$_GET['description'];
      $price1=$_GET['price'];
      $time1=$_GET['time'];

    



mysqli_query($conn,"UPDATE add_job set title='$title1', text='$description1', price='$price1',time='$time1' WHERE add_job_id='$job_id'");

$res  = mysqli_query($conn,"SELECT * FROM add_job inner join user on add_job.user_id=user.user_id where add_job_id = $job_id");
      while($row2 = $res->fetch_assoc()){

        $user=$row2['user_id'];
      }

header('location:single.php?post='.$job_id.'&user_id='.$user.'   ')





?>