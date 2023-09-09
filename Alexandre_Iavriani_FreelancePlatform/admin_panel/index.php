
<?php

include '../config.php';
session_start();
$admin_id=$_SESSION['admin'];



if(!isset($admin_id)){
  header('location: admin_login.php');
}



?>








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
            <h1>FreeWork</h1>
        </div>
        <ul>
            
            
            <li><a href="jobs.php">სამუშაობები</a></li>
            <li><a href="freelancers_admin">ფრილანსერები</a> </li>
       
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <h1>ადმინ პანელი</h1>
                </div>
                <div class="user">
                    <a href="logout.php" class="btn">logout</a>
                   
                   
                        
                    
                </div>
            </div>
        </div>
        <!-- <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>2194</h1>
                        <h3>Users</h3>
                    </div>
                    <div class="icon-case">
                        <img src="students.png" alt="">
                    </div>
                </div>
               
                <div class="card">
                    <div class="box">
                        <h1>5</h1>
                        <h3>Lorem psum</h3>
                    </div>
                    <div class="icon-case">
                        <img src="schools.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>350000</h1>
                        <h3>Income</h3>
                    </div>
                    <div class="icon-case">
                        <img src="income.png" alt="">
                    </div>
                </div>
            </div>
           
                    </table>
                </div>
            </div>
        </div>
    </div> -->
</body>

</html>