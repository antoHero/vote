<?php include('db/config.php');?>

<?php

  session_start();
  $emailErr = $passwordErr = "";
  $email = $password = "";

  function cleanInput($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);

    return $data;
  }

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = cleanInput($_POST['email']);
    $password = $_POST['password'];
    if(empty($email)) {
      $emailErr = "Enter Email";
    }
    if(empty($password)) {
      $passwordErr = "Enter Password";
    }

    //check if details are correct
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $sql) or die(mysql_error());

    if(mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password, $row['password'])) {
        if($row['user_role'] == 1) {
          session_start();
          $_SESSION['id'] = $row['id'];
          $_SESSION['user_role'] = $row['user_role'];
          $_SESSION['user'] = $row['user_lastname'];

          header('location: /admin');
          exit();
        } else {
          session_start();
          $_SESSION['id'] = $row['id'];
          $_SESSION['user_role'] = $row['user_role'];
          $_SESSION['user'] = $row['user_lastname'];
          $otp = rand(100, 999);
          $from = 'antoakay@gmail.com';

          $headers = 'MIME-Version: 1.0' . '\r\n';
          $headers .= 'Content-type:text\html;charset=UTF-8' . '\r\n';
          $headers .= 'From: antoakay@gmail.com' . '\r\n';
          $messageBody = "Your OTP is: " . $otp;
          $messageBody = wordwrap($messageBody, 70);
          $subject = "One Time Password";
          $mailStatus = mail($email, $subject, $messageBody, $headers);


          if($mailStatus == 1) {
            $insert = "INSERT INTO authentication(otp, expired, created_at) VALUES('".$otp."', 0, '".date('Y:m:d H:i:s')."')";
            $query = mysqli_query($connection, $insert);
            $insertId = mysqli_insert_id($connection);
            if(!empty($insertId)) {
              header('location: authenticate.php');
            }
          }
        }  
      } else {
        echo "<p class='alert alert-danger'>Incorrect Password</p>";
      }
      
    } else {
      echo "<p class='alert alert-danger'>Invalid Email/Password Combination</p>";
    }

  }


?>

<!--  -->
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
    <form class="form-signin" action="" method="post">
  
      <h1 class="h3 mb-3 font-weight-normal text-center">CSC VOTES</h1>
            <p class="text-center">Sign in to your account</p>
      <label for="matric" class="sr-only">Phone Number</label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email Address">
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
