<?php
include ("header.php");

?>
<div class="box1">
    <h2>All Employees</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD EMPLOYEE</button>
</div>
<table class="table table-hover table-striped table-bordered">
    <thead>
        <?php
        include 'connect.php';
        $query = "SELECT * FROM employees";
        $result = mysqli_query($connection, $query);
        // $result=mysqli_query($connection,"SELECT * FROM employee");
        // $result = mysqli_query($connection, "SELECT *, CONCAT(fname, ' ', superssn) AS full_info FROM employee");
        
        $employees = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $employees[] = $row;

        }

        ?>
        <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Age</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($employees as $employee) { ?>
            <tr>
                <td><?php echo $employee['id'] ?></td>
                <td><?php echo $employee['fname'] ?></td>
                <td><?php echo $employee['lname'] ?></td>
                <td><?php echo $employee['age'] ?></td>
                <td><a href="update.php?id=<?php echo $employee['id']; ?>" class="btn btn-success">Update</a></td>
                <td><a href="delete.php?id=<?php echo $employee['id']; ?>" class="btn btn-danger">Delete</a></td>


            </tr>

        <?php } ?>
    </tbody>

</table>
<?php
if (isset($_GET['insert_msg'])) {
    echo "<h5>.$_GET[insert_msg].</h5>";

}
?>
<!-- Modal -->
<form action="insert.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Employee</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" name="id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" name="lname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" name="age" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" value="ADD" name="add-employee">
                </div>
            </div>
        </div>
    </div>
</form>
<?php
include ("footer.php");
?>