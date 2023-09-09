
<?php

include 'config.php';
session_start();



$user_id=$_SESSION['id'];


if(isset($_POST['pay'])){


  $job_id=$_GET['post'];
    $filename=$_GET['file'];
    $name=$_GET['userName'];
    $surname=$_GET['userSurname'];
    $send_job_id=$_GET['send_job_id'];
    $title=$_GET['title'];
    $customer_id=$_GET['customer_id'];
    $customer_name=$_GET['customer_name'];
    $work_title=$_GET['work_title'];

    date_default_timezone_set('Asia/Tbilisi');
    $date=date('y-m-d h:i:s');
 

    $insert=mysqli_query($conn,"INSERT INTO pay_notif (name,surname,file,user_id,message,title) 
    VALUES ('$name','$surname','$filename','$user_id','ნახეთ გამოგზავნილი ფაილი!','$title')");

    $insert2=mysqli_query($conn,"INSERT INTO notifications (name,message,create_date,work_name,user_id) VALUES 
    ('$customer_name','სამუშაო გადახდილია','$date','$job','$customer_id')");

    $sql=mysqli_query($conn,"DELETE  FROM  send_job Where send_job_id='$send_job_id'");

if($insert && $insert2 && $sql){
    header('location:see_works.php?start_price=0&end_price=2500&search=');
}

// if($insert){
//     header('google.com');
// }
// }

}

$job_id=$_GET['post'];

$result = mysqli_query($conn,"SELECT * from add_job inner join user on add_job.user_id=user.user_id WHERE add_job_id=$job_id ");

while($row = $result->fetch_assoc()){
  
   
?>






























<!DOCTYPE html>
<html>
<head>
  <title>Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="styles/pay.css">
</head>
<body>
  <main class="page payment-page">
    <section class="payment-form dark">
      <div class="container">
        <div class="block-heading">
          <h2>გადახდა</h2>
          <p>P.S თქვენ შეგიძლიათ შეიყვანოთ ნებისმიერი შემთხვევითი საბანკო ბარათის მონაცემები.</p>
        </div>
        <form action="" method='post' enctype="multipart/form-data">
          <div class="products">
            <h3 class="title">Checkout</h3>
            <div class="item">
              <span class="price"><?php echo $row['price'].' ლარი +'.'საკომისიო(5%)'?></span>
              <p class="item-name">საუშაო </p>
              <p class="item-description"><?php echo $row['title']?></p>
            </div>
   <?php
}
   
   ?>
          </div>
          <div class="card-details">
            <h3 class="title">Credit Card Details</h3>
            <div class="row">
              <div class="form-group col-sm-7">
                <label for="card-holder">Card Holder</label>
                <input id="card-holder" type="text" class="form-control" placeholder="Card Holder" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-5">
                <label for="">Expiration Date</label>
                <div class="input-group expiration-date">
                  <input type="text" class="form-control" placeholder="MM" aria-label="MM" aria-describedby="basic-addon1">
                  <span class="date-separator">/</span>
                  <input type="text" class="form-control" placeholder="YY" aria-label="YY" aria-describedby="basic-addon1">
                </div>
              </div>
              <div class="form-group col-sm-8">
                <label for="card-number">Card Number</label>
                <input id="card-number" type="text" class="form-control" placeholder="Card Number" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-4">
                <label for="cvc">CVC</label>
                <input id="cvc" type="text" class="form-control" placeholder="CVC" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-12">
                
               
                <button name='pay'  class="btn btn-primary btn-block">დასრულება</button>
                
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
​
