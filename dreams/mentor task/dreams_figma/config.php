<?php
$con = mysqli_connect("localhost","root","","db_admin");
$query = "select * from assignment"; 
if(mysqli_query($con,$query)){
}