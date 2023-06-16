<?php
include "./config.php";
session_start();

    if(isset($_POST['submit']))
    {
        $title = $_POST['title'];
        $deadline = $_POST['deadline'];
        $description = $_POST['description'];
        $time = date("Y-m-d H:i:s");

    }
    echo $time;

    $sql = "INSERT INTO assignment (title, deadline, description, timestamp,assigned_by) VALUES ('$title', '$deadline', '$description','$time',".$_SESSION['user_id'].")";
  
    $rs = mysqli_query($conn, $sql);
    header("Location: ./index.html");

  
    mysqli_close($conn);
