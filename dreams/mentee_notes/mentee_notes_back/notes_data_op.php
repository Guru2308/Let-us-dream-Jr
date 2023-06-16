
<?php
include('../../mentee_login/connection.php');

$query = 'SELECT * FROM notes_table';
$result = mysqli_query($con, $query);
$note_list = mysqli_fetch_all($result, MYSQLI_ASSOC);
session_start();
// $user = $_SESSION["user"];

$user = 111;
foreach($note_list as $note){
    if($user == $note['reg']){
        echo '<div class="row">
          <button class="note-items container px-5">
            <h5>'.$note['note_header'].'</h5>
            <h6>
              <span class="date-n">'.$note["note_date"].'</span
              ><span class="ps-3 body-n">'.$note['description'].'</span>
            </h6>
          </button>
        </div>';
    }
}



?>
