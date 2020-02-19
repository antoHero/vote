<?php include "includes/header.php";?>




<div class="main bg" role="main">
  <div class="main-inner">
    <div class="container">
        
        <div class="bg-text text-center">
        <h5 class="display-3 text-center">Welcome to CSC VOTE!</h5>
        <p class="lead"><b>To begin, click the button below or you can read our news from the navigation above.</b></p>
        <?php if(isset($_SESSION['user'])) :?>
          <p class="text-center" style="padding-bottom: 15px;"><a class="btn btn-success btn-lg" href="users/results.php" role="button">Goto Results</a></p>
          <?php else: ?>
        <p class="text-center" style="padding-bottom: 15px;"><a class="btn btn-success btn-lg" href="login.php" role="button">Learn more</a></p> 
      <?php endif ?>
      </div>
        
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
