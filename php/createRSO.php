<?php
require "connDB.php";

$User_id = $_POST["user_id"];
$User_id1 = $_POST["user_id1"];
$User_id2 = $_POST["user_id2"];
$User_id3 = $_POST["user_id3"];
$User_id4 = $_POST["user_id4"];
$User_id5 = $_POST["user_id5"];
$Domain = $_POST["domain"];
$Name = $_POST["name"];
$Description = $_POST["description"];
$Logo = $_POST["logo"];

$mysql_qry = "SELECT *
FROM Student
WHERE '$User_id' = User_id
AND LOCATE('$Domain',s_email) >0
UNION
SELECT *
FROM Student
WHERE '$User_id1' = User_id
AND LOCATE('$Domain',s_email) >0
UNION
SELECT *
FROM Student
WHERE '$User_id2' = User_id
AND LOCATE('$Domain',s_email) >0
UNION
SELECT *
FROM Student
WHERE '$User_id3' = User_id
AND LOCATE('$Domain',s_email) >0
UNION
SELECT *
FROM Student
WHERE '$User_id4' = User_id
AND LOCATE('$Domain',s_email) >0
UNION
SELECT *
FROM Student
WHERE '$User_id5' = User_id
AND LOCATE('$Domain',s_email) >0";

$firstResult = mysqli_query($conn, $mysql_qry);
$rowCount = mysqli_num_rows($firstResult);
if ($rowCount < 6) {
	echo "Sorry, you must have 5 other users with your domain to register an RSO.";
}
else {
$mysql_qry1 = "INSERT INTO RSO (Name,Description,Logo) VALUES ('$Name','$Description','$Logo')";
$result = mysqli_query($conn, $mysql_qry1);
if ($result) {
  echo "Successfully added to RSO table.";
	$mysql_qry2 = "INSERT INTO Owns (User_id) Values ('$User_id')";
  $newResult = mysqli_query($conn, $mysql_qry2);
  if ($newResult) {
    echo "Successfully added to Owns table.";
		$mysql_qry3 = "SELECT * FROM Owns WHERE User_id = '$User_id' ORDER BY RSO_id DESC;";
		$result3 =  mysqli_query($conn, $mysql_qry3);
		while($row = mysqli_fetch_assoc($result3)) {
			$RSO_id = $row['RSO_id'];
			$mysql_qry4 = "INSERT INTO Follows (User_id,RSO_id,Status)
										 VALUES ('$User_id','$RSO_id','Approved'),
										 ('$User_id1','$RSO_id','Approved'),
										 ('$User_id2','$RSO_id','Approved'),
										 ('$User_id3','$RSO_id','Approved'),
										 ('$User_id4','$RSO_id','Approved'),
										 ('$User_id5','$RSO_id','Approved');";
			 $result4 = mysqli_query($conn, $mysql_qry4);
			 if ($result4) {
				 echo "Succesffuly added all members to Follows table.";
				 break;
			 }
			 else {
				 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			 }
		}
  }
  else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

mysqli_close($conn);
?>
