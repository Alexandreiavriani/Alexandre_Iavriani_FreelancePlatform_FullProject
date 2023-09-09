<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>


<?php

include '../config.php';
















if(isset($_GET['id'])){
    $user_id=$_GET['user_id'];
    $about_me=$_GET['about_me'];
    $profession=$_GET['profession'];
    $id=$_GET['id'];

    date_default_timezone_set('Asia/Tbilisi');
    $date=date('y-m-d h:i:s');
    
    




    $insert1=mysqli_query($conn,"INSERT INTO notifications (name,message,create_date,user_id) VALUES 
    ('ადმინი','თქვენი არ ხართ შეყვენილი ფრილანსერების სიაში','$date','$user_id')");
    
$sql=mysqli_query($conn,"DELETE  FROM  show_freelancers_admin Where id='$id'");

if($insert1 && $sql){
    header('location:freelancers_admin.php');
}
}



?>