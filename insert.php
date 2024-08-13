<?php
include 'connect.php';

if(isset($_POST["add-employee"])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    
    if($fname == "" || empty($fname)) {
        header("location:index.php?message=you need to fill the input");
    } else {
        // Corrected query with backticks
        $query = "INSERT INTO `employees` (`id`, `fname`, `lname`, `age`) 
                  VALUES ('$id', '$fname', '$lname', '$age')";
        $result = mysqli_query($connection, $query);
       
        
        if(!$result) {
            die("Error: " . mysqli_error($connection));
        } else {
            header("location:index.php?insert_msg=success");
        }
    }
}
?>
