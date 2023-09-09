
<?php

include '../config.php';
session_start();
$admin_id=$_SESSION['admin'];



if(!isset($admin_id)){
  header('location: admin_login.php');
}



?>



<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Admin Panel</title>
    
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>Admin Panel</h1>
        </div>
     
        <ul>
           
            <li><a href="jobs.php">სამუშაობები</a></li>
            <li><a href="freelancers_admin.php">ფრილანსერები</a></li>
       
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                <h2>სამუშაოს შემოწმება</h2>
                </div>
                <div class="user">
                    <a href="logout.php" class="btn">logout</a>
                   
                   
                        
                </div>   
            </div> 
        </div>

        
        
    <?php
    
    $result = mysqli_query($conn,"SELECT * from admin_jobs inner join user on admin_jobs.user_id=user.user_id");



  






while($row = $result->fetch_assoc()){
    
   
    
    ?>

        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1><?php echo $row['name'] ?></h1>
                        <h1><h1><?php echo $row['surname'] ?></h1></h>
                        <p>სამუშაო:<?php echo $row['job_title'] ?></p></h>
            
                        <br>
                        <?php
      
      echo "<a href='download.php?admin_jobs_id=".$row['admin_jobs_id']."'>".$row['file']." </a>";
      
      
       ?>
                    </div>
                    <div class="icon-case">
                        <img src="students.png" alt="">
                    </div>
                </div>
               

              <div style="margin-left:450px;position:absolute;">
      <a href="insert.php?job_id=<?php echo $row['add_job_id'].'&user_id='.$row['user_id'].'&file='.$row['file'].'&admin_jobs_id='.$row['admin_jobs_id'].'&job='.$row['job_title'].'&customer_id='.$row['customer_id'].'&customer_name='.$row['customer_name'] ?>"> <button name="btn1"  class='btn1'  > <p>დადასტურება</p></button> </a> 
      
  

            <a href="delete.php?id=<?php echo $row['admin_jobs_id'].'&user_id='.$row['user_id'].'&job='.$row['job_title']?>">  <button style="margin-top:25px;" class='btn2'  name='btn2'> 
              <p> არ მიღება</p></button></a>

              </div>

                </div>
               
               


<?php



$filename=$row['file'];

$user_id=$row['user_id'];

$job_id=$row['add_job_id'];
$admin_jobs_id=$row['admin_jobs_id'];



$date=date('y-m-d h:i:s');



}




// if(isset($_POST['btn2'])){

 

//     mysqli_query($conn,"INSERT INTO notifications (name,message,create_date,user_id) VALUES ('ადმინი','თქვენი სამუშაო არ გამოიგზავნა','$date','$user_id')");
//       $sql="DELETE  FROM  admin_jobs Where admin_jobs_id='$admin_jobs_id'";
      
//       if(mysqli_query($conn,$sql)){
//         ob_start();
       
//         header("location: jobs.php",  true,  301 );  exit;
        
//         ob_end_flush();
       
//       }
//       else{
//         echo "error deleting";
//       }
//       mysqli_close($conn);
    
    
    
    
    
    
//     }
    






// if(isset($_POST['btn1'])){



    
//     mysqli_query($conn,"INSERT INTO send_job (file,user_id,add_job_id) VALUES ('$filename',$user_id,$job_id)");
//     mysqli_query($conn,"INSERT INTO notifications (name,message,create_date,user_id) VALUES 
//     ('ადმინი','თქვენი სამუშაო გამოგზავნილია','$date','$user_id')");
    

    

   
    
    
    
  
   
  
    
    
    
     
    

// }


?>


     
  
           
                 
                </div>
            </div>
        </div>
    </div>
</body>

</html>