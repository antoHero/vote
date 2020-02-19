<?php include "includes/header.php";?>
<?php include "includes/sidebar.php";?> 
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">

                  <?php
      session_start();

      if(isset($_GET['view'])) {
          $result_id =  $_GET['view'];

          $sql = "SELECT * FROM position WHERE id='$result_id'";
          $select_position = mysqli_query($connection, $sql);
          $row = mysqli_fetch_assoc($select_position);
          $p_name = $row['name'];
          $p_id = $row['id'];
        }

      ?>

      <h6 class="border-bottom border-gray pb-2 mb-0">View Results for <?php echo $p_name;?></h6>  
      
      <?php

      ##Get position_ID
      $sql = "SELECT * FROM votes WHERE position_id = '$result_id'";
      $get_names = mysqli_query($connection, $sql);
      // $row = mysqli_fetch_assoc($get_names);
      // $vote_count = mysqli_num_rows($get_names);
      // $id = $row['id'];
      // $name_of_candidate = $row['candidate_name'];
      // $position_id = $row['position_id'];
      
      ?>

      
      <table class="table table-striped">
        <thead>
          <tr>
            <th>S/N</th>
            <th>Candidate Name</th>
            <th>Number of Votes</th>
          </tr>
          <tbody>
      <?php

        $id = 1;
        if(mysqli_num_rows($get_names) == 0) {
          echo "<p class='alert alert-danger'>No vote has been cast for this Position.</p>";
        } else {
          $query = "SELECT votes.candidate_name, COUNT(*) FROM votes,position WHERE votes.position_id=position.id GROUP BY votes.candidate_name";
          $new_query = mysqli_query($connection, $query);
          foreach ($new_query as $key) {
            echo "<tr>";
            echo "<td>".$id++."</td>";
            echo "<td>".$key['candidate_name']."</td>";
            echo "<td>".$key['COUNT(*)']."</td>";
            echo "</tr>";
          }

          
          ?>

          </tbody>
        </thead>
      </table>
      
        <?php } ?>

      
  </div>
              </div>
            </div>
          </div>
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include "includes/footer.php";?>

