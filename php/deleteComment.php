<?php
require "connDB.php";

$user_id = $_POST["user_id"];
$event_id = $_POST["event_id"];

$mysql_qry = "DELETE FROM Comments
              WHERE $user_id = Comments.User_id
              AND $event_id = Comments.Event_id";


if (mysqli_query($conn, $mysql_qry)) {
    echo "Successfully deleted comment.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
