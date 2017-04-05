<?php
require "connDB.php";

$RUser_id = $_POST["ruser_id"];
$AUser_id = $_POST["auser_id"];
$RSO_id = $_POST["rso_id"];

$mysql_qry = "UPDATE Follows, Owns
              SET Follows.Status = 'Approved'
              WHERE $RUser_id = Owns.User_id
              AND Owns.RSO_id = Follows.RSO_id
              AND $AUser_id = Follows.User_id";

$result = mysqli_query($conn, $mysql_qry);
if ($result) {
  	echo "Student is approved.";
  }
else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
