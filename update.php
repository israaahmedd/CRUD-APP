<?php include "header.php"; ?>
<?php include "connect.php"; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "SELECT * FROM `employees` WHERE `id` = '$id'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Error: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}
?>

<?php
if (isset($_POST["update-employee"])) {
    if (isset($_GET['id'])) {
        $id_new = $_GET['id'];
    }
    // $id = $_POST['id']; // Commented out since 'id' should not be updated
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    
    // Corrected UPDATE query
    $query = "UPDATE `employees` SET `fname` = '$fname', `lname` = '$lname', `age` = '$age' WHERE `id` = '$id_new'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Error: " . mysqli_error($connection));
    } else {
        header("location:index.php?update_msg=successfully updated");
    }
}
?>

<form action="update.php?id=<?php echo $id; ?>" method="POST">
    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" name="id" class="form-control" value="<?php echo $row['id']; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="fname">First Name</label>
        <input type="text" name="fname" class="form-control" value="<?php echo $row['fname']; ?>">
    </div>
    <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="text" name="lname" class="form-control" value="<?php echo $row['lname']; ?>">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" name="age" class="form-control" value="<?php echo $row['age']; ?>">
    </div>
    <input type="submit" class="btn btn-success mt-2" value="UPDATE" name="update-employee">
</form>

<?php include "footer.php"; ?>
