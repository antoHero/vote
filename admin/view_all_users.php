<?php include "includes/header.php";?>
<?php include "includes/sidebar.php";?> 
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5">
                    <h2>Users</h2>
                    
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
                  <h3 class="text-center">View All Users</h3>
                  <table class="table table-hover table-fluid">
                    <thead>
                      <tr>
                        <th>User ID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Matric</th>
                        <th>Image</th>
                        <th>Role</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  
                      <?php

                        $sql = "SELECT * FROM users";
                        $select_postions = mysqli_query($connection, $sql);
                        if(mysqli_num_rows($select_postions) < 1) {
                          echo "<p class='alert alert-danger'>No Users found.</p>";
                        } else { 

                        while($row = mysqli_fetch_assoc($select_postions)) {
                          $user_id = $row['user_id'];
                          // $username = $row['username'];
                          $user_firstname = $row['user_firstname'];
                          $user_lastname = $row['user_lastname'];
                          $user_matric = $row['user_matric'];
                          // $image = $row['user_image'];
                          $role = $row['user_role'];

                          ?>

                    
                        
                      <tr>
                        <td><?php echo $user_id;?></td>
                        <td><?php echo $user_firstname;?></td>
                        <td><?php echo $user_lastname;?></td>
                        <td><?php echo $user_matric;?></td>
                        <td><img class="img-responsive" src="images/<?php echo $image;?>" alt="Image"></td>
                        <td><?php echo $role;?></td>
                        <td><a href="view_all_users.php?delete=<?php echo $user_id;?>">Delete</a></td>
                      </tr>
                      <?php }} ?>

                      <?php

                        if(isset($_GET['delete'])) {
                          $candidate_id = $_GET['delete'];
                          $sql = "DELETE FROM users WHERE id = '$user_id'";
                          $delete_query = mysqli_query($connection, $sql);
                          if($delete_query) {
                            echo "<p class='alert alert-danger text-center'>User deleted successfully</p>";
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

