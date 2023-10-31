<?php

include 'includes/dbconn.php';

if (isset($_GET['task'])) {
    // Get the task ID and cast it to an integer for safety
    $taskID = (int)$_GET['task'];
    
    // Create a prepared statement
    $sql = "DELETE FROM task_store WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // Bind the task ID parameter to the prepared statement
    $stmt->bind_param("i", $taskID);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // The task was successfully deleted
        header('Location: index.php');
    } else {
        // An error occurred
        // You might want to add error handling here, such as setting a session message
        header('Location: index.php');
    }

    // Close the prepared statement
    $stmt->close();
} else {
    header('Location: index.php');
}


