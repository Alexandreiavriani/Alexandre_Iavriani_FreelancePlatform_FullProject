
<?php error_reporting(E_ERROR | E_PARSE);?>
<!doctype html>
<html lang="en">
  
  <head>
    <title>FreeWork - Main</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/WorksStyle.css">

    <link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
   


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
   

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

<!--top navbar-->

<div class="content">

    <div class="top-navbar">


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
  $_SESSION['id'] = null;
 
  ?>












  <a href="register.php"> <button type="button" class="btn btn-primary btn-sm">რეგისტრაცია</button> </a>  
  <a href="login.php">   <button type="button" class="btn btn-primary btn-sm">შესვლა</button></a> 
  <?php }?> 
            </div>


      

        <?php

// $select2 = mysqli_query($conn,"SELECT user_id FROM user where user_id=7  ");

// if(mysqli_num_rows($select2)> 0){
//   $fetch2=mysqli_fetch_assoc($select2);
// }
// print_r($fetch2); 


?>

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
        <a  class="nav-link " href="see_works.php?start_price=0&end_price=2500&search=&user=<?php echo $user_id?>"style="color: aliceblue;"  >
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

<h1 style=" font-family: ArchyEDT-Bold, sans-serif; font-weight:bold; text-align:center; margin-top:25px;">სამუშაოები</h1>


        
<div  class="box3">
  <form action="" method="get">

<p> აირჩიეთ კატეგორია</p>

<button class="btn btn-primary" type="submit">Search</button>

<?php

$cat_query="SELECT * FROM categories";
$cat_query_run=mysqli_query($conn,$cat_query);



if(mysqli_num_rows($cat_query_run)>0){
  foreach($cat_query_run as $catlist){

    $checked = [];
    if(isset($_GET['categories'])){
      $checked=$_GET['categories'];
    }
    ?>
    <div >
      <input  type="checkbox" name="categories[]" value="<?=$catlist['categories_id']; ?>">
      <?php if(in_array($catlist['categories_id'],$checked)){echo 'არჩეული:';}?>
      <?=$catlist['category_name'];?>
    </div>


 


<?php
  }
}
else{
  echo "no category found";
}
?>



<hr>
   <label for="">Start Price</label>
   <input type="text" name="start_price" value="<?php if(isset($_GET['start_price'])){echo $_GET['start_price'];}else{echo "0";} ?>" class="form-control">

   <label for="">End Price</label>
   <input type="text" name="end_price" value="<?php if(isset($_GET['end_price'])){echo $_GET['end_price'];}else{echo "2500";} ?>" class="form-control">


   <hr>
  
  <input name="search" type="search" id="form1" class="form-control" placeholder="example:python" value="<?php if(isset($_GET['search']))
  {echo $_GET['search'];}?>" />
  <label class="form-label" for="form1">Search</label>
  </div>

 
 

   </form>



   <?php
// $price_query="SELECT * FROM add_job";
// $price_query_run=mysqli_query($conn,$price_query);

// if(mysqli_num_rows($price_query_run)>0){

//   foreach($price_query_run as $items){
//       echo $items['']
//   }
  
// }else{
//   echo "not found";
// }



?>




<?php

if(isset($_GET['categories']) && isset($_GET['start_price']) && isset($_GET['end_price']) && isset($_GET['search'])){
  $catchecked = [];
  $catchecked=$_GET['categories'];

  $startprice = $_GET['start_price'];
  $endprice = $_GET['end_price'];

  $searchValues=$_GET['search'];

  foreach($catchecked as $rowcat){
    $result = mysqli_query($conn,"SELECT * FROM add_job  inner join categories on add_job.categories_id=categories.categories_id and   categories.categories_id IN ($rowcat) 
    and  add_job.price BETWEEN $startprice and $endprice inner join user on add_job.user_id=user.user_id where CONCAT(title,text,name,surname) like '%$searchValues%' 
   ");

    while($row = $result->fetch_assoc()){
      $userplaninfo = substr($row['text'],0, 110);   
    ?>
    
    
      
           




    <div class="container">
    
            <div class="box" >
            
       <?php echo "<p><a style='font-family: ArchyEDT-Bold, sans-serif; font-weight:bold;' href='single.php?post=".$row['add_job_id']."&user_id=".$row['user_id']."   '>" .$row['title']." </a> </p>"?>
               <p ><?php echo $userplaninfo."..."; ?></p>
                <div class="info ">
                    <p><?php echo $row['public_date'];?></p>
                    <p ><?php echo $row['name'];  ?>
    <?php echo "\n"   ?>
    <?php echo $row['surname'];  ?></p>
                    <p ><?php echo $row['category_name'];?></p>
                    
                    </div>
            </div>
    
            <div  class="box2">
      <p><?php echo  "დედლაინი:".$row['time']."დღე";?></p>
      <p><?php echo  "გადახდა:".$row['price']."ლარი";?></p>
      <?php if($row['work_status']==="თავისუფალი"){?>
<p class="status_green"> სტატუსი: <?php echo $row['work_status']?></p>

<?php }
   if($row['work_status']==="დაკავებული"){?>
    <p class="status_yellow"> სტატუსი: <?php echo $row['work_status']?></p>
  <?php
}
?>

    
      
      </div>
      
      </div>

      
      
        
        <?php
      
      }
  }

}

else{

  if(isset($_GET['start_price']) && isset($_GET['end_price']) && isset($_GET['search']) ){
  $startprice = $_GET['start_price'];
  $endprice = $_GET['end_price'];

  $searchValues=$_GET['search'];

$result = mysqli_query($conn,"SELECT * FROM add_job inner join categories on add_job.categories_id=categories.categories_id  
 and add_job.price BETWEEN $startprice and $endprice inner join user on add_job.user_id=user.user_id where CONCAT(title,text,name,surname) like '%$searchValues%' ORDER BY public_date DESC");

while($row = $result->fetch_assoc()){
$userplaninfo = mb_substr($row['text'],0, 45,'UTF-8');  
?>


 



<div class="container">


        <div class="box" >
       
        <?php echo "<p><a style='font-family: ArchyEDT-Bold, sans-serif; font-weight:bold;' href='single.php?post=".$row['add_job_id']."&user_id=".$row['user_id']."&user=".$fetch['user_id']."'>" .$row['title']." </a> </p>"?>
           <p style="font-family: ArchyEDT-Bold, sans-serif;" ><?php echo $userplaninfo."..."; ?></p>
            <div style="font-family: ArchyEDT-Bold, sans-serif; "  class="info ">
                <p><?php echo $row['public_date'];?></p>
                <p  ><?php echo $row['name'].' '.$row['surname'];  ?>


                <p ><?php echo $row['category_name'];?></p>
                
                </div>
        </div>

        <div style="font-family: ArchyEDT-Bold, sans-serif; "  class="box2">
  <p><?php echo  "დედლაინი:".$row['time']."დღე";?></p>
  <p><?php echo  "გადახდა:".$row['price']."ლარი";?></p>

  <?php if($row['work_status']==="თავისუფალი"){?>
<p  class="status_green"> სტატუსი: <?php echo $row['work_status']?></p>

<?php }
   if($row['work_status']==="დაკავებული"){?>
    <p  class="status_yellow"> სტატუსი: <?php echo $row['work_status']?></p>
  <?php
}
?>











  
  </div>

  
  
  </div>
  
    
    <?php
  
  }}}?>


</div>



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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




