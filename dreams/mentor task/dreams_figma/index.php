<?php
    include_once('./config.php');
    session_start();
    $tas_id = $_GET['u'];
    if(isset($_SESSION['idt'])){
        $query1 = "SELECT * FROM assignment where t_id=".$tas_id."";
        $result = mysqli_query($con,$query1);
        echo '<div class="tabpanel">';
        $row = mysqli_fetch_assoc($result);
        $title = $row["title"];
        $deadline = $row["deadline"];
        $desc = $row["description"];
        $pos = $row["timestamp"];
    }
    else{
        header("Location: http://localhost/dreams_figma2.0/dreams_figma2.0/login/index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
 
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
   
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="header pd-0">
        <img src="Dreams B.png" width="130px" height="130px">
        <h1 class="title ps-3 pt-4">DREAMS</h1>
        <h2 class="logout">Logout</h2>
    </div>  
    <img class="assignimg" src="image 2.png">        
    <h2 class="head">ASSIGNED</h2>
    <hr class="headhr">
    <div class="content">
        <img  class="spookysticker" src="Spooky Stickers Chunky Bat.png">
        <img class="graduateimg" src="Hands Graduate.png">
        <h2 class="tasktitle">Task</h2>
        <hr>
        
        <div class="topic"><?php echo $title; ?>
        <br>Due on:<?php echo $deadline; ?>
        
        </div>
        
        <div class="instruction">Instruction :</div>
        <div class="date">Posted on :<?php echo $pos; ?></div>
        <hr class="Insthr">
        <div class="desc">
            <?php echo $desc; ?>
        </div>
    </div>
    
    
    
</body>
</html>