<?php
include 'includes/dbconn.php';

if (isset($_GET['task'])) {
} else {
    header('Location: index.php');

}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM task_store where id=" . $_GET['task'] . "";
$result = $conn->query($sql);


if (isset($_POST['UpdateTask'])) {
    // Get the user inputs
    $task = $_POST['task'];
    $id = $_POST['id'];
    $status = $_POST['status'];
    $updated_at = date('Y-m-d H:i:s');
    
    // Create a prepared statement
    $query = "UPDATE task_store SET task_name = ?, status = ?, updated_at = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    
    // Bind parameters to the prepared statement
    $stmt->bind_param("sssi", $task, $status, $updated_at, $id);
    
    // Execute the prepared statement
    if ($stmt->execute()) {
        session_start();
        $_SESSION['message'] = "Task updated successfully!";
    } else {
        session_start();
        $_SESSION['message'] = "Task update failed!";
    }
    
    // Close the prepared statement
    $stmt->close();
    
    // Redirect to index.php
    header('Location: index.php');
    
    // Close the database connection
    $conn->close();
}

include 'includes/navbar.php';
?>

<section class="bg-light">
    <div class=" px-2">
        <div class="row gx-4 justify-content-center">
            <div class="col">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|} px-4">
                            <div class="col-md-9  ">
                                <h4>Task</h4>
                            </div>

                        </div>
                    </div>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
                            <div class="card-body">
                                <form method="post" action="#" enctype="multipart/form-data">
                                    <input type="text" value="<?php echo $row['id'] ?>" name="id" hidden>
                                    <div class="form-group">
                                        <label for="exampleInputtask1">Task Name</label>
                                        <input type="text" name="task" value="<?php echo $row['task_name'] ?>"
                                            class="form-control" required id="exampleInputtask1" aria-describedby="taskHelp"
                                            placeholder="Enter task name">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Status</label>
                                        <select name="status" class="form-control" required>
                                            <?php echo '<option selected value="' . $row['status'] . '">' . $row['status'] . '</option> '; ?>
                                            '
                                            <option value="Pending">Pending</option>
                                            <option value="In Progress">In Progress</option>
                                            <option value="Completed">Completed</option>

                                        </select>
                                    </div>
                                    <br>
                                    <button type="submit" name="UpdateTask" class="btn btn-primary">Update</button> <a
                                        href="index.php" class="btn btn-warning">Cancel</a> <a
                                        href="delete.php?task=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</a>
                                </form>
                            </div>
                        <?php }
                    } ?>
                </div>


            </div>
        </div>
    </div>
</section>
<?php
include 'includes/footer.php';
?>