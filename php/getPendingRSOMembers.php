<?php
require "connDB.php";

$User_id = $_GET["user_id"];

// Select from Owns to get the RSO_id
// and Follows to get the rows that are set to 'Pending'

$mysql_qry = "SELECT *
              FROM Owns O, Follows F, Student S
              WHERE $User_id = O.User_id
              AND O.RSO_id = F.RSO_id
              AND F.Status = 'Pending'
              AND F.User_id = S.User_id";
$result = mysqli_query($conn, $mysql_qry);
if ($result) {
  $rowCount = mysqli_num_rows($result);
  if ($rowCount > 0) {
      while ($row=mysqli_fetch_assoc($result)) {
      $array[] = $row;
    }
  }
  else {
    echo "0 Pending Applicants";
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
