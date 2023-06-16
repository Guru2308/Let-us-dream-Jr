<?php
    include_once('./config.php');
    $mentee = $_GET['u'];
    $tas_id = $_GET['t'];
    $sql = "insert into completed values(".$mentee.",".$tas_id.",curdate());";
    if ($con->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $con->error;
    } 
    else {
        header("Location: ../tasks_page.php");
        echo "Error: " . $sql . "<br>" . $con->error;
    }   
?>