<?php include "../includes/functions.php";?>
<?php ob_start(); 
  session_start();
  if(!isset($_SESSION['user'])) {
    header("location: ../../vote/login.php");
    exit();
  }

?>

<!DOCTYPE html>
<html>
<head>
  <title>CSCVOTES</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

</html>
<body>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-success">
  <a class="navbar-brand mr-auto mr-lg-0" href="../index.php">CSCVOTES</a>
  <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="positions.php">Cast Vote</a>
          <a class="dropdown-item" href="apply.php">Apply For A Position</a>
            <a class="dropdown-item" href="results.php">View Results</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <?php if(isset($_SESSION['user'])) :?>
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user']?></a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="../logout.php">Logout</a>
          </div>
          <?php else: ?>
        <a class="nav-link" href="#" id="dropdown01" aria-haspopup="true" aria-expanded="false">Login</a>
        <?php endif ?>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
  
<br><br><br>
<h3 class="text-center text-muted">View Manifesto</h3>
<?php
$user_id = $_GET['bio'];
$pos = $_GET['pos'];

$sql = "SELECT * FROM candidates WHERE id='$user_id'";
$query = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($query);
$matric = $row['matric'];
$manifesto = $row['bio'];
$name = $row['firstname'] . " " . $row['lastname'];




?>
<div class="card">
  <div class="card-header">
    <?php echo $matric;?>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $name;?></h5>
    <p class="card-text"><?php echo $manifesto;?></p>
    <a href="vote.php?vote=<?php echo $pos;?>" class="btn btn-primary">Go Back</a>
  </div>
</div>
</div>
<?php include "includes/footer.php";?>