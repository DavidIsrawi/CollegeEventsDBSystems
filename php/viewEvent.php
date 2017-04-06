<?php
require "connDB.php";

$Event_id = $_GET["event_id"];

//header('Content-Type:Application/json');
$mysql_qry1 =  "SELECT E.*,L.Latitude,L.Longitude
                FROM Event E, Location L
                WHERE E.Event_id = '$Event_id'
                AND L.Location_name = E.Location_name";

$result = mysqli_query($conn, $mysql_qry1);
if ($result) {
			while ($row=mysqli_fetch_assoc($result))
			     {
						 $array[] = $row;
            echo json_encode($row);
					 }
}
else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// if ($array != NULL) {
// 	header('Content-Type:Application/json');
// 	// echo json_encode($row);
// }

mysqli_close($conn);
?>
