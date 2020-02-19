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
                      global $position_id;
                      

                        $position_id = $_GET['edit'];

                          $sql = "SELECT * FROM position WHERE id = '$position_id'";
                          $select_position = mysqli_query($connection, $sql);    
                          while ($row = mysqli_fetch_assoc($select_position)) {
                              $pos_id = $row['id'];
                              $pos_name = $row['name'];

                  ?>
                  <form action="positions.php" method="post">
                    <div class="form-group">
                      <label for="exampleFormControlInput1"> Position </label>
                      <input type="text" class="form-control" id="pos_name" name="name" value="<?php if(isset($pos_name)) {echo $pos_name;} ?>">
                    </div>
                    <button class="btn btn-success" type="submit" name="update_position">Update</button>
                  </form>
                <?php } ?>

                
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include "includes/footer.php";?>

