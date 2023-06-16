<?php
include "./config.php";

    if(isset($_POST['submit']))
    {
        $title = $_POST['title'];
        $deadline = $_POST['deadline'];
        $description = $_POST['description'];
    }


    $sql = "INSERT INTO announcement (title, deadline, description) VALUES ('$title', '$deadline', '$description')";
  
    $rs = mysqli_query($conn, $sql);
    header("Location: ./index.html");

    mysqli_close($conn);
?>