
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
                   
                    <h2>ფრილანსერების ჩამატება</h2>
                </div>
                <div class="user">
                    <a href="logout.php" class="btn">logout</a>
                   
                   
                        
                </div>   
            </div> 
        </div>

        
        
    <?php
    
    $result = mysqli_query($conn,"SELECT * from `show_freelancers_admin` inner join user on show_freelancers_admin.user_id=user.user_id ");



  






while($row = $result->fetch_assoc()){
    
   
    
    ?>

        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1 style="font-size:25px;"><?php echo $row['name'].' '.$row['surname'] ?></h1>

                        <br>
                        <p >პროფესია:<?php echo $row['profession']?></p>
            
                        <br>

                        <br>
                        <p style="width:850px;">ჩემს შესახებ: <?php echo $row['about_me']?></p>
            
                        <br>
              
                    </div>
                    <div class="icon-case">
                        <img src="students.png" alt="">
                    </div>
                </div>
               

              <div style="margin-top:250px; margin-left:5px; position:absolute;" >
      <a href="insert_freelancers.php?user_id=<?php echo $row['user_id'].'&about_me='.$row['about_me'].'&profession='.$row['profession'].'&id='.$row['id'] ?>"> <button name="btn1"    > <button   class='btn1'><p>დადასტურება</p></button> </a> 
      
  

      <a href="delete_freelancer.php?id=<?php echo $row['id'].'&user_id='.$row['user_id']?>">  <button style="margin-top:75px; position:absolute; margin-left:-1198px;" class='btn2'  name='btn2'> 
              <p> არ მიღება</p></button></a>

              </div>

                </div>
               
               


<?php









}



?>


     
  
           
                 
                </div>
            </div>
        </div>
    </div>
</body>

</html>