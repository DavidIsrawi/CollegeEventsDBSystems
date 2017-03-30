<?php
require "connDB.php";
// Select from Owns to get the RSO_id
// and Follows to get the rows that are set to 'Pending'

$U_id = $_GET["u_id"];

$mysql_qry = "SELECT *
              FROM Event E, Creates C, Student S
              WHERE E.Status = 'Pending'
              AND E.Event_id = C.Event_id
              AND C.User_id = S.User_id
              AND $U_id = S.U_id";
$result = mysqli_query($conn, $mysql_qry);
if ($result) {
  $rowCount = mysqli_num_rows($result);
  if ($rowCount > 0) {
      while ($row=mysqli_fetch_assoc($result)) {
      $array[] = $row;
    }
  }
  else {
    echo "0 Pending Events";
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
