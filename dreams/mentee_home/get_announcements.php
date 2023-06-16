<?php
    include "./config.php";

    $sql = "SELECT * FROM announcement";
    $result = $conn->query($sql);
    // Display names in a select tag
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo  $row["title"];
            echo $row["deadline"];
            echo $row["description"];
            
        }
    } else {
    echo "No annoouncements for now.";
    }
?>