<?php
    //session_start();
    /*if(!isset($_GET['user'])){
        header("Location: ../login/index.php");
    }*/
   //$_SESSION["idt"] = $_GET['user'];
   include_once('./config.php'); 
   $query1 = "select * FROM percent where mentee_id =".$_SESSION["idt"]."; ";
   $result = mysqli_query($conn,$query1);
   $row = mysqli_fetch_assoc($result);
   $agg=($row['first']+$row['second']+$row['third'])/3;
   //$name = $row["mentee_name"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Percentage   '],
          ['Year 1',  <?php echo $row["first"] ?>],
          ['Year 2',  <?php echo $row["second"] ?>],
          ['Year 3',  <?php echo $row["third"] ?>]
        ]);

        var options = {
          title: 'Mentee Aggregate performanc: <?php echo $agg.'%'; ?>',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="
    width: 800px;
    height: 400px;
    "></div>
    
  </body>
</html>