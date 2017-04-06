<?php
require "connDB.php";

$User_id = $_GET["user_id"];

$mysql_qry1 = "SELECT E.*
FROM Follows F, Hosts H, Event E
WHERE $User_id = F.User_id
AND F.Status = 'Approved'
AND F.RSO_id = H.RSO_id
AND H.Event_id = E.Event_id";
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
