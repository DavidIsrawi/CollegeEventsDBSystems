<?php
require "connDB.php";

// Parameters for HTTP POST Request
$User_id = $_POST["user_id"];
$RSO_id = $_POST["rso_id"];

// Insert new member to the Follows table
$mysql_qry1 = "INSERT INTO Follows (User_id,RSO_id) VALUES ('$User_id','$RSO_id')";
$result = mysqli_query($conn, $mysql_qry1);
if ($result) {
  // Statement for returning details of the RSO just joined
  $mysql_qry2 = "SELECT * FROM RSO R WHERE $RSO_id = R.RSO_id";
  $newResult = mysqli_query($conn, $mysql_qry2);
  if ($newResult) {
      while ($row=mysqli_fetch_assoc($newResult)) {
      $array[] = $row;
    }
  }
  else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
if ($array != NULL) {
	header('Content-Type:Application/json');
	echo json_encode($array);
}
mysqli_close($conn);
?>
