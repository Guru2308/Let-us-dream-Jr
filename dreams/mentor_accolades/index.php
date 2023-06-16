<?php
include "./config.php";

    if(isset($_POST['submit']))
    {
        $name = $_POST['names'];
        $type = $_POST['type'];
        $description = $_POST['description'];

        $file = rand(1000,100000)."-".$_FILES['file']['name'];
        $file_loc = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_type = $_FILES['file']['type'];
 $folder="upload/";
 
 /* new file size in KB */
 $new_size = $file_size/1024;  
 /* new file size in KB */
 
 /* make file name in lower case */
 $new_file_name = strtolower($file);
 /* make file name in lower case */
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql="INSERT INTO accolades(name, description, ac_type, file_name,type,size) VALUES('$name','$description', '$type', '$final_file','','')";
  mysqli_query($conn,$sql);
  echo "File sucessfully upload";
  header("Location: ./main.php");
        
  
 }
 else
 {
  
  echo "Error.Please try again";
		
		}
	}

?>