<?php
require "connDB.php";

$User_id = $_POST["user_id"];
$Domain = $_POST["domain"];
$Name = $_POST["name"];
$Description = $_POST["description"];
$Logo = $_POST["logo"];

$mysql_qry = "SELECT * FROM Student WHERE LOCATE('$Domain',s_email) >0";
$firstResult = mysqli_query($conn, $mysql_qry);
$rowCount = mysqli_num_rows($firstResult);
if ($rowCount < 5) {
	echo "Sorry, you must have 5 users with your domain to register an RSO.";
}
else {
$mysql_qry1 = "INSERT INTO RSO (Name,Description,Logo) VALUES ('$Name','$Description','$Logo')";
$result = mysqli_query($conn, $mysql_qry1);
if ($result) {
  echo "Successfully added to RSO table.";
	$mysql_qry2 = "INSERT INTO Owns (User_id) Values ('$User_id')";
  $newResult = mysqli_query($conn, $mysql_qry2);
  if ($newResult) {
    echo "Successfully added to Owns table.";
  }
  else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

mysqli_close($conn);
?>
