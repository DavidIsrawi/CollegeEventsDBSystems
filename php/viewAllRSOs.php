<?php
require "connDB.php";

$mysql_qry1 = "SELECT * FROM RSO";
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
