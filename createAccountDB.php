<?php
require "connDB.php";

$User_id = $_POST["user_id"];
$Password = $_POST["password"];
$Name = $_POST["name"];
$S_email = $_POST["s_email"];
$U_id = $_POST["u_id"];

$mysql_qry1 = "SELECT * FROM Student WHERE S_email LIKE '$S_email'";
$result = mysqli_query($conn, $mysql_qry1);
$rowCount = mysqli_num_rows($result);
if ($rowCount > 0) {
	echo "User already registered with that email.";
}
else {

      $mysql_qry = "INSERT INTO Student (User_id,Password,Name,S_email,u_id) Values ('$User_id', '$Password', '$Name', '$S_email','$U_id')";

      if (mysqli_query($conn, $mysql_qry)) {
          echo "Welcome $Name";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
}

mysqli_close($conn);

?>
