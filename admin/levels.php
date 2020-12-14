<?php include "includes/header.php";?>
<?php include "includes/sidebar.php";?> 
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-5 mr-xl-5">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <?php
                      if(isset($_POST['submit'])) {
                        $level_name = mysqli_real_escape_string($connection, $_POST['level']);

                        if($level_name == "" || empty($level_name)) {
                          echo "<p class='alert alert-danger text-center'>This field cannot be empty.</p>";
                        } else {
                          $sql = "SELECT * FROM level WHERE level = '$level_name'";
                          $select_position = mysqli_query($connection, $sql);
                          if(mysqli_num_rows($select_position) > 0) {
                            echo "<p class='alert alert-danger text-center'>This level already exists.</p>";
                          } else {
                            $insert = "INSERT INTO level (level) VALUES('$level_name')";
                            $insert_level = mysqli_query($connection, $insert);
                            if($insert_level) {
                              echo "<p class='alert alert-success text-center'>Level added successfully.</p>";
                            } else {
                              echo "<p class='alert alert-danger text-center'>Error While Adding Level.</p>" . mysqli_error($connection);
                            }
                          }
                        }
                      }
                    ?>
                <div class="card-body">
                  
                  <form action="levels.php" method="post">
                    <div class="form-group">
                      <label for="exampleFormControlInput1"> Level </label>
                      <input type="text" class="form-control" id="level_name" name="level" placeholder="Enter Level Here">
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit">Add</button>
                  </form>
                  
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h3 class="text-center">View Levels</h3>

                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Level</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                        $sql = "SELECT * FROM level";
                        $select_levels = mysqli_query($connection, $sql);
                        if(mysqli_num_rows($select_levels) < 1) {
                          echo "<p class='alert alert-danger'>No levels have been added.</p>";
                        } 

                        while($row = mysqli_fetch_assoc($select_levels)) {
                          $level_name = $row['level'];
                          $level_id = $row['id'];

                          ?>
                        
                      <tr>
                        <td><?php echo $level_id;?></td>
                        <td><?php echo $level_name;?></td>
                        <td><a href="levels.php?delete=<?php echo $level_id;?>">Delete</a></td>
                      </tr>
                      <?php } ?>
                      <?php

                        if(isset($_GET['delete'])) {
                          $level_id = $_GET['delete'];
                          $sql = "DELETE FROM level WHERE id = '$level_id'";
                          $delete_query = mysqli_query($connection, $sql);
                          if($delete_query) {
                            echo "<p class='alert alert-danger text-center'>Level deleted successfully</p>";
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

