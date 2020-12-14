<?php include "includes/header.php";?>
<?php include 'includes/db.php';
  
  //var_dump($connection);
  $target_dir = "images/";
  if(isset($_POST['register'])) {
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $matric = mysqli_real_escape_string($connection, $_POST['matric']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $user_role = $_POST['user_role'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $password2 = $_POST['password_2'];
    $image = $target_dir . basename($_FILES['image']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    
    $sql = "SELECT * FROM users WHERE user_matric = '$matric'";
    $select_user = mysqli_query($connection, $sql);
    //var_dump($select_user);
    if(mysqli_num_rows($select_user) > 0) {
      echo "<p class='alert alert-danger text-center'>This matric number already exists. Contact Admin</p>";
    }

    else {
      // echo "string";
      $insert = "INSERT INTO users(password, user_firstname, user_lastname, user_matric, email, user_role, phone) VALUES('$password', '$firstname', '$lastname', '$matric', '$email', '$user_role', '$phone')";
      // $insert .= "VALUES('$password', '$firstname', '$lastname', '$matric', '$user_role')";
      $register = mysqli_query($connection, $insert);
      //var_dump($register);
      if($register) {
        echo "<p class='alert alert-success text-center'>Registration successful.</p>";
        echo "<p class='text-center text-muted'>Proceed to <a href='login.php'>Login</a></p>";
      } else {
        echo "Error" . mysqli_error($connection);
      }
    }

    

  }
  
?>

<title>Apply</title>

<main role="main" class="container">
 

  <div class="main-inner">
    <div class="container" style="padding-left: 30%">
        <h1 style="padding: 10px 0 20px 0;">Register</h1>
        
        <div class="col-sm-6">
            <form enctype="multipart/form-data" action="register.php" method="post">
              <div class="form-row">
                <div class="form-group col-md-12">
                  
                  <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname">
                </div>
                <div class="form-group col-md-12">
                  <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname">
                </div>
                <div class="form-group col-md-12">
                  <input type="text" class="form-control" name="matric" id="matric" placeholder="Matric">
                </div>
                <div class="form-group col-md-12">
                  <input type="email" class="form-control" name="email" id="matric" placeholder="Email">
                </div>
                <div class="form-group col-md-12">
                  <input type="hidden" class="form-control" name="user_role" id="role" value="2">
                </div>

                <div class="form-group col-md-12">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <div class="form-group col-md-12">
                  <input type="password" class="form-control" name="password_2" id="password" placeholder="Confirm Password">
                <div class="form-group col-md-12">
                  <input type="text" class="form-control" name="phone" id="password" placeholder="Phone Number">
                </div>
                </div>
              </div>
                
              <button type="submit" class="form-control btn btn-success" name="register">Register</button>
            </form>
            <p class="mt-5 mb-3 text-muted text-center">Already have an account? Login <a href="login.php">here</a>.
        </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
</main>


