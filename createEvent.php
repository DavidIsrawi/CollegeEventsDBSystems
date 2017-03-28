<?php
require "connDB.php";

$Event_id = $_POST["event_id"];
$Name = $_POST["name"];
$Category = $_POST["category"];
$Type = $_POST["type"];
$Start_time = $_POST["start_time"];
$End_time = $_POST["end_time"];
$Start_date = $_POST["start_date"];
$End_date = $_POST["end_date"];
$Contact_name = $_POST["contact_name"];
$Description = $_POST["description"];
$Contact_email = $_POST["contact_email"];
$Location_name = $_POST["location_name"];
$Tags = $_POST["tags"];
$Status = (isset($_POST['status'])) ? $_POST['status'] : 'Pending';

$mysql_qry1 = "SELECT * FROM Event WHERE Location_name LIKE '$Location_name' AND Start_date = '$Start_date' AND Start_time = '$Start_time' OR Location_name LIKE '$Location_name' AND End_date = '$End_date' AND End_time = '$End_time';";
$result = mysqli_query($conn, $mysql_qry1);
if ($result) {
$rowCount = mysqli_num_rows($result);
if ($rowCount > 0) {
	echo "Time and Location Reserved";
}
else {
  $mysql_qry2 = "INSERT INTO Event (Event_id,Name,Category,Type,Start_time,End_time,Start_date,End_date,Contact_name,Description,Contact_email,Location_name,Tags,Status)
  VALUES ('$Event_id','$Name','$Category','$Type','$Start_time','$End_time','$Start_date','$End_date','$Contact_name','$Description','$Contact_email','$Location_name','$Tags','$Status');";
  $result2 = mysqli_query($conn, $mysql_qry2);
  if ($result2) {
    echo "Successfully added Event.";
  }
  else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
