
<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){
    

    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);


   


    
        $select = mysqli_query($conn,"SELECT * FROM `user` WHERE email='$email' and password = '$password'") or die('query failed');



        if(mysqli_num_rows($select)>0){
            $row=mysqli_fetch_assoc($select);
            $_SESSION['id']=$row['user_id'];
            header('location:index.php');
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
    <link rel="stylesheet" href="styles/LoginStyle.css">
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>შესვლა</header>
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
                    <input style="width:429px;" type="text" name="email" id="email" required>
                </div>




                <div class="field input">
                    <label for="password">პაროლი</label>
                    <input style="width:429px;" type="password" name="password" id="password" required>
                </div>


                

                <div class="field">
                    <input class="btn_create" type="submit" name="submit" value="შესვლა" required>
                </div>

                <div class="links">
                    არ გაქვთ პროფილი? <a href="register.php">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>