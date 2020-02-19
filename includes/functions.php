<?php
include "db.php";
session_start();
$errors = array();


if(isset($_POST['register'])) {
	echo "123";
	register();
}

function register() {
	global $connection;
    $matric_no = $_POST['user_matric'];
    $firstname = e($connection, $_POST['user_firstname']);
    $lastname = e($connection, $_POST['user_lastname']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $password2 = e($_POST['password_2']);
    $image = $_FILES['user_image']['name'];
     

    $sql = "SELECT * FROM voters WHERE matric_no = '$matric_no'";
    $query = $connection->query($sql);
    if(mysqli_num_rows($query) > 0) {
      array_push($errors, "Matric number already exists, contact Admin");
    }   

    if($empty($matric)) {
      array_push($errors, "Please provide your matric number");
    }

    else if($empty($firstname)) {
      array_push($errors, "Please provide your Firstname");
    }
    else if($empty($lastname)) {
      array_push($errors, "Please provide your Lastname");
    }
    else if($empty($matric)) {
      array_push($errors, "Please enter a password");
    }

    else if($password != $password2) {
      array_push($errors, "Passwords do not match");
    }
     
        
    if(!empty($image)) {
      move_uploaded_file($_FILES['user_image']['tmp_name'], 'images'.$image);
    } 
        
    

    else {

      $query = "INSERT INTO users(matric_no, firstname, lastname, password, image) ";
      $query .= "VALUES('$matric_no', '$firstname', '$lastname', '$password', '$image')";
      $result = mysqli_query($connection, $query);
      if(!$result) {
       die(mysqli_error($connection));
      } else {
            $_SESSION['success'] = "Registration successful";
            header("location: login.php");
          }
        }
  
}

function getUserById($id) {
	global $connection;
	$query = "SELECT * FROM users WHERE id=" .$id;
	$select_id = mysqli_query($connection, $query);

	$user = mysqli_fetch_assoc($select_id);
	return $user;
}

function e($val) {
	global $connection;
	return mysqli_real_escape_string($connection, trim($val));
}

function display_error() {
	global $errors;

	if(count($errors) > 0) {
		echo "<p class='alert alert-danger'>";
			foreach ($$errors as $error) {
				echo $error . '<br>';
			}
		echo "</p>";
	}
}

function isLoggedIn() {
	if(isset($_SESSION['user_matric'])) {
		return true;
	} else {
		return false;
	}
}









?>