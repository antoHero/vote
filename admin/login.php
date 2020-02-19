<?php
session_start();
include "includes/functions.php";

if (isset($_POST['submit'])) {
    $matric = $_POST['matric'];
    $password = $_POST['password'];

    if(empty($matric)) {
      echo "<p class='alert alert-danger text-center'>Matric Number is Required.</p>";
    }

    if(empty($password)) {
      echo "<p class='alert alert-danger text-center'>Password is Required.</p>";
    }

    $sql = "SELECT * FROM users WHERE user_matric='$matric'";
    $select_matric = mysqli_query($connection, $sql);
    if(mysqli_num_rows($select_matric) == 1) {
      //check if user is admin or voter
      $logged_in_user = mysqli_fetch_assoc($select_matric);
      if(password_verify($password, $logged_in_user['password'])) {
        if($logged_in_user['user_role'] == 1){
        $_SESSION['user'] = $logged_in_user['user_lastname'];
        header("location: admin/index.php");
        } else {
          $_SESSION['user'] = $logged_in_user['user_lastname'];
          //$_SESSION['user'] = $logged_in_user['user_lastname'];
          header("location: index.php");
        }
      } else {
        echo "<p class='alert alert-danger text-center'>Password is Incorrect.</p>";
      }
      
      
    } else {
      echo "<p class='alert alert-danger text-center'>Wrong Matric Number/Password Combination.</p>";
    }

    
    }



?>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
<style type="text/css">
    

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

</style>
<title>Login</title>
<div class="main" style="padding-top: 100px;">
    <form class="form-signin" action="login.php" method="post">
  
      <h1 class="h3 mb-3 font-weight-normal text-center">CSC VOTES</h1>
            <p class="text-center">Sign in to your account</p>
      <label for="matric" class="sr-only">Matric Number</label>
      <input type="text" id="inputEmail" name="matric" class="form-control" placeholder="Matric Number">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
      <div class="checkbox mb-3">
        <label>

        </label>
      </div>
      <button class="btn btn-lg btn-success btn-block" type="submit" name="submit">Sign in</button>
    </form>
    <p class="mt-5 mb-3 text-muted text-center">Don't have an account? Register <a href="register.php">here</a>.</p>
      <p class="mt-5 mb-3 text-muted text-center">&copy; <?php echo date('Y');?> CSCVOTES</p>
</div>
<!-- /main -->
