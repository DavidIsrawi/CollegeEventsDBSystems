<?php
require "connDB.php";

$Date = $_GET["date"];
$U_id = $_GET["u_id"];

//header('Content-Type:Application/json');
$mysql_qry1 = "SELECT *
							 FROM Event E, Creates C, Student S
							 WHERE Start_date LIKE '$Date'
							 AND E.Event_id = C.Event_id
							 AND C.User_id = S.User_id
							 AND $U_id = S.U_id
							 LIMIT 10";
$result = mysqli_query($conn, $mysql_qry1);
if ($result) {
			while ($row=mysqli_fetch_assoc($result))
			     {
						 $array[] = $row;
            //  echo json_encode($row);
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
