<?php include "includes/header.php";?>
<?php include "includes/sidebar.php";?> 
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5">
                    <h2>Contestants</h2>
                    
                  </div>
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
                  <form class="form-group">

                  </form>
                  <h3 class="text-center">View Contestants</h3>

                  <table class="table table-hover table-fluid">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Position</th>
                        <th>Level</th>
                        <th>Matric</th>
                        <th>Image</th>
                        <th>Date Applied</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                        $sql = "SELECT * FROM candidates ORDER BY id DESC";
                        $select_postions = mysqli_query($connection, $sql);
                        if(mysqli_num_rows($select_postions) < 1) {
                          echo "<p class='alert alert-danger'>No Candidates have applied for this year's election.</p>";
                        } 

                        while($row = mysqli_fetch_assoc($select_postions)) {
                          $candidate_id = $row['id'];
                          $position_id = $row['position_id'];
                          $candidate_level = $row['level_id'];
                          $candidate_matric = $row['matric'];
                          $candidate_firstname = $row['firstname'];
                          $candidate_lastname = $row['lastname'];
                          $candidate_bio = $row['bio'];
                          $candidate_image = $row['image'];
                          $candidate_appliedOn = $row['createdOn'];

                          ?>

                        
                      <tr>
                        <td><?php echo $candidate_id;?></td>
                        <td><?php echo $position_id;?></td>
                        <td><?php echo $candidate_level;?></td>
                        <td><?php echo $candidate_matric;?></td>
                        <td><img class="img-responsive" src="http://localhost:8888/vote/images/<?php echo $candidate_image;?>" alt="Image"></td>
                        <td><?php echo $candidate_appliedOn;?></td>
                      </tr>
                      <?php } ?>

                      <?php

                        if(isset($_GET['delete'])) {
                          $candidate_id = $_GET['delete'];
                          $sql = "DELETE FROM candidates WHERE id = '$candidate_id'";
                          $delete_query = mysqli_query($connection, $sql);
                          if($delete_query) {
                            echo "<p class='alert alert-danger text-center'>Candidate deleted successfully</p>";
                          }
                        }

                      ?>
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include "includes/footer.php";?>

