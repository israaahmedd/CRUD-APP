
<?php include "connect.php"; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "DELETE FROM `employees` WHERE `id` = '$id'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Error: " . mysqli_error($connection));
    } else {
        header("location:index.php"); 
    }
}
?>




