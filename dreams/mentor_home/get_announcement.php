<?php
    include "./config.php";

    $sql = "SELECT * FROM announcement";
    $result = $conn->query($sql);
    // Display names in a select tag
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            ?><div class="an-card">
                <p><?php echo $row["title"]; ?></p>
                <h1><?php echo $row["deadline"]; ?></h1>
                <h3><?php echo $row["description"]; ?></h3>
                <h2>Chatper Coordinator</h2>
                <br><br>
            <?php
        }
        ?> </div><br> <?php
    } else {
    echo "No annoouncements for now.";
    }
?>