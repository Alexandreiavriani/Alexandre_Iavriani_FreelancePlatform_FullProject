<?php error_reporting(E_ERROR | E_PARSE);?>
<?php

include 'config.php';
session_start();
$user_id=$_SESSION['id'];



if(!isset($user_id)){
  header('location:login.php');
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
   

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>

    
  
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/HomeStyle.css">
   
</head>
<body>
    <!--top navbar-->


<div class="content">
  
<?php


$select = mysqli_query($conn,"SELECT * FROM `user` WHERE user_id='$user_id' ");

if(mysqli_num_rows($select)> 0){
  $fetch=mysqli_fetch_assoc($select);
}




?><?php $user=$_GET['user'];?>


    <div class="top-navbar">


            </div>




<!-- end top navbar-->






<!--navbar-->

<nav  class="navbar navbar-expand-lg " id="navbar">
  <div class="container-fluid" id="container">
    <a class="navbar-brand" href="#" id="logo">Free<span>Work</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" style="color: aliceblue; font-weight: bold;" href="index.php?user=<?php echo $fetch['user_id'];?>"  href="index.php">მთავარი</a>
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
<li><a class="dropdown-item" href="home.php?user=<?php echo $user_id;  ?>">კაბინეტი</a></li>
<li><a style="color:red;" class="dropdown-item" href="logout.php"> გასვლა</a></li>



</ul>
</div>

</li>


     
      



      </ul>

      
      
    </div>
  </div>

  
</nav>


<!--end navbar-->



<div class="container">
 


  <div class="box2">

  <?php




?>


<p>Full Name <b style="margin-left: 70px;"> 
     <?php echo $fetch['name']   ?>
     <?php echo "\n"   ?>
     <?php echo $fetch['surname']   ?>
    </b>   </p><hr>
    <p>Email<b style="margin-left: 110px;"><?php echo $fetch['email']?></b> </p> 
    <hr>
    <p>City<b style="margin-left: 122px;"><?php echo $fetch['city']?></b> </p> 
    <hr>
    <p>Phone<b style="margin-left: 105px;"><?php echo $fetch['phone']?></b> </p> 
  
  
  </div>





  
  
</div>




</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>