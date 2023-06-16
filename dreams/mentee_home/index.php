<?php
  session_start();
  if(isset($_SESSION['email']) && isset($_SESSION['name'])){
    $name=$_SESSION['name'];
  }
  else{
    header("Location: ../login/index.html");
  }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="index.css" />
  
  <style>
    @import "compass/css3";

@import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);
@import url(https://fonts.googleapis.com/css?family=Fjalla+One);

.badge{
  position: relative;
  width: 416px;
  display: inline-block;
  margin-top: 80px;
  margin-left: 0px;
  margin-bottom: 50px;
  .title{
    font-family: "Montserrat", sans-serif;
    font-weight: bold;
    font-size: 2.0em;
    position: absolute;
    top: -28px;
    border-radius: 8px 8px 8px 8px;
    text-align: center;
    width: 100%;
    background:  #66ff99;
    padding: 20px 30px;
  }
  
}

@mixin setColor($color){
  .title{
      background: #66ff99;
  }
 
}
@import url(https://fonts.googleapis.com/css?family=Bitter:700|Droid+Serif:400|400italic);
 
 .structure {
	 width: 200px;
	 float: left;
   margin-top:0px;
   
}
 .badge-two {
	 position: relative;

	 width: 100px;
	 height: 100px;
	 border: 2px dashed #478266;
	 border-radius: 100px;
}
 .badge-two:after {
	 position: absolute;
	 top: -9px;
	 left: -9px;
	 display: block;
	 width: 115px;
	 height: 115px;
	 content: '';
	 border: 4px solid #665136;
	 border-radius: 108px;
}
 .badge-two:before {
	 position: absolute;
	 top: 4px;
	 left: 4px;
	
	 display: block;
	 width: 88px;
	 height: 88px;
	 content: '';
	 background-color: #2c7d40;
	 border-radius: 100px;
}
 .badge-two h3 {
	 position: absolute;
   font-family: 'Bitter', serif;
	 font-weight: 700;
	 top: 5%;
	 left: 7%;
	 z-index: 7;
	 width: 80px;
	 margin-top: 1.2em;
	 font-size: 1.5em;
	 text-align: center;
	 text-shadow: 1px 1px 0 #e9d2a3;
	 color: #ffffff;
	 -webkit-transform: rotate(-30deg);
	 -ms-transform: rotate(-30deg);
	 transform: rotate(-30deg);
}
 .badge-two h3 span {
	 position: absolute;
	 top: 2.5em;
	 right: 0;
	 left: 0;
	 display: inline-block;
}

  </style>
</head>

<body>
  <div class="header pd-0">
  <img src="Dreams B.png" width="130px" height="130px" />
    <h1 class="title ps-3 pt-4">DREAMS</h1>
    <h2 class="logout">Logout</h2>
  </div>
  <div class="row">
    <div class="head px-5 mx-5 ">
    
    
    </div>
  
    <div class="col-2"></div>
    <div class="col-5  ">
    <div class="badge red">
      <p class="title" style="color:black;"><?php echo $name; ?><br>Desire group christ school</p>
    </div>
    
    <div class="structure">
        <div class="badge-two">
          <h3>Year 1</h3> 
        </div>
    </div> 
      <div class="row py-3">
        <a href="../mentee_course_materials/index.html" class="items">
       
          <img class="images" src="icons/online-learning.png" />
          <h2 class="it-text">View Course</h2>
        </a>
      </div>
      <div class="row py-3">
        <a href="../chat2/index.php" class="items">
          <img class="images" src="icons/chat.png" alt="" />
          <h2 class="it-text">Chat with Mentor</h2>
        </a>
      </div>
      <div class="row py-3">
        <a href="../mentee_task/tasks_page.php" class="items">
          <img class="images" src="icons/to-do-list.png" alt="" />
          <h2 class="it-text">Tasks</h2>
        </a>
      </div>
      <div class="row py-3">
        <a href="../mentee_notes/mentee_notes_front/index.php" class="items">
          <img class="images" src="icons/notes.png" alt="" />
          <h2 class="it-text">Notes</h2>
        </a>
      </div>
      <div class="row py-3">
        <a href="../mentee_accolades/accolades.html" class="items">
          <img class="images" src="icons/certificate.png" alt="" />
          <h2 class="it-text">Accolades</h2>
        </a>
      </div>
    </div>
    <div class="col-5">
      <div class="row">
        <div class="col-3"></div>
        <div class="col-9 anmnts">
          <h1 class="anmnts-header ps-5">Announcements</h1>
          <div class="row">
            <div class="col"></div>
            <!-- Announcements items -->
            <div class="col-10 my-3">
              <div class="row anmnts-item  my-3">
                <h5>abc</h5>
              </div>


              <div class="col"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>

</html>




<!-- <?php include "./get_announcements.php" ?> -->