<?php

include 'config.php';

if(isset($_POST['submit'])){
    
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $surname=mysqli_real_escape_string($conn,$_POST['surname']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $phone=mysqli_real_escape_string($conn,$_POST['phone']);
    $gender=mysqli_real_escape_string($conn,$_POST['gender']);
    $dob=mysqli_real_escape_string($conn,$_POST['dob']);
    $city=mysqli_real_escape_string($conn,$_POST['city']);

    $image=$_FILES['image']['name'];
    $image_size=$_FILES['image']['size'];
    $image_tmp_name=$_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;

   


    
        if($image_size > 2000000){
            $message[]='image size is too large!';
        }else{
            $insert=mysqli_query($conn,"INSERT INTO `user`(name,gender,surname,password,email,phone,city,dob,image)
            VALUES ('$name','$gender','$surname','$password','$email','$phone','$city','$dob','$image')");



            if($insert){
                move_uploaded_file($image_tmp_name,$image_folder);
                $message[]="თქვენ წარმატებულად გაიარეთ რეგისტრაცია!";
                header('location:login.php');

            }else{
                $message[]="თქვენ ვერ გაიარეთ რეგისტრაცია!";
            }
        }
    }



?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles/LoginStyle.css">
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>რეგისტრაცია</header>
            <form action="" method="post" enctype="multipart/form-data">
            <?php
            if(isset($message)){
                foreach($message as $message){
                    echo '<div class="message">'.$message.'</div>';
                }
            }
            ?>

                <div class="field input">
                    <label for="">სახელი</label>
                    <input style="width:429px;" type="text" name="name" id="name" required>
                </div>

                <div class="field input">
                    <label for="">გვარი</label>
                    <input style="width:429px;" type="text" name="surname" id="surname" required>
                </div>

                <div class="field input">
                    <label for="password">პაროლი</label>
                    <input style="width:429px;" type="password" name="password" id="password" required>
                </div>

                <div class="field input">
                    <label for="email">მეილი</label>
                    <input style="width:429px;" type="text" name="email" id="email" required>
                </div>

                <div class="field input">
                    <label >მობილური</label>
                    <input style="width:429px;" type="text" name="phone" id="phone" required>
                </div>

                <div class="field input">
                    <label >სქესი</label>
                    <select style="height: 35px;" class="combobox" name="gender" id="gender">
                        <option value="კაცი">კაცი</option>
                        <option value="ქალი">ქალი</option>
                    </select>
                </div>

                <div class="field input">
                    <label >დაბადების თარიღი</label>
                    <input style="width:429px;" type="date" name="dob" id="dob" required>
                </div>

                <div class="field input">
                    <label >ქალაქი</label>
                    <input style="width:429px;" type="text" name="city" id="city" required>
                </div>


                <div class="field input">
                    <label >Image</label>
                    <input style="width:429px;"  type="file" value="fff" name="image" id="image" accept="image/jpg , image/jpeg,image/png" >
                </div>

                <div class="field">
                    <input class="btn_create" type="submit" name="submit" value="რეგისტრაცია" required>
                </div>

                <div class="links">
                    უკვე დარეგისტრირებული ხართ? <a href="login.php">Log in</a>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>