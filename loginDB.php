<?php
require "connDB.php";
$User_id = $_POST["user_id"];
$Password = $_POST["password"];

$mysql_qry1 = "SELECT * FROM Student WHERE User_id = '$User_id';";
$result = mysqli_query($conn, $mysql_qry1);
$rowCount = mysqli_num_rows($result);
if ($rowCount < 1) {
	echo "User ID not found.";
}
else {
$query = "SELECT * FROM Student WHERE User_id = '$User_id' AND Password LIKE '$Password';";
$result = mysqli_query($conn ,$query);
if(mysqli_num_rows($result) > 0) {
printf ("Login Successful\n");
while ($row=mysqli_fetch_row($result))
    {
     // echo "Login Successful";
    // printf ("<br>(%s %s)",$row[2],$row[1]);
    }
}
else {
echo "Invalid Password";
}
}
mysqli_close($conn);
