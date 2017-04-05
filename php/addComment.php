<?php
require "connDB.php";

$user_id = $_POST["user_id"];
$event_id = $_POST["event_id"];
$text = $_POST["text"];
$rating = $_POST["rating"];
$mysql_qry = "INSERT INTO Comments (user_id,event_id,text,rating)
              Values ('$user_id', '$event_id','$text','$rating')";
if (mysqli_query($conn, $mysql_qry)) {
    echo "Successfully added comment.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
