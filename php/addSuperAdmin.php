<?php
require "connDB.php";

$user_id = $_POST["user_id"];
$password = $_POST["password"];
$mysql_qry = "INSERT INTO SuperAdmin (user_id,password) Values ('$user_id', '$password')";
if (mysqli_query($conn, $mysql_qry)) {
    echo "Welcome $user_id";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
