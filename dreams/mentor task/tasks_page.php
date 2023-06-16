<?php
  session_start();
  if(isset($_SESSION["idt"])){
    $email=$_SESSION["idt"];
  }
  else{
    header("Location: ../login/index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="./task_page.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
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
        <a class="logout">Back</a>
    </div><br><br>
    <div class="tabContainer">    
      <div class="button_container">
        <div class="text"><img src="./icons8-task-100.png" class="button_assigned" onclick="showPanel(0,'#12e912')"></div>
        <div class="text"><img src="./icons8-data-pending-100.png"class="button_missing" onclick="showPanel(1,'#eb490e')"></div>
        <div class="text"><img src="./icons8-done-100.png" class="button_done" onclick="showPanel(2,'#4369e8')"></div>
      </div>
      <div class="button_text">
        <div class="as_text"><p>Assigned</p></div>
        <div class="ms_text"><p>Missing</p></div>
        <div class="dn_text"><p>Done</p></div>
      </div>
      <!-- <a class="links" href="./dreams_figma./index.html"> -->
        <?php
        include './back/render.php';
        ?>
        <!-- </a> -->
    </div>
      <!-- <div class="tabpanel">
        <div class="ms_tabs"><br>
          <img class="img" src="./image_5.png" width="90px" height="65px">
          <div class="s_container">
          <h3>Assignment1</h3><br>
          <h4>English<h4>
          <h5>Detailed Description of the assignment</h5>
          </div>
          <div class="due">
            <div class="timing">11:59pm</div>
            <div class="date">10/10/2023</div>
          </div>
        </div><br>
        <div class="ms_tabs"><br>
          <img class="img" src="./image_5.png" width="90px" height="65px">
          <div class="s_container">
            <h3>Assignment1</h3><br>
            <h4>English<h4>
            <h5>Detailed Description of the assignment</h5>
            </div>
            <div class="due">
              <div class="timing">11:59pm</div>
              <div class="date">10/10/2023</div>
            </div>
        </div><br>
        <div class="ms_tabs"><br>
          <img class="img" src="./image_5.png" width="90px" height="65px">
          <div class="s_container">
            <h3>Assignment1</h3><br>
            <h4>English<h4>
            <h5>Detailed Description of the assignment</h5>
            </div>
            <div class="due">
              <div class="timing">11:59pm</div>
              <div class="date">10/10/2023</div>
            </div>
        </div>
        
      </div>
      <div class="tabpanel">
        <div class="dn_tabs"><br>
          <img class="img" src="./image_5.png" width="90px" height="65px">
          <div class="s_container">
            <h3>Assignment1</h3><br>
            <h4>Maths<h4>
            <h6>posted on 25march</h6>
            </div>
            <div class="due">
              <img src="./icons8-done (1) 1.png" alt="done" width="50px" height="50px">
            </div>
        </div><br>
        <div class="dn_tabs"><br>
          <img class="img" src="./image_5.png" width="90px" height="65px">
          <div class="s_container">
            <h3>Assignment1</h3><br>
            <h4>Maths<h4>
            <h6>posted on 25march</h6>
            </div>
            <div class="due">
              <img src="./icons8-done (1) 1.png" alt="done" width="50px" height="50px">
            </div>
        </div><br>
        <div class="dn_tabs"><br>
          <img class="img" src="./image_5.png" width="90px" height="65px">
          <div class="s_container">
            <h3>Assignment1</h3><br>
            <h4>Maths<h4>
            <h6>posted on 25march</h6>
            </div>
            <div class="due">
              <img src="./icons8-done (1) 1.png" alt="done" width="50px" height="50px">
            </div>
        </div>
      </div> -->
    </div>
  </body>
<script src="./task_page.js"></script>
</html>

<!-- carousel -->