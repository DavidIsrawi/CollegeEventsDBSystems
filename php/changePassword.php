<?php
require "connDB.php";

$User_id = $_POST["user_id"];
$oldPassword = $_POST["oldPassword"];
$newPassword = $_POST["newPassword"];

$query = "SELECT * FROM Student WHERE User_id LIKE '$User_id'";
$result = mysqli_query($conn ,$query);
if($result) {
if(mysqli_num_rows($result) > 0) {
while ($row=mysqli_fetch_assoc($result)) {
	if($oldPassword != $row['Password']) {
		echo "Error: Original Password Incorrect";
	}
	else {
		$newQuery = "UPDATE Student SET Password = '$newPassword' WHERE User_id = $User_id;";
		$newResult = mysqli_query($conn ,$newQuery);
		if($newResult) {
			echo "Password Change Successful";
			}
		else {
			echo "Password Change Unsuccessful";
		}
	}
	}
}
else {
	echo "Error: Invalid Account";
}
}

else {
	echo "Error: Server Failure";
}


mysqli_close($conn);
?>
