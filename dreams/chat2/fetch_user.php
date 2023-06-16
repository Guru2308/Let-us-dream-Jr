<?php

//fetch_user.php

include('database_connection.php');
//session_start();
$username = $_SESSION['email'];
$user_id = $_SESSION['user_id'];

$query1 = "
SELECT * FROM mentee_table 
WHERE mentee_id != '" . $_SESSION['user_id'] . "' 
";

$query2 = "
SELECT * FROM mentor_table 
WHERE mentor_id != '" . $_SESSION['user_id'] . "' 
";

$statement1 = $connect->prepare($query1);
$statement2 = $connect->prepare($query2);

$statement1->execute();
$statement2->execute();

$result1 = $statement1->fetchAll();
$result2 = $statement2->fetchAll();


$output1 = '
<table class="table  ">

';

foreach ($result1 as $row) {
	$status = '';
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['mentee_id'], $connect);
	if ($user_last_activity > $current_timestamp) {
		$status = '<span class="label label-success">Online</span>';
	} else {
		$status = '<span class="label label-danger">Offline</span>';
	}
	$output1 .= '
	<tr class="">
	<div class="row">
	<div >
	<td class="name_list">' . $row['mentee_mail'] . ' ' . count_unseen_message($row['mentee_id'], $_SESSION['user_id'], $connect) . ' ' . fetch_is_type_status($row['mentee_id'], $connect) . '</td>
	</div>
	<div >
		<td class="status">' . $status . '</td>
		<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="' . $row['mentee_id'] . '" data-tousername="' . $row['mentee_mail'] . '">Start Chat</button></td>
	</div>
	</div>
	
	</tr>
	';
}

$output1 .= '</table>';

echo $output1;

$output2 = '
<table class="table  ">

';

foreach ($result2 as $row) {
	$status = '';
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['mentor_id'], $connect);
	if ($user_last_activity > $current_timestamp) {
		$status = '<span class="label label-success">Online</span>';
	} else {
		$status = '<span class="label label-danger">Offline</span>';
	}
	$output2 .= '
	<tr class="">
	<div class="row">
	<div >
	<td class="name_list">' . $row['mentor_mail'] . ' ' . count_unseen_message($row['mentor_id'], $_SESSION['user_id'], $connect) . '' . fetch_is_type_status($row['mentor_id'], $connect) .'</td>
	</div>
	<div >
		<td class="status">' . $status . '</td>
		<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="' . $row['mentor_id'] . '" data-tousername="' . $row['mentor_mail'] . '">Start Chat</button></td>
	</div>
	</div>
	
	</tr>
	';
}

$output2 .= '</table>';

echo $output2;


