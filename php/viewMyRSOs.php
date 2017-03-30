<?php
require "connDB.php";

$User_id = $_GET["user_id"];

$mysql_qry1 = "SELECT R.*
FROM Follows F, RSO R
WHERE $User_id = F.User_id
AND F.RSO_id = R.RSO_id
AND F.Status = 'Approved'";
$result = mysqli_query($conn, $mysql_qry1);
if ($result) {
			while ($row=mysqli_fetch_assoc($result))
			     {
						 $array[] = $row;
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
