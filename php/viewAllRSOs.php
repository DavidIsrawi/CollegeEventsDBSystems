<?php
require "connDB.php";

$U_id = $_GET["u_id"];

$mysql_qry1 = "SELECT *
							 FROM RSO R, Student S, Owns O
							 WHERE R.RSO_id = O.RSO_id
							 AND O.User_id = S.User_id
							 AND '$U_id' = S.U_id";
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
