<?php
  include_once('./config.php'); 
  $query1 = "select * FROM mentee_table where assigned_mentor_id=".$_SESSION['user_id'].";";
  $result = mysqli_query($conn,$query1);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<a class="card" href="../mentee_profile/index.php?user='.$row["mentee_id"].'">
        <div class="card-body">
          <img
            class="dp"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbfcKdjTXtncIovdA5Byz-iY6oXD1PhFLJv9zhEuCf6L0yvqE_SrXg_EWMb_n1ruVoVzM&usqp=CAU"
            alt=""
          />
          <h3>'.$row["mentee_name"].'</h3>
          <p>Desire Group</p>
          <p>Christ School Chapter</p>
        </div>
      </a>';           
    }
  
}
?>