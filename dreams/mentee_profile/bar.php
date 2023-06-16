<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
<div id="progressbar-container"></div>

<style>
#progressbar-container {
 /* position: relative;*/
  width: 160px; /* Adjust the width of the container to make the progress bar smaller */
  height: 80px; /* Adjust the height of the container to make the progress bar smaller */
}

.progress-bar {
  border-radius: 40px; /* Adjust the border radius to make the progress bar's corners smaller */
}


</style>

<script src="https://cdn.jsdelivr.net/npm/progressbar.js@1.0.0/dist/progressbar.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
<script>
  var progressbarContainer = document.getElementById('progressbar-container');



<?php session_start();
   $_SESSION["idt"] = $_GET['user'];
   include_once('./config.php'); 
   $query1 = "select mentee_mail FROM mentee_table where mentee_id =".$_SESSION["idt"]."; ";
   $result = mysqli_query($conn,$query1);
   $row = mysqli_fetch_assoc($result);
   $mail = $row["mentee_mail"];
   $sql = "SELECT complete_percent FROM videoprogress WHERE mentee='$mail'";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
     $row = $result->fetch_assoc();
     $progressValue = $row["complete_percent"];
     //echo $progressValue;
   } else {
     $progressValue = 0;
   }
 
 
 ?>




  var bar = new ProgressBar.SemiCircle(progressbarContainer, {
    strokeWidth: 6, // Adjust the strokeWidth to make the progress bar thinner or thicker
    color: '#FFEA82',
    trailColor: '#eee', // Adjust the trailColor to change the color of the empty portion of the progress bar
    trailWidth: 4, // Adjust the trailWidth to make the empty portion of the progress bar thinner or thicker
    easing: 'easeInOut',
    duration: 1400,
    svgStyle: null,
    text: {
      value: '',
      alignToBottom: false
    },
    from: { color: '#1C7730' },
    to: { color: '#1C7730' },
    step: function (state, bar) {
      bar.path.setAttribute('stroke', state.color);
      var value = Math.round(bar.value()*100);
      if(value==100)
      {
        Swal.fire({
          icon: 'success',
          title: 'You have completed Year 1!',
          confirmButtonColor: '#1C7730'
        });
        <?php $query1 = "UPDATE videoprogress SET year=2 WHERE mentee='$mail';";
$updateResult = $conn->query($query1);

?>
      }
      bar.setText(value + '%');
      bar.text.style.color = state.color;
    }
  });

  bar.text.style.fontFamily = 'Montserrat, Helvetica, sans-serif';
  bar.text.style.fontSize = '1rem';

  bar.animate(<?php echo 1 //echo $progressValue/100; ?>); 
</script>

