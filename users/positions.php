<?php include "includes/header.php";?>
<?php include "includes/functions.php";?>
<title>vote</title>

<main role="main" class="container">
 

  <div class="my-3 p-3 bg-white rounded shadow-sm">
      <h6 class="border-bottom border-gray pb-2 mb-0">View All Positions</h6>  
      <?php

      if(isset($_GET['vote'])) {
          $p_id =  $_GET['vote'];
        }

      ?>
      <?php

      if(isset($_POST['submit'])) {
        $position_id = $_POST['position'];
        $name = $_POST['cand_name'] ? mysqli_real_escape_string($_POST['cand_name']) : 'DEFAULT_VALUE';
        $user_id = "null";

        if(empty($candidate_name)) {
          echo "<p class='alert alert-danger text-center'>Select a candidate</p>";
        } else {
          $sql = "INSERT INTO votes(candidate_name, position_id, user_id) VALUES('$name', '$position_id', '$user_id')";
          $query = mysqli_query($connection, $sql);
          if($query) {
            echo "<p class='alert alert-success text-center'>You have voted for $candidate_name.</p>";
            echo "<br>";
            echo "<a href=''><< Go back</a>";
          } else {
            echo "<p class='alert alert-danger text-center'>Query Failed!!!!</p>" . mysqli_error($connection);
          }
        }
      }



      ?>
      
      <ul>
        <?php getPositionsList();?>

      </ul> 
      
  </div>
</main>


<?php include "includes/footer.php";?>