



<?php error_reporting(E_ERROR | E_PARSE);?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Page</title>

    <link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>


    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/WorksStyle.css">
    <link rel="stylesheet" href="styles/single.css">
 


  
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

if(isset($_POST['submit']) && !isset($user_id)){
  header('location:login.php');
}



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


            <!--navbar-->

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

  
   <?php 
    $user=$_GET['user_id'];
    $job_id=$_GET['post'];

   


   






   $row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `add_job` WHERE add_job_id=$job_id"));

   
   
   ?>

<div class='main'>

<p><?php echo $row['title'];?></p>
<?php
if($_SESSION['id']===$user){

?>
<button data-toggle="modal" data-target="#exampleModaledit" style="margin-top:50px;"  
 class="btn btn-success"  data-backdrop="false">სამუშაოს რედაქტირება</button>




<div class="modal fade" id="exampleModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">რედაქტირება</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     

<?php
      $res  = mysqli_query($conn,"SELECT * FROM add_job inner join user on add_job.user_id=user.user_id where add_job_id = $job_id");
      while($row2 = $res->fetch_assoc()){


    ?>

<form action="update_work.php" id="edit-form">
		        		<input class="form-control" type="hidden" name='id' value="<?php echo $job_id?>">
				    	<div class="form-group">
						    <label for="">სამუშაოს სახელწოდება</label>
						    <input class="form-control" type="text" name="title" value="<?php echo $row['title']?>">
					  	</div>
					  	<div class="form-group">
						    <label for="">შინაარსი</label>
                <textarea class="form-control" type="text" name="description"  rows="3"><?php echo $row['text']?></textarea>
						   
					  	</div>
					  	<div class="form-group">
						    <label for="">ბიუჯეტი(ლარი)</label>
						    <input class="form-control" type="text" name="price" value="<?php echo $row['price']?>">
					  	</div>
					  	<div class="form-group">
						    <label for="">დედლაინი(დღე)</label>
                <input class="form-control" type="text" name="time" value="<?php echo $row['time']?>">
					  	</div>
              <button class="btn btn-success" type="submit" name="submit">Update</button>
					  
					  	<button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
					</form>
  <?php
      }

//       $title1=$_POST['title'];
//       $description1=$_POST['description'];
//       $price1=$_POST['price'];
//       $time1=$_POST['time'];
// echo $title1;

//       if(isset($_POST['edit1'])){
//         mysqli_query($conn,"UPDATE add_job set title='$title1', text='$description1'
// price='$price1',time='$time1' WHERE add_job_id='$job_id'");
//       }
?>

      </div>
    

      

    </div>
  </div>
</div>

<?php

 }
?>

<hr>

<table >
   <tbody><tr >

   <td class="image">
    <?php
   $sqlimage  = ("SELECT * FROM add_job inner join user on add_job.user_id=user.user_id where add_job_id = $job_id");
    $imageresult1 = mysqli_query($conn,$sqlimage);

    $rows=mysqli_fetch_assoc($imageresult1);
    
      $image = $rows['image'];
        
        echo '<img style="transform: translate3d(0, 0, 1px); object-fit:cover;" src="uploaded_img/'.$rows['image'].' ">';
        
    
            
              ?>
      </td>

      <td class='user_info'>
        <div><i class="fas fa-user-alt"></i><?php echo $rows['name']?>
        
        <?php echo $rows['surname']?></div>
        <div><i class="fa fa-phone" aria-hidden="true"></i><?php echo $rows['phone']?></div>
        <div><i class="fa fa-envelope" aria-hidden="true"></i>
<?php echo $rows['email']?></div>
      </td>

      <td class='job_info'>

      <div>ბიუჯეტი:<?php echo $rows['price']?> ლარი</div>
        <div>დედლაინი:<?php echo $rows['time']?> დღე</div>
        
      </td>



    </tr>
    
      
</tbody></table>


<div class="full_text">
<div><?php echo $rows['text']?></div>
</div>











<?php

if($_SESSION['id']===$user){



?>







<table style="padding:100px; margin-top:50px;">

<tr>

<td>
<button  data-toggle="modal" data-target="#exampleModal" data-backdrop="false" name='status' class="btn btn-warning" >სტატუსის მინიჭება</button>
</td>

<td >


</td>






























<td>
<a href="sendWork.php?post=<?php echo $rows['add_job_id']."&user=".$fetch['user_id']?>"><button type="button"  style="margin-left:190px;"   class="btn btn-dark" >გამოგზავნილი სამუშაო</button></a>

</td>

<td>
<a href="want_work.php?post=<?php echo $rows['add_job_id']."&user=".$fetch['user_id']."&name=".$rows['name']?>">
<button type="button"    class="btn btn-dark" >სამუშაოს შესრულების მსურველები</button></a>
</td>


</tr>



</table>


<form  action="" method="post">
<button style="margin-top:50px; " name='delete' class="btn btn-danger" >სამუშაოს წაშლა</button>
</form>

<?php

}
else{


  if( !isset($user_id)){
    echo "<p style='font-family: ArchyEDT-Bold, sans-serif; font-weight:bold; margin-top:100px;'>*თუ გსურთ სამუშაოს აღება და შესრულება,გაიარეთ რეგისტრაცია ან შედით პლატფორმაზე.</p>";
  }else{
  
  ?>
  
  
  
  <button  name='ageba_btn' data-toggle="modal"  data-backdrop="false" data-target="#exampleModal_ageba"  style="margin-top:50px;"   
  class="btn btn-dark" >სამუშაოს აღება</button>


  <?php

 }

  



$user=$_GET['user_id'];
$job_id=$_GET['post'];
$who_want_job_id=$_GET['user'];

$select2=mysqli_query($conn,"SELECT * FROM single WHERE user_id='$user' and add_job_id='$job_id' and who_job_want_id='$who_want_job_id'");


while($row = $select2->fetch_assoc()){
?>

 <button data-toggle="modal" data-target="#exampleModal1" style="margin-top:50px;" data-backdrop="false"   class="btn btn-dark" >მონაცემების გაგზავნა</button> 

<?php

}
?>
 
  <!-- <button data-toggle="modal" data-target="#exampleModal1" style="margin-top:50px;"   class="btn btn-dark" >მონაცემების გაგზავნა</button> -->


<?php





?>
   
<?php
 }
  
 $user=$_GET['user_id'];
 $job_id=$_GET['post'];

 $notif_user=$fetch['name'];






$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `add_job` WHERE add_job_id=$job_id"));

$work_name=$row['title'];

$work_user=$row['user_id'];


$custumer_name=$rows['name']
?>









<div class="modal fade" id="exampleModal_ageba" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">პასუხის გამოგზავნა დამკვეთს</h5>
      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <?php
     
      if(isset($_POST['ageba'])){

        date_default_timezone_set('Asia/Tbilisi');
      $message=$_POST['message'];
      $date=date('y-m-d h:i:s');
      
     
      

      $insert_ageba=mysqli_query($conn,"INSERT INTO want_job (user_id,add_job_id,message,SendMessage_user_id,customer_name) 
      VALUES ($user,$job_id,'$message',$user_id,'$custumer_name')");
     
     $notif=mysqli_query($conn,"INSERT INTO notifications (name,message,work_name,user_id,create_date) 
     VALUES ('$notif_user','უნდა სამუშაოს აღება','$work_name',$user, '$date')");



      }
      
      ?>

    <form action="" method='post'>
      <textarea name="message" style="width:100%; height:100px;" id="message" cols="30" rows="10"></textarea>
      <input onclick="myFunction()" type="submit" name="ageba" class="btn btn-primary" value="Save changes"> 
      <button   type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </form>
      </div>
      <div class="modal-footer">
      
      
      </div>
    </div>
  </div>
</div>


<script>
function myFunction() {
  alert("თქვენი მოთხოვნა გამოიგზავნალია.");
}
</script>


  
  
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">აირჩიეთ სტატუსი</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <?php if(isset($_POST['send'])){
          $work_status=$_POST['work_status'];
          
          mysqli_query($conn, "UPDATE add_job SET work_status='$work_status' Where add_job_id=$job_id");
          echo "Change success";
          
        }
        
        
        
        ?>
       <form action="" method="post">
       <select style="height: 35px;" class="combobox" name="work_status" id="work_status">
                        <option value="თავისუფალი">თავისუფალი</option>
                        <option value="დაკავებული">დაკავებული</option>
                    </select>
      
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="send" class="btn btn-primary" value="Save changes">
        </form>
      </div>
    </div>
  </div>
</div>





<!--send work -->

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">შესრულებული სამუშაოს გაგზავნა</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      
      <form method="post" enctype="multipart/form-data">
    <label>Title</label>
    <!-- <textarea name="text" id="" cols="30" rows="3"></textarea>
    <br> -->
    <label>File Upload</label>
    <input type="File" name="file">
    
 
      <?php
      
      if (isset($_POST['submit'])) { 
        $user=$_GET['user_id'];
        $name=$fetch['name'];

        $title=$row['title'];
        $date=date('y-m-d h:i:s');
        
        mysqli_query($conn,"INSERT INTO notifications (name,message,create_date,work_name,user_id) VALUES 
        ('$name','ნახეთ გამოგზავნილი სამუშაო','$date','$title','$user')");

       

        $filename = $_FILES['file']['name'];
    
        
        $destination = 'files/' . $filename;
    
        
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
    
        $text = $_POST['text'];
        $file = $_FILES['file']['tmp_name'];
        $size = $_FILES['file']['size'];
        $customer_name=$rows['name'];
    
        if (!in_array($extension, ['zip', 'pdf', 'docx', 'png','rar','jpg'])) {
            echo "You file extension must be .zip, .pdf or .docx";
        } elseif ($_FILES['file']['size'] > 1000000000) { 
            echo "File too large!";
        } else {
         
            if (move_uploaded_file($file, $destination)) {
                $sql = "INSERT INTO admin_jobs (file,user_id,job_title,add_job_id,customer_id,customer_name) VALUES ('$filename',$user_id,'$title',$job_id,$work_user,'$customer_name')";
                if (mysqli_query($conn, $sql)) {
                  
                    echo "File uploaded successfully";
                    
                    
                }
            } else {
                echo "Failed to upload file.";
            }
        }

        
    }
    
      
      ?>

      
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input onclick="send()" type="submit" name="submit" class="btn btn-primary" value="Send work">
        </form>
      </div>
    </div>
  </div>
</div>




<script>
function send() {
  alert("თქვენი შეკვეთა გამოიგზავნილია ადმინთან,შესამოწმებლად!");
}
</script>



<?php

try{

if(isset($_POST['delete'])){
 
  $sql=mysqli_query($conn,"DELETE   FROM  add_job 
   Where  add_job_id='$job_id' " );


   echo "<script>window.location.href='see_works.php?start_price=0&end_price=2500&search=';</script>";
   exit;



  

}
}
catch(Exception ) {
  echo "<h4 style='color:red'> Message: ამ შეკვეთის/სამუშაოს წაშლას ვერ შეძლებთ სანამ არ გადაიხდით გამოგზავნილ სამუშაოს ან უნდა აირჩიოთ ან არა ვინ 
  შეასრულებს თქვენს სამუშაოს 'სამუშაოს შესრულების მსურველების' გვერდში</h4>" ;
}

?>
















</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


  
<!-- </div> -->

<!-- <form action='upload.php' enctype='multipart/form-data' method='post'>
<input type='file' name='zipFile' accept='zip/*'>
<input type='submit' name='Submit' value='Submit'>
</form> -->






  
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