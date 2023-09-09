<?php

include '../config.php';

if(isset($_GET['id'])){
    $delete_id=$_GET['id'];

    $sql_delete=mysqli_query($conn,"DELETE FROM pay_notif where pay_notif_id='$delete_id'");

    if($sql_delete){
        header('location:../read_pay_notif.php');
    }

}

?>