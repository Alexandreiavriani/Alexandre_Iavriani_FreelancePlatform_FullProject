
<?php

include '../config.php';
session_start();

if(isset($_POST['submit'])){
    

    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);


   


    
        $select = mysqli_query($conn,"SELECT * FROM `admin` WHERE email='$email' and password = '$password'") or die('query failed');



        if(mysqli_num_rows($select)>0){
            $row=mysqli_fetch_assoc($select);
            $_SESSION['admin']=$row['admin_id'];
            header('location:jobs.php');
        }else{
            $message[]='არასწორი მეილი ან პაროლი!';
        }
    }



?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/LoginStyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <h3>მეილი:alexandre.iavriani@gmail.com</h3>
    <h3>პაროლი:12345</h3>
    
    <div class="container">
   
        <div class="box form-box">
            <header>ADMIN შესვლა</header>
            <form action="" method="post" enctype="multipart/form-data">
                <?php 
                if (isset($message)){
                    foreach($message as $message){
                        echo '<div class="message">'.$message.'</div>';
                    }
                }

                
?>

                <div class="field input">
                    <label for="email">მეილი</label>
                    <input type="text" name="email" id="email" required>
                </div>


                <div class="field input">
                    <label for="password">პაროლი</label>
                    <input type="password" name="password" id="password" required>
                </div>


                

                <div class="field">
                    <input class="btn btn-primary" type="submit" name="submit" value="შესვლა" required>
                </div>

               
            </form>
        </div>
    </div>
    
</body>
</html>