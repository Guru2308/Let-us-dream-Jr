<?php
// Assuming you have a database connection established
$host = "localhost";
$user = "root";
$password = "";
$db_name = "db_admin";

$conn = mysqli_connect($host, $user, $password, $db_name);
if (mysqli_connect_errno()) {
    die("Failed to connect with MySQL: " . mysqli_connect_error());
}

// Access the video ID passed from JavaScript through the $_GET superglobal
if (isset($_GET['topicvalue'])) {
    $topicnos = $_GET['topicvalue'];

    // Prepare and execute the query to retrieve the video URL based on the video ID
    $query = "SELECT COUNT(topic_no) AS topicno FROM mentee_video WHERE topic_no = '$topicnos';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $countofvid = $row['topicno'];

            // Create an array to hold the video URL
            $response = array(
                'countt' => $countofvid
            );

            // Set the appropriate Content-Type header for JSON response
            header('Content-Type: application/json');

            // Encode the response array as JSON and send it to the client
            echo json_encode($response);
        } else {
            // Video not found
            $response = array(
                'error' => 'Video not found.'
            );

            // Set the appropriate Content-Type header for JSON response
            header('Content-Type: application/json');

            // Encode the response array as JSON and send it to the client
            echo json_encode($response);
        }
    } else {
        // Query execution error
        $response = array(
            'error' => 'Error executing query: ' . mysqli_error($conn)
        );

        // Set the appropriate Content-Type header for JSON response
        header('Content-Type: application/json');

        // Encode the response array as JSON and send it to the client
        echo json_encode($response);
    }
} else {
    // No video ID received
    $response = array(
        'error' => 'No video ID received.'
    );

    // Set the appropriate Content-Type header for JSON response
    header('Content-Type: application/json');

    // Encode the response array as JSON and send it to the client
    echo json_encode($response);
}

// Close the database connection
mysqli_close($conn);
?>
