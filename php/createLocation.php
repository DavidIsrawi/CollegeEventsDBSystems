<?php
require "connDB.php";

$Location_name = $_POST["location_name"];
$Latitude = $_POST["latitude"];
$Longitude = $_POST["longitude"];

$mysql_qry = "INSERT INTO Location (Location_name,Latitude,Longitude) Values ('$Location_name', '$Latitude', '$Longitude')";
if (mysqli_query($conn, $mysql_qry)) {
    echo "Successfully added $Location_name";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
