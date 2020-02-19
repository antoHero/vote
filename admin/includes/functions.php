<? include 'db.php';

function getTotalUsers() {
	global $connection;
	$sql = "SELECT COUNT(*) FROM users";
	$get_users = mysqli_query($connection, $sql);
	$row = mysqli_fetch_row($get_users);
	$count = $row[0];
}







?>