<?php
require "connDB.php";

$Event_id = $_POST["event_id"];

$mysql_qry = "UPDATE Event
              SET Event.Status = 'Approved'
              WHERE $Event_id = Event.Event_id";

$result = mysqli_query($conn, $mysql_qry);
if ($result) {
  	echo "Event is approved.";
  }
else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
