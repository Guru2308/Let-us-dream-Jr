<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db_name = "db_admin";

$conn = mysqli_connect($host, $user, $password, $db_name);
if (mysqli_connect_errno()) {
    die("Failed to connect with MySQL: " . mysqli_connect_error());
}

$mentee_id = $_SESSION['email'];

// Check if the email is present in the videoprogress table
$emailCheckQuery = "SELECT * FROM videoprogress WHERE mentee = '$mentee_id'";
$emailCheckResult = mysqli_query($conn, $emailCheckQuery);

if (mysqli_num_rows($emailCheckResult) == 0) {
    // Email is not present, add it to videoprogress
    $insertQuery = "INSERT INTO videoprogress (mentee, year, topic1, topic2, topic3, topic4, topic5, topic6, topic7, topic8, complete_percent) 
                VALUES ('$mentee_id', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$insertResult = mysqli_query($conn, $insertQuery);

    if (!$insertQuery) {
        // Failed to add the email
        echo "Error adding email to videoprogress: " . mysqli_error($conn);
        exit();
    }
}

if (isset($_GET['topicvalue']) && isset($_GET['completed'])) {
    $topicvalue = $_GET['topicvalue'];
    $completed = $_GET['completed'];

    // Prepare and execute the query to update the completed status
    $query = "UPDATE videoprogress SET $topicvalue = '$completed' WHERE mentee = '$mentee_id'";
    $query2 = "UPDATE videoprogress SET complete_percent = (
        SELECT (
            (
                (CASE WHEN topic1 = 1 THEN 1 ELSE 0 END) +
                (CASE WHEN topic2 = 1 THEN 1 ELSE 0 END) +
                (CASE WHEN topic3 = 1 THEN 1 ELSE 0 END) +
                (CASE WHEN topic4 = 1 THEN 1 ELSE 0 END) +
                (CASE WHEN topic5 = 1 THEN 1 ELSE 0 END) +
                (CASE WHEN topic6 = 1 THEN 1 ELSE 0 END) +
                (CASE WHEN topic7 = 1 THEN 1 ELSE 0 END) +
                (CASE WHEN topic8 = 1 THEN 1 ELSE 0 END)
            ) / 8.0
        ) * 100
        FROM videoprogress WHERE mentee='$mentee_id'
    ) WHERE mentee='$mentee_id';";
    $result = mysqli_query($conn, $query);
    $result2 = mysqli_query($conn, $query2);

    if ($result && $result2) {
        // Update successful
        echo "Completed status updated successfully.";
    } else {
        // Update failed
        echo "Error updating completed status: " . mysqli_error($conn);
    }
} else {
    // Invalid parameters
    echo "Invalid parameters.";
}

// Close the database connection
mysqli_close($conn);

?>
