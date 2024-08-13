<?php
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "crud_operation");
$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
// var_dump($connection);
if (!$connection) 
{
    die("No connection");
}
else
{
    // echo"yes";
}  



