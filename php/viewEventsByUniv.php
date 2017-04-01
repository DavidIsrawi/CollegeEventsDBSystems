<?php
require "connDB.php";

$School_id = $_GET["school_id"];
$U_id = $_GET["u_id"];
$User_id = $_GET["user_id"];

//header('Content-Type:Application/json'); line 29 and 14-
$mysql_qry1 = "SELECT E.*
FROM Event E, Creates C, Student S1
WHERE E.Status = 'Approved'
AND E.Category = 'Public'
AND C.Event_id = E.Event_id
AND C.User_id = S1.User_id
AND $School_id = S1.U_id
UNION
SELECT E1.*
FROM Event E1,  Creates C1, Student S
WHERE E1.Status = 'Approved'
AND E1.Category = 'Private'
AND E1.Event_id = C1.Event_id
AND C1.User_id = S.User_id
AND $U_id = S.U_id
AND $School_id = S.U_id
UNION
SELECT E2.*
FROM Event E2, Hosts H, Follows F
WHERE E2.Status = 'Approved'
AND E2.Event_id = H.Event_id
AND H.RSO_id = F.RSO_id
AND $School_id = $U_id
AND $User_id = F.User_id";

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
