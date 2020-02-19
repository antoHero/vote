
<?php include "includes/header.php";?>
<?php include "includes/functions.php";?>
<title>Apply</title>

<main role="main" class="container">
 

  <div class="main-inner">
    <div class="container" style="padding-left: 30%">
        <h1 style="padding: 10px 0 30px 0;">Apply for a Position</h1>
        <a href="results.php"><< Go Back</a>
        <?php

            $user = $_SESSION['user'];
            

            $sql = "SELECT * FROM users WHERE user_lastname = '$user'";
            $select_user = mysqli_query($connection, $sql);
            $row = mysqli_fetch_assoc($select_user);
            $firstname = $row['user_firstname'];
            $matric = $row['user_matric']
            
            
          

        ?>
        <?php

          addCandidate();

        ?>
        <div class="col-sm-6">
            <form enctype="multipart/form-data" action="apply.php" method="post">
              <div class="form-row">
                <div class="form-group col-md-6">
                  
                  <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $firstname;?>" >
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $user;?>" >
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputState">Matric No</label>
                    <input type="text" class="form-control" name="matric" id="matric" value="<?php echo $matric;?>" />
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">Level</label>
                  <select id="inputState" name="level" class="form-control">
                    <option></option>
                    <?php showAllLevels();?>
                     
                  </select>
                </div>
                  <div class="form-group col-md-4">
                  <label for="inputState">Position</label>
                  <select id="inputState" name="position" class="form-control">
                    <option></option>
                    <?php showAllPositions();?>
                     
                  </select>
                </div>
                  
                <div class="form-group">
                    <label for="inputState">Upload Picture</label>
                  <input type="file" class="form-control" name="image"/>    
                </div>
                  
                <div class="form-group">
                
                    <label for="bio">Manifesto</label>
                    <textarea class="form-control" cols="60" rows="7" name="bio"></textarea>
                </div>
                
              </div>
                
              <button type="submit" class="btn btn-danger" name="apply">Apply</button>
            </form>
        </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
</main>


<?php include "includes/footer.php";?>