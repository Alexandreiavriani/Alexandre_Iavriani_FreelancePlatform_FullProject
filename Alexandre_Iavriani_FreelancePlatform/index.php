
<?php error_reporting(E_ERROR | E_PARSE);?>

<!doctype html>
<html lang="en">
  
  <head>
    <title>FreeWork - Main</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="/node_modules/archyedt-bold/css/archyedt-bold.min.css">

    <link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>

  
    <link rel="stylesheet" href="styles/style.css">
    <!-- <link rel="stylesheet" href="styles/footer.css"> -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
   

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

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


session_start();



$user_id=$_SESSION['id'];


if(isset($_SESSION['id'])===true){?>

<?php 
$select = mysqli_query($conn,"SELECT * FROM `user` WHERE user_id='$user_id' ");

if(mysqli_num_rows($select)> 0){
  $fetch=mysqli_fetch_assoc($select);
}
?>






<?php $user=$_GET['user'];?>







     



  <?php
  
}else{
  
  $_SESSION['id'] = NULL; 
 
 
  ?>












  <a href="register.php"> <button type="button" class="btn btn-primary btn-sm">რეგისტრაცია</button> </a>  
  <a href="login.php">   <button type="button" class="btn btn-primary btn-sm">შესვლა</button></a> 
  <?php }?> 
            </div>

          

<!-- end top navbar-->






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


<!--Top Image-->
<div id="topimage" >
  <div class="img_overlay">
    <h1 >ფრილანსერების პლატფორმა  <br> <span style="font-size:25px; margin-top:50px; width:800px;
    font-family: ArchyEDT-Bold, sans-serif; font-weight:bold;" class="text">თუ გინდათ იყოთ ფრილანსერი, ამ პლატფორმაზე საშუალება გექნებათ იმუშაოთ,ან პირიქით დადოთ თქვენი შეკვეთა</span> </h1> 
      </div>

    </div>  
<!--end Top Image-->





<!--Find Work-->

<div style="font-family: ArchyEDT-Bold, sans-serif; font-weight:bold;"
 class="text_findWork">
 ამ პლატფორმაზე შეგეძლებათ ნახვა ყველა თქვენი სასურველი კატეგორიის სამუშაოები
</div>

<div style="font-family: ArchyEDT-Bold, sans-serif; font-weight:bold;"
 class="text_findWork2">
  მოძებნეთ თქვენი სასურველი შეკვეთა,ბიუჯეტი და დრო რომელსაც გაწყობთ,და შეასრულეთ ის.
  
 </div>


 <a href="see_works.php?start_price=0&end_price=2500&search=&user<?php echo $fetch['user_id'] ?>"><button  id="btn_findWork" type="button" class="btn btn-success">სამუშაოს ნახვა</button> </a>

 <img class="findoworkimg" src="images/findWork.jpg" alt="">



<!--end Find Work-->





<!--About us-->



<div class="AboutUs"> <span style="position: relative; margin-left: 1200px; white-space: pre;font-size:30px; ">FreeWork-ის შესახებ</span> 
<br>
<span style="font-family: ArchyEDT-Bold, sans-serif; font-weight:bold;font-size:20px ;" class="aboutustext">ამ პლატფორმაზე არამხოლოდ,შეკვეთების შესრულებას ან დადებას შეძლებთ,არამედ თუ ხართ ფრილანსერი
  შეგიძლიათ დაამატოთ თავისი თავი ფრილანსერების სიაში,სადაც შეგაფასებენ თქვენს შესრულებულ სამუშაოს.ამისთვის უნდა იყოთ ავტორიზებული.

  </span> 

</div>

<img class="aboutUsimg" src="images/aboutUs.jpg" alt="">

<!--end About us-->



<!--samushaos gantavseba-->

<div class="samushaosGantavseba"> 

 <span style="font-family: ArchyEDT-Bold, sans-serif; font-weight:bold;font-size:20px;" class="samushaosGantavsebatxt"> დადეთ თქვენი შეკვეთა და ფრილანსერი შეასრულებს მას.
  
    </span>

   <a href="create_work.php"> <a href="create_work.php?user=<?php echo $fetch['user_id'];?>"><button  id="btn_addWork" type="button" class="btn btn-success">შეკვეთის განთავსება</button> </a> 



 
  </div>


<!--samushaos gantavseba end-->


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

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>