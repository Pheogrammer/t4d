<?php
include 'includes/dbconn.php';

if (isset($_POST['addTask'])) {
    $task = $_POST['task'];
    $status = $_POST['status'];
    $created_at = date('Y-m-d H:i:s');

    $query = "INSERT INTO task_store (task_name, status, created_at) VALUES ('$task', '$status', '$created_at')";
    $result = $conn->query($query);
    header('Location: index.php');
    session_start();
    $_SESSION['message'] = "Task created successfully!";
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
                                <h4>Add New Task</h4>
                            </div>
                            <div class="col  ">
                                <a href="index.php" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="#" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputtask1">Task Name</label>
                                <input type="text" name="task" class="form-control" required id="exampleInputtask1"
                                    aria-describedby="taskHelp" placeholder="Enter task name">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Status</label>
                                <select name="status" class="form-control" required>
                                    <option selected value="Pending">Pending</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Completed">Completed</option>

                                </select>
                            </div>
                            <br>
                            <button type="submit" name="addTask" class="btn btn-primary">Add Task</button> <a
                                href="index.php" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<?php
include 'includes/footer.php';
?>