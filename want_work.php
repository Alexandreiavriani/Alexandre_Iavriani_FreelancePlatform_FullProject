<!DOCTYPE html>
<html lang="en"><?php error_reporting(E_ERROR | E_PARSE);?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>გამოგზავნილი სამუშაო</title>
</head>
<body>
<link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>

  
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/LoginStyle.css">
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
   

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!--top navbar-->


<div class="content">

    <div class="top-navbar">

   
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>


    <?php

include 'config.php';

include 'download.php';

session_start();

$user_id=$_SESSION['id'];

if(!isset($user_id)){
  header('location:login.php');
}



if(isset($_SESSION['id'])===true){
  ?>

<?php 
$select = mysqli_query($conn,"SELECT * FROM `user` WHERE user_id='$user_id' ");



if(mysqli_num_rows($select)> 0){
  $fetch=mysqli_fetch_assoc($select);
}
?>


<?php $user=$_GET['user'];?>

  <?php
  
}else{
  $_SESSION['id'] = null;
 
  ?>












  <a href="register.php"> <button type="button" class="btn btn-primary btn-sm">რეგისტრაცია</button> </a>  
  <a href="login.php">   <button type="button" class="btn btn-primary btn-sm">შესვლა</button></a> 
  <?php }
  
  
  if(isset($_GET['id'])){
    $main_id=$_GET['id'];
    $sql_update=mysqli_query($conn,"UPDATE want_job SET status=1 where want_job_id='$main_id'");
}
  
  
  
  ?> 


  
            </div>


     <!--navbar-->

<nav class="navbar navbar-expand-lg " id="navbar">
  <div class="container-fluid" id="container">
    <a class="navbar-brand" href="#" id="logo">Free<span>Work</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" style="color: aliceblue; font-weight: bold;"  href="index.php?user=<?php echo $fetch['user_id'];?>">მთავარი</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="freelancers.php?user=<?php echo $user_id?>" style="color: aliceblue;">ფრილანსერები</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="create_work.php?user=<?php echo $fetch['user_id'];?>" style="color: aliceblue;">სამუშაოს განთავსება</a>
        </li>
        <li class="nav-item ">
        <a class="nav-link " href="see_works.php?start_price=0&end_price=2500&search=&user=<?php echo $user_id?>"style="color: aliceblue;"  >
            სამუშაოები
          </a>

          
    
          <?php
          
          
          if($_SESSION['id']!=Null){

          
          ?>





<li class="nav-item">




<?php

$sql_get1=mysqli_query($conn,"SELECT * FROM pay_notif WHERE status=0 and  user_id='$user'");

$count1= mysqli_num_rows($sql_get1);


?>




<div style="margin-left:100px; " class="dropdown">
  <a   class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
  <i class="fa fa-file" aria-hidden="true"></i>  <span class="badge badge-primary" id="count"><?php echo $count1; ?></span>

  </a>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  <?php
    
    if(mysqli_num_rows($sql_get1)){
      while($result1=mysqli_fetch_assoc($sql_get1)){
        echo '<a class="dropdown-item text-primary font-weight-bold" href="read_pay_notif.php?id='.$result1['pay_notif_id'].'&user='.$fetch['user_id'].'">'.$result1['message'].'</a>';
        echo '<div class="dropdown-divider"></div>';
      }

    }else{
      echo '<a class="dropdown-item text-danger font-weight-bold" href="read_pay_notif.php?id='.$result1['pay_notif_id'].'&user='.$fetch['user_id'].'">Sorry no Message!</a>';
    }
    
    ?>
  
</div>
</li>




















<li class="nav-item">




<?php

$sql_get=mysqli_query($conn,"SELECT * FROM notifications WHERE status=0 and  user_id='$user'");

$count= mysqli_num_rows($sql_get);


?>




<div style="margin-left:25px; " class="dropdown">
  <a   class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
  <i class="fa fa-bell" aria-hidden="true"></i>  <span class="badge badge-primary" id="count"><?php echo $count; ?></span>

  </a>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  <?php
    
    if(mysqli_num_rows($sql_get)){
      while($result=mysqli_fetch_assoc($sql_get)){
        echo '<a class="dropdown-item text-primary font-weight-bold" href="read_notif.php?id='.$result['notifications_id'].'&user='.$fetch['user_id'].'">'.$result['message'].'</a>';
        echo '<div class="dropdown-divider"></div>';
      }

    }else{
      echo '<a class="dropdown-item text-danger font-weight-bold" href="read_notif.php?id='.$result['notifications_id'].'&user='.$fetch['user_id'].'">Sorry! No New Messages</a>';
    }
    
    ?>
  
</div>
</li>

<li class='nav-item'>

<div class="dropdown">

<?php echo '<img  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style=" float: left;width:45px;height: 40px; border-radius:75px; transform: translate3d(0, 0, 1px); object-fit:cover; margin-left:530px;" src="uploaded_img/'.$fetch['image']. '">'; ?>

<ul style="margin-left:530px;margin-top:50px;" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
<li><a class="dropdown-item" href="home.php?user=<?php echo $user_id?>">კაბინეტი</a></li>
<li><a style="color:red;" class="dropdown-item" href="logout.php"> გასვლა</a></li>



</ul>
</div>

</li>


        <?php 
        }
        ?>
       
      



      </ul>

      
      
    </div>
  </div>

  
</nav>


<!--end navbar-->
<!--table-->


<div id="wantWorkImg" >
  <div class="img_overlay2">
    <h1 style="width:1000px; color:#3B2828; margin-top:-45px;">სამუშაოს მსურველთა ფრილანსერები  <br> <span style="font-size:25px;" class="text"> </span> </h1> 
    

</div>

    </div>  

    <?php













$job_id=$_GET['post'];

$result = mysqli_query($conn,"SELECT want_job.user_id,message,add_job_id,SendMessage_user_id,name,surname,want_job_id,customer_name from want_job inner join user on want_job.SendMessage_user_id=user.user_id  WHERE add_job_id='$job_id' ");


  

// $count3= mysqli_num_rows($result);





while($row = $result->fetch_assoc()){



    


?>


<table class="table" style="width:1255px; margin-left:270px; margin-top:100px; table-layout: fixed;  ">
  <thead>
    <tr>
   
      <th scope="col">სახელი</th>
      <th scope="col">გვარი</th>

   
      <th scope="col">გამოგზავნილი წერილი</th>
      <th scope="col">დათანხმება</th>
      <th scope="col">უარყოფა</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td><?php echo $row['name'];  ?></td>
      <td><?php echo $row['surname'];  ?></td>
      
      
      <!-- <td ><?php
      
      
      // if(isset($_POST['pay']) ){
   
      //   header("Location:google.com");
       
      // echo $download="<a href='download.php?send_job_id=".$row['send_job_id']."'>".$row['file']." </a>";
      // // unset($_GET['send_job']);
      // // unset($_GET['post']);
     
  
      
      // }else{
      
      
     
      //   echo "<p style='color:red;'>გადმოწერისთვის,ჯერ გადაიხადეთ</p>";
      // }
      
    
      ?>
   
  
  </td> -->

   
   
   <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
  


      <td><?php echo $row['message'];  ?></td>




        <?php
       
        
        ?>






      <td><a href="insert_to_single.php?job_id=<?php echo $job_id."&who_want_job_id=".$row['SendMessage_user_id'].
      "&work_user_id=".$row['user_id']."&id=".$row['want_job_id']."&customer_name=".$row['customer_name'].""?>"><button  class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>
</button></a></td>
      <td><a href="deletes/want_work_delete.php?job_id=<?php echo $job_id."&who_want_job_id=".$row['SendMessage_user_id']."&work_user_id=".$row['user_id']."&id=".$row['want_job_id'].""?>"><button  class="btn btn-danger"><i class='fas fa fa-times	'aria-hidden="true"></i>
</button></a></td>


    </tr>


  

   
  </tbody>
 
</table>



<?php

}










?>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    
</body>
</html>


<!--footer-->
<div style="background-color: #304146;margin:0;">
<div  class="footerlinks"><h3 style="color: white;" > </h3>  <br> <a style="color: white;" href=""></a> <br> <a style="color: white;" href=""> </a>

  <br> <a style="color: white;" href=""> </a> <br> <a style="color: white;" href=""> </a>
  <br> <a style="color: white;" href=""> </a>
<div class="contactUs"><h3>Contact Us </h3>  <br> info@freelance.gmail.com <br>  +955111111111
</div>

<div style="margin-top:-115px;" ><h3 style="color: white;" >Quick Links </h3>  <br> <a style="color: white;" href="index.php?user=<?php echo $user_id?>">მთავარი</a> <br> <a style="color: white;" href="freelancers.php?user=<?php echo $user_id?>"> ფრილანსერები</a>

  <br> <a style="color: white;" href="create_work.php?user=<?php echo $user_id  ?>"> სამუშაოს განთავსება</a> <br> <a style="color: white;" href="see_works.php?start_price=0&end_price=2500&search=&user=<?php echo $user_id?>"style="color: aliceblue;" > სამუშაოები</a> <br> <a style="color: white;" href="register.php"> რეგისტრაცია</a>
  <br> <a style="color: white;" href="login.php"> შესვლა</a></div>
   </div>
   </div>
        
  
 </div>
 <div style="background-color: black;color:white;text-align:center; ">2023 Something. All rights reserved.</div>
 

<!--end footer-->