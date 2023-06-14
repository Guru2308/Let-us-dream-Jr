<?php
include_once('./back/config.php'); 
    $id=$_SESSION['idt'];

// ---------------------------------
// Assigned
// ---------------------------------

$query1 = "SELECT * FROM assignment where assigned_by in (select assigned_mentor_id from mentee_table where mentee_id='".$id."') order by timestamp desc;";
$result = mysqli_query($con,$query1);

if ($result->num_rows > 0) {
    echo '<div class="tabpanel">';
    while ($row = mysqli_fetch_assoc($result)) {
        $field1name = $row["title"];
        $field2name = $row["deadline"];
        $field3name = $row["description"];
        $field4name = $row["timestamp"];
        $words = explode(" ", $field3name);
        if(count($words) > 5) {
            $field3name = implode(" ", array_slice($words, 0, 20)) . "...";
        }
        
        echo '
        <a class="links" href="./dreams_figma/index.php?u='.$row["t_id"].'">
        <div class="as_tabs" onclick="./index.html"><br>
                <img class="img" src="./image_5.png" width="90px" height="65px">
                <div class="s_container">
                <p class="titlet">'.$field1name.'</h3>
                <p class="desc">'.$field3name.'</p>
                <h6> Posted on '.$field2name.'</p>
                
                </div>
                <div class="target">
                <img src="./back/icons8-goal-30.png" alt="done" width="50px" height="50px">
                </div>
            </div><br/><br/>';
           
    }
    echo '</div>';
}

// ---------------------------------
// Missing
// ---------------------------------

$query2 = "SELECT * FROM assignment where assigned_by in (select assigned_mentor_id from mentee_table where mentee_id='".$id."') and t_id not in(select task_id from completed where mentee_id = ".$id.") and deadline < curdate();";

$result = mysqli_query($con,$query2);

if ($result->num_rows > 0) {
    echo '<div class="tabpanel">';
    while ($row = mysqli_fetch_assoc($result)) {
        $field1name = $row["title"];
        $field2name = $row["deadline"];
        $field3name = $row["description"];
        $field4name = $row["timestamp"];

        echo '
        <div class="ms_tabs"><br>
                <img class="img" src="./image_5.png" width="90px" height="65px">
                <div class="s_container">
                <p class="titlet">'.$field1name.'</p>
                <p class="desc">'.$field3name.'</p>
                <h6> Posted on '.$field4name.'</p>
                
                </div>
                <div class="target">
                <img src="./back/icons8-warning-96.png" alt="done" width="50px" height="50px">
                </div>
            </div></a><br/><br/>
            ';
    }
    echo '</div>';
}

// ---------------------------------
// Completed
// ---------------------------------

$query3 = "select * from assignment where t_id in (SELECT task_id from completed where mentee_id = ".$id.");";
$result = mysqli_query($con,$query3);
if ($result->num_rows > 0) {
    echo '<div class="tabpanel">';
    while ($row = mysqli_fetch_assoc($result)) {
        $field1name = $row["title"];
        $field2name = $row["deadline"];
        $field3name = $row["description"];
        $field4name = $row["timestamp"];

        echo '
        <div class="dn_tabs"><br>
                <img class="img" src="./image_5.png" width="90px" height="65px">
                <div class="s_container">
                <p class="titlet">'.$field1name.'</p>
                <p class="desc">'.$field3name.'</p>
                <h6>Task completed on '.$field2name.'</h6>
                </div>
                <div class="target">
                <img src="./back/check-mark-icon-5375.png" alt="done" width="50px" height="50px">
                </div>
            </div></a><br/><br/>';
    }
    echo '</div>';
}