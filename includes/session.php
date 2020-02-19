<?php
include "db.php";

session_start();

if(isset($_SESSION['user'])) {
	echo "string";
} else {
	echo "none";
}

// $user_check = $_SESSION['user'];
// $sql = "SELECT user_lastname FROM users WHERE user_lastname = '$user_check'";
// $select_session = mysqli_query($connection, $sql);
// $row = mysqli_fetch_assoc($select_session);
// $login_user = $row['username'];
// if(!isset($login_user)) {
// 	header("location: ../index.php");
// }


?>