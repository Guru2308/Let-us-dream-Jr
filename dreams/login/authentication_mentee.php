<?php   
//Authentication for login 
    include('connection.php');  
    $username = $_POST['email'];  
    $password = $_POST['password'];  
      
    //to prevent from mysqli injection  
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($con, $username);  
    $password = mysqli_real_escape_string($con, $password);  
    
    $sql = "select * from mentee_table where mentee_mail= '$username' and mentee_pass = '$password'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
    
    if($count == 1){  
        session_start();
        $_SESSION['email'] = $username;
        $_SESSION['user_id'] = $row['mentee_id'];
        $_SESSION['name'] = $row['mentee_name'];
        echo "logged in";
        header("Location: ../mentee_home/index.php");  

    }  
    else{  
        session_start();
        $_SESSION['status'] = "Invalid Email or Password";
        header("Location: index.php");
    }       

?>  