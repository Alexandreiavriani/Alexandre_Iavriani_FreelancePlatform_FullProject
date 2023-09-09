<?php

include '../config.php';

if (isset($_GET['admin_jobs_id'])) {
    $id = $_GET['admin_jobs_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM admin_jobs WHERE admin_jobs_id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../files/' . $file['file'];

    if (file_exists($filepath)) {
        
    






        header('Content-type: application/octet-stream');
        header('Pragma: public');  // required
    header('Expires: 0');  // no cache
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Cache-Control: private', false);
    

    header("application/vnd.openxmlformats-officedocument.wordprocessingml.document");

    header('Content-disposition: attachment; filename=' . basename($filepath));

    

    header('Content-type: image/png');
    header('Content-Length: ' . filesize($filepath)); // provide file size
    header('Connection: close');
    ob_clean();
        readfile('../files/' . $file['file']);

       
        exit;
    }

}?>



