<?php

include '../config.php';

if(isset($_GET['id'])){
    $delete_id=$_GET['id'];

    $sql_delete=mysqli_query($conn,"DELETE FROM notifications where notifications_id='$delete_id'");

    if($sql_delete){
        header('location:../read_notif.php');
    }

}

?>