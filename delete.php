<?php 

include 'includes/dbconn.php';

if (isset($_GET['task'])) {
    $sql = "DELETE FROM task_store WHERE id=" . $_GET['task'] . "";
    $result = $conn->query($sql);

} else {
    header('Location: index.php');

}

