<?php   
//Authentication for login 
    include('../../mentee_login/connection.php');
    session_start();  
    //$user_id = $_SESSION['user_name'];
    $reg = 111;
    $note_header = $_POST['note_header'];  
    $note_date = $_POST['note_date'];  
    $note_desc = $_POST['note_desc'];

    
      
    //to prevent from mysqli injection  
    
    
    $sql = "insert into notes_table(reg,note_header,note_date,description) values('$reg','$note_header','$note_date','$note_desc')";  
    mysqli_query($con, $sql);
    header('Location: ../mentee_notes_front/index.php');
    
?>  