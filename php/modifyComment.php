<?php
require "connDB.php";

// Parameters for HTTP POST Request
$user_id = $_POST["user_id"];
$event_id = $_POST["event_id"];
$text = $_POST["text"];
$rating = $_POST["rating"];

// Statement for modifying comment in Comments table
$mysql_qry = "UPDATE Comments
              SET Comments.Text = '$text', Comments.Rating = $rating
              WHERE $user_id = Comments.User_id
              AND $event_id = Comments.Event_id";


if (mysqli_query($conn, $mysql_qry)) {
    echo "Successfully modified comment.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
