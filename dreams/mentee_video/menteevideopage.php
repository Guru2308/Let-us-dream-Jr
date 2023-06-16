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
if (isset($_GET['year']) && isset($_GET['topicno'])) {
    $year = $_GET['year'];
    $topicno = $_GET['topicno'];

    // Prepare and execute the query to retrieve the video URLs based on the year and topicno
    $query = "SELECT embed_url FROM mentee_video WHERE year = ? AND topic_no = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ii", $year, $topicno);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        $videoUrls = array(); // Array to store the video URLs

        while ($row = mysqli_fetch_assoc($result)) {
            $videoUrls[] = $row['embed_url']; // Add each URL to the array
        }

        if (count($videoUrls) > 0) {
            // Create a response array with the video URLs
            $response = array(
                'videoUrls' => $videoUrls
            );

            // Set the appropriate Content-Type header for JSON response
            header('Content-Type: application/json');

            // Encode the response array as JSON and send it to the client
            echo json_encode($response);
        } else {
            // No videos found
            $response = array(
                'error' => 'No videos found.'
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
    // No year or topicno received
    $response = array(
        'error' => 'No year or topicno received.'
    );

    // Set the appropriate Content-Type header for JSON response
    header('Content-Type: application/json');

    // Encode the response array as JSON and send it to the client
    echo json_encode($response);
}

// Close the database connection
mysqli_close($conn);
?>
