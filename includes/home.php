<!-- Header-->
<header class="bg-primary bg-gradient text-white">
    <div class="container px-4 text-center">
        <h1 class="fw-bolder">Welcome to the Task Manager</h1>
        <p class="lead">A simplified way of setting your goals, and keeping track of them</p>
        <a class="btn btn-lg btn-light" href="#tasks">Discover your tasks!</a>
    </div>
</header>
<!-- About section-->
<section class="bg-light" id="tasks">
    <div class=" px-2">
        <div class="row gx-4 justify-content-center">
            <div class="col">

                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|} px-4">
                            <div class="col-md-9  ">
                                <h4>Tasks List</h4>
                            </div>
                            <div class="col  ">
                                <a href="addtask.php" class="btn btn-primary">Add New Task</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if ($result->num_rows > 0) { ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Task Name</th>
                                        <th scope="col">Created On</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $p = 1;
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        // Do something with each row
                                
                                        ?>
                                        <tr>
                                            <th scope="row">
                                                <?php echo $p; ?>
                                            </th>
                                            <td>
                                                <?php echo $row["task_name"] ?>
                                            </td>
                                            <td>
                                                <?php echo date("d-m-Y", strtotime($row["created_at"])) ?>
                                            </td>
                                            <td>
                                                <?php
                                                $status = $row["status"];
                                                $pillClass = "";
                                                switch ($status) {
                                                    case "Pending":
                                                        $pillClass = "btn btn-danger"; // Red for Pending
                                                        break;
                                                    case "In Progress":
                                                        $pillClass = "btn btn-warning"; // Yellow for On Progress
                                                        break;
                                                    case "Completed":
                                                        $pillClass = "btn btn-success"; // Green for Completed
                                                        break;
                                                    default:
                                                        $pillClass = "btn btn-secondary"; // Default (optional)
                                                }
                                                ?>

                                                <span class="<?php echo $pillClass; ?>">
                                                    <?php echo $status; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                                                    <div class="col-md-3">
                                                        <a href="viewtask.php?task=<?php echo $row['id'] ?>"
                                                            class="btn btn-primary">View</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                        $p++;
                                    }

                                    $conn->close(); ?>
                                </tbody>
                            </table>
                        <?php } else {
                            echo "No Tasks Found";
                        } ?>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>