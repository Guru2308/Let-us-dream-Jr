
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
   

    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/bootstrap-theme.min.css">

    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
   
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
    <link rel="stylesheet" href="index.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="./style.css">

</head>
<body>
    <div class="header pd-0">
        <img src="Dreams B.png" width="130px" height="130px">
        <h1 class="title ps-3 pt-4">DREAMS</h1>
        <h2 class="logout">About</h2>
    </div>
    <div class="background">
        <div class="context">
            <h1></h1>
        </div>
    <div class="area" >
                <ul class="circles">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                </ul>
        </div >
    </div>

    <!-- Login Box -->
<div class="login-box">
    <h1 class="login-header">Login</h1>
    <div class="wrapper">
        <div class="title-text">
          <div class="title login">Login Form</div>
          <div class="title signup">Signup Form</div>
        </div>
        <div class="form-container">
          <div class="slide-controls">
            <input type="radio" name="slide" id="login" checked>
            <input type="radio" name="slide" id="signup">
            <label for="login" class="slide login">Mentee</label>
            <label for="signup" class="slide signup">Mentor</label>
            <div class="slider-tab"></div>
          </div>
          <div class="form-inner">
            <form action="authentication_mentee.php" class="login" method="POST">
              <div class="field">
                <input type="text" name="email" placeholder="Email Address" required>
              </div>
              <div class="field">
                <input type="password" name="password" placeholder="Password" required>
              </div>
              <?php
                session_start();
                if(isset($_SESSION['status'])){
                        ?>
                        <div class="alert alert-success">
                            <h5><?=$_SESSION['status']; ?></h5>
                        </div>
                        <?php
                        unset($_SESSION['status']); 
                    }
                ?>
              <div class="pass-link"><a href="passresetpage.php">Forgot password?</a></div>
              <div class="field btn">
                <div class="btn-layer"></div>
                <input type="submit" value="Login">
              </div>
              
            </form>
            <form action="authentication_mentor.php" class="login" method="POST">
                <div class="field">
                  <input type="text" name="email" placeholder="Email Address" required>
                </div>
                <div class="field">
                  <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="pass-link"><a href="passresetpage.php">Forgot password?</a></div>
                <div class="field btn">
                  <div class="btn-layer"></div>
                  <input type="submit" value="Login" onclick>
                </div>
                
              </form>
          </div>
        </div>
      </div> 
    </div> 

    <!-- coursel -->
    <div class="coursel">
        <div class="slider">
  
            <a href="#slide-1">1</a>
            <a href="#slide-2">2</a>
            <a href="#slide-3">3</a>
            <a href="#slide-4">4</a>
            <a href="#slide-5">5</a>
          
            <div class="slides">
              <div id="slide-1">
                <img src="./1.png" alt="">
              </div>
              <div id="slide-2">
                <img src="./2.png" alt="">
              </div>
              <div id="slide-3">
                <img src="./3.png" alt="">
              </div>
              <div id="slide-4">
                <img src="./4.png" alt="">
              </div>
              <div id="slide-5">
                <img src="./5.png" alt="">
              </div>
            </div>
          </div>
    </div>
    <script src="index.js"></script>     
</body>
</html>