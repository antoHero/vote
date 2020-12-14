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
                  <?php
                    if(isset($_POST['submit'])) {
                      $position_name = mysqli_real_escape_string($connection, $_POST['name']);

                      if($position_name == "" || empty($position_name)) {
                        echo "<p class='alert alert-danger text-center'>This field cannot be empty.</p>";
                      } else {
                        $sql = "SELECT * FROM position WHERE name = '$position_name'";
                        $select_position = mysqli_query($connection, $sql);
                        if(mysqli_num_rows($select_position) > 0) {
                          echo "<p class='alert alert-danger text-center'>This position already exists.</p>";
                        } else {
                          $insert = "INSERT INTO position (name) VALUES('$position_name')";
                          $insert_position = mysqli_query($connection, $insert);
                          if($insert_position) {
                            echo "<p class='alert alert-success text-center'>Position added successfully.</p>";
                          } else {
                            echo "<p class='alert alert-danger text-center'>Error While Adding Position.</p>" . mysqli_error($connection);
                          }
                        }
                      }
                    }
                  ?>
                  <form action="positions.php" method="post">
                    <div class="form-group">
                      <label for="exampleFormControlInput1"> Position </label>
                      <input type="text" class="form-control" id="position_name" name="name" placeholder="Enter Name of Position Here">
                    </div>
                    <button class="btn btn-success" type="submit" name="submit">Add</button>
                  </form>
                  
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h3 class="text-center">View Positions</h3>

                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Position</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                        $sql = "SELECT * FROM position";
                        $select_postions = mysqli_query($connection, $sql);
                        if(mysqli_num_rows($select_postions) < 1) {
                          echo "<p class='alert alert-danger'>No positions have been added.</p>";
                        } 

                        while($row = mysqli_fetch_assoc($select_postions)) {
                          $position_name = $row['name'];
                          $position_id = $row['id'];

                          ?>

                        
                      <tr>
                        <td><?php echo $position_id;?></td>
                        <td><?php echo $position_name;?></td>
                        <td><a href="positions.php?delete=<?php echo $position_id;?>">Delete</a></td>
                      </tr>
                      <?php } ?>

                      <?php

                        if(isset($_GET['delete'])) {
                          $position_id = $_GET['delete'];
                          $sql = "DELETE FROM position WHERE id = '$position_id'";
                          $delete_query = mysqli_query($connection, $sql);
                          if($delete_query) {
                            echo "<p class='alert alert-danger text-center'>Position deleted successfully</p>";
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

