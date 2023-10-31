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

                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        // Do something with each row
                                        ?>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>
                                                <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                                                    <div class="col-md-3">
                                                        <a href="" class="btn btn-primary">View</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
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