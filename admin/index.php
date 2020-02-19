<?php include "includes/header.php";?>
<?php include "includes/sidebar.php";?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5">
                    <h2>Welcome back</h2>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body dashboard-tabs p-0">
                  <ul class="nav nav-tabs px-4" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                    </li>
                  </ul>
                  <div class="tab-content py-0 px-0">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total # of users</small>
                            <?php 

                              $sql = "SELECT * FROM users";
                              $select_users = mysqli_query($connection, $sql);
                              $rows = mysqli_num_rows($select_users);
                              echo $rows;


                            ?>
                          
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total # of News</small>
                            
                            <h5 class="mr-2 mb-0"><?php 

                              $sql = "SELECT * FROM posts";
                              $select_users = mysqli_query($connection, $sql);
                              $rows = mysqli_num_rows($select_users);
                              echo $rows;


                            ?></h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total # of Votes</small>
                            <h5 class="mr-2 mb-0"><?php 

                              $sql = "SELECT * FROM votes";
                              $select_users = mysqli_query($connection, $sql);
                              $rows = mysqli_num_rows($select_users);
                              echo $rows;


                            ?></h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total # of Candidates</small>
                            <h5 class="mr-2 mb-0"><?php 

                              $sql = "SELECT * FROM candidates";
                              $select_users = mysqli_query($connection, $sql);
                              $rows = mysqli_num_rows($select_users);
                              echo $rows;


                            ?></h5>
                          </div>
                        </div>
                        <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total # of Positions</small>
                            <h5 class="mr-2 mb-0"><?php 

                              $sql = "SELECT * FROM position";
                              $select_users = mysqli_query($connection, $sql);
                              $rows = mysqli_num_rows($select_users);
                              echo $rows;


                            ?></h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Recently Added Candidates</p>
                  <div class="table-responsive">
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

                          $sql = "SELECT * FROM position WHERE id = '$position_id'";
                          $get_position = mysqli_query($connection, $sql);
                          $row = mysqli_fetch_assoc($get_position);
                          $pos_id = $row['id'];
                          $position_name = $row['name'];

                          $sql = "SELECT * FROM level WHERE id = '$candidate_level'";
                          $get_level = mysqli_query($connection, $sql);
                          $row = mysqli_fetch_assoc($get_level);
                          $level_id = $row['id'];
                          $level_name = $row['level'];

                          ?>

                        
                      <tr>
                        <td><?php echo $candidate_id;?></td>
                        <td><?php echo $position_name;?></td>
                        <td><?php echo $level_name;?></td>
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
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include "includes/footer.php";?>

