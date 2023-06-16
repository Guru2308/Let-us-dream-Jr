<?php
include "./config.php";
session_start();
//$user_id = $_SESSION['user_id'];
//$_SESSION["idt"] = $_GET['user'];
    if(isset($_POST['submit']))
    {
        $first = $_POST['first'];
        $second = $_POST['second'];
        $third = $_POST['third'];
    }
    echo $time;

    //$sql = "INSERT INTO percent (mentee_id, first, second, third) VALUES ('$first', '$second', '$third')";
    $sql = "UPDATE `percent` SET `first`= '$first',`second`='$second',`third`='$third' WHERE mentee_id=".$_SESSION["idt"].";";
    $rs = mysqli_query($conn, $sql);
    header("Location: ./index.php?user=".$_SESSION['idt']."");
    

  
    mysqli_close($conn);
    ?>

