<?php include('db/config.php');?>
<?php
session_start();
$otpErr ="";
$otp = "";

function cleanInput($data) {
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $otp = $_POST['otp'];
  // settype($otp, 'integer');

  // var_dump($otp);

  if(empty($otp)) {
      $otpErr = "Enter OTP";
    }

    //check if otp is correct
    $sql = "SELECT * FROM authentication WHERE otp = '$otp' AND expired !=1";
    $result = mysqli_query($connection, $sql);
    $count = mysqli_num_rows($result);
    if(!empty($count)) {
      $update = "UPDATE authentication SET expired=1 WHERE otp='$otp'";
      $query = mysqli_query($connection, $update);

      if($query) {
        header('location: users');
      } else {
        echo "Something bad happened";
      }
    } else {
      echo "Invalid OTP";
    }
  // if(!empty($_POST['verify_otp']) && $_POST['otp'] != '') {
  //   $query = "SELECT * FROM authentication WHERE otp='".$_POST['otp']."' AND expired !=1 AND NOW() <= DATE_ADD(created_at, INTERVAL 1 hour)";
  //   $result = mysqli_query($connection, $query);
  //   $row = mysqli_num_rows($result);
  //   if(!empty($row)) {
  //     $update = 
  //     $updt = mysqli_query('$connection, $update');
  //     if($updt) {
  //     header('location: users/index.php');
  //     } else {
  //       echo "Couldnt update";
  //     }
  //   } else {
  //     echo "<p class='alert alert-danger'>Invalid OTP</p>";
  //   }
  // } 
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
    <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  
      <h1 class="h3 mb-3 font-weight-normal text-center">CSC VOTES</h1>
            <p class="text-center">Check Your Email For OTP</p>
      <label for="matric" class="sr-only">OTP</label>
      <input type="text" id="inputEmail" name="otp" class="form-control" placeholder="Enter OTP sent to your email">
      <div class="checkbox mb-3">
        <label>

        </label>
      </div>
      <button class="btn btn-lg btn-success btn-block" type="submit" name="verify_otp">Verify</button>
    </form>
      <p class="mt-5 mb-3 text-muted text-center">&copy; <?php echo date('Y');?> CSCVOTES</p>
</div>
<!-- /main -->
