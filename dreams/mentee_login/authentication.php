<?php   
//Authentication for login 
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
    //to prevent from mysqli injection  
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($con, $username);  
    $password = mysqli_real_escape_string($con, $password);  
    
    $sql = "select * from login_cred where user= '$username' and pass = '$password'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
    
    if($count == 1){  
        session_start();
        $_SESSION['superhero'] = $username;
        echo "logged in";
        header("Location: ./after_login.php");  
    }  
    else{  
        echo "<h1> Login failed. Invalid username or password.</h1>";  
    }     

?>  