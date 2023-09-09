

<?php error_reporting(E_ERROR | E_PARSE);?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>

   

    <link rel="stylesheet" href="/node_modules/archyedt-bold/css/archyedt-bold.min.css">

    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/freelancer.css">
    <link rel="stylesheet" href="styles/single.css">
    <link rel="stylesheet" href="styles/footer.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
   

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>






</script>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>




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
  

<div id="reviewImg" >
  <div class="img_overlay2">
    <h1 style="font-family: ArchyEDT-Bold, sans-serif; font-weight:bold;">თუ გსურთ,რომ თქვენმა კლიენტებმა შეგაფასონ, <br> <span class="text">შეავსეთ თქვენი მონაცემები და გამოაქვეყნეთ.</span>

    <?php
    if(isset($_SESSION['id'])===false){
     echo '<span style="font-size:25px;"> ამისთვის უნდა იყოთ შესული პლატფორმაზე!</span>' ; 
    }else{
      
    

    
      ?>
    
  <span><button  data-toggle="modal" name='free'data-target="#exampleModal5"  class="btn btn-info"  data-backdrop="false">მე ვარ ფრილანსერი
  </button></span></h1> 

<?php
    
    }
?>
      </div>
    </div> 



    

    <div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">მე მინდა ვიყო ფრილანსერი</h5>
      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <?php
    
      
     





   

 
    

if(isset($_POST['go_to_freelancer']) ){
   
  $about_me=$_POST['about_me'];
  $profession=$_POST['profession'];
      $insert=mysqli_query($conn,"INSERT INTO show_freelancers_admin (user_id,about_me,profession) 
      VALUES ($user_id,'$about_me','$profession')");

      
     
   

 }






    



      
      ?>

<?php

?>

    <form action="" method='post'>
    <label style="font-weight:bold;" for="">თქვენი პროფესია</label>
    <br>
      <input type="text" name='profession'>

      <label style="font-weight:bold;" for="">მოკლე ტექსტი თქვენს შესახებ.</label>
      <textarea name="about_me" style="width:100%; height:100px;" id="message" cols="30" rows="10"></textarea>
      <input type="submit" onclick="myFunction()" name="go_to_freelancer" class="btn btn-primary" value="Save changes"> 
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>
      </div>
      <div class="modal-footer">
      
      
      </div>
    </div>
  </div>
</div>





<?php

$result = mysqli_query($conn,"SELECT * from freelancers inner join user on freelancers.user_id=user.user_id ");





  
  

  
?>



<div class="wrapper">
        <div class="container">
        
        <div      class="row">
          
        <?php
          while($row = $result->fetch_assoc()){
            $aboutMe = mb_substr($row['about_me'],0, 40, "UTF-8");  
            
          ?>
            <div  class="col-md-6 col-lg-4" >
                <div style="margin-top:75px;" class="card mx-30">
                <!--  -->
                <?php echo '<img style="object-fit: cover; width:150px;height:150px; transform: translate3d(0, 0, 1px); margin-left:100px;border-radius:75%;"  class="card-img-top"  src="uploaded_img/'.$row['image']. '">'; ?>
                  <div class="card-body">
                    <h5 class="card-title">
<?php echo $row['name'].' '.$row['surname'] ?></h5>
<h6>
<?php echo $row['profession'] ?></h6>
<p  class="card-text">
 <?php echo $aboutMe."...";   ?></p>
 
<a href="reviews_without_review.php?freelancer_name=<?php echo $row['name']
.'&freelancer_surname='.$row['surname'].'&user='.$freelancer_id.'&id='.$row['user_id']  
?>"><button  class="btn btn-success">review-ების ნახვა</button></a>
</div>


<script>
function myFunction() {
  alert("თქვენი მონაცემები შეამოწმებს ადმინისტრატორი!");
}
</script>

</div>

</div>


<?php }
?>

</div>

</div>
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









<!-- <form action='upload.php' enctype='multipart/form-data' method='post'>
<input type='file' name='zipFile' accept='zip/*'>
<input type='submit' name='Submit' value='Submit'>
</form> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>