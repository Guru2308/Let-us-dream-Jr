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

// Access the video ID passed from JavaScript through the $_GET superglobal
if (isset($_GET['topicvalue'])) {
    $topicvalue = strval($_GET['topicvalue']);
    $mentee_id = $_SESSION['email'];

    // Check if the email exists in the videoprogress table
    $checkQuery = "SELECT mentee FROM videoprogress WHERE mentee = '$mentee_id'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if ($checkResult) {
        if (mysqli_num_rows($checkResult) == 0) {
            // Email not found in the videoprogress table, add the email
            $addQuery = "INSERT INTO videoprogress (mentee) VALUES ('$mentee_id')";
            $addResult = mysqli_query($conn, $addQuery);

            if (!$addResult) {
                // Error adding the email to the videoprogress table
                $response = array(
                    'error' => 'Error adding email to videoprogress table: ' . mysqli_error($conn)
                );

                // Set the appropriate Content-Type header for JSON response
                header('Content-Type: application/json');

                // Encode the response array as JSON and send it to the client
                echo json_encode($response);
                exit;
            }
        }

        // Retrieve the completed status for the given topicvalue and mentee_id
        $query = "SELECT $topicvalue FROM videoprogress WHERE mentee = '$mentee_id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $completedValue = $row[$topicvalue];

                // Create an array to hold the completed value
                $response = array(
                    'completed' => $completedValue
                );

                // Set the appropriate Content-Type header for JSON response
                header('Content-Type: application/json');

                // Encode the response array as JSON and send it to the client
                echo json_encode($response);
            } else {
                // Entry not found for the given topicvalue and mentee_id
                $response = array(
                    'error' => 'Entry not found.'
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
        // Error checking email in videoprogress table
        $response = array(
            'error' => 'Error checking email in videoprogress table: ' . mysqli_error($conn)
        );

        // Set the appropriate Content-Type header for JSON response
        header('Content-Type: application/json');

        // Encode the response array as JSON and send it to the client
        echo json_encode($response);
    }
} else {
    // No topic value received
    $response = array(
        'error' => 'No topic value received.'
    );

    // Set the appropriate Content-Type header for JSON response
    header('Content-Type: application/json');

    // Encode the response array as JSON and send it to the client
    echo json_encode($response);
}

// Close the database connection
mysqli_close($conn);
?>
