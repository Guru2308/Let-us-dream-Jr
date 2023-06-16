<!--
//login.php
!-->

<?php

include('database_connection.php');

session_start();

$message = '';

/*if(isset($_SESSION['mentee_id']))
{
	header('location:index.php');
}*/

if(isset($_POST['login']))
{
	$query = "
		SELECT * FROM mentee_table 
  		WHERE mentee_mail = :mentee_mail
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':mentee_mail' => $_POST["mentee_mail"]
		)
	);	
	$count = $statement->rowCount();
	if($count > 0)
	{
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			if(password_verify($_POST["password"], $row["password"]))
			{
				$_SESSION['mentor_id'] = $row['mentor_id'];
				$_SESSION['mentee_mail'] = $row['mentee_mail'];
				$sub_query = "
				INSERT INTO login_details 
	     		(user_id) 
	     		VALUES ('".$row['mentor_id']."')
				";
				$statement = $connect->prepare($sub_query);
				$statement->execute();
				$_SESSION['login_details_id'] = $connect->lastInsertId();
				header('location:index.php');
			}
			else
			{
				$message = '<label>Wrong Password</label>';
			}
		}
	}
	else
	{
		$message = '<label>Wrong Username</labe>';
	}
}


?>
