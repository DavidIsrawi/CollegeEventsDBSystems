<?php
require "connDB.php";

// Parameters of the HTTP Post Request
$user_id = $_POST["user_id"];
$event_id = $_POST["event_id"];
$text = $_POST["text"];
$rating = $_POST["rating"];
date_default_timezone_set("America/New_York");
$thisDate = date('Y-m-d h:i:sa');

// Statment for inserting comment to the Comments table
$mysql_qry = "INSERT INTO Comments (user_id,event_id,text,rating,date)
              Values ('$user_id', '$event_id','$text','$rating','$thisDate')";
if (mysqli_query($conn, $mysql_qry)) {
    echo "Successfully added comment.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


?>
