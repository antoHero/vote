<?php include "includes/header.php";?>
<?php include "includes/functions.php";?>
  <title>Vote Page</title>
<style type="text/css">
  .page-title {
    padding: 5px;
    font-size: 26px;

  }
  .inline {
    display: inline-block;
  }
  a{
    padding-left: 65px;
  }
</style>

<h6 class="border-bottom border-gray pb-2 mb-0 page-title">Vote Here</h6> 
<br>
<div class="container">
  <div class="row">      
      <?php
        session_start();
        $limit = 1;
        if(isset($_SESSION['user'])) {
          $user = $_SESSION['user'];
          $id = $_SESSION['user_id'];

          $sql = "SELECT * FROM votes WHERE user = '$user'";
          $select_voter = mysqli_query($connection, $sql);
          $voter_count = mysqli_num_rows($select_voter);
          $row = mysqli_fetch_assoc($select_voter);
          
        }

        $p_id =  $_GET['vote'];
        //echo $p_id;       

      if(isset($_POST['submit'])) {
        $name = $_POST['cand_name'];
        $position_id = $_POST['position_id'];

        

        //$user_id = "null";

        if(empty($name)) {
          echo "<p class='alert alert-danger text-center'>Select a candidate</p>";
        } else if($voter_count >= $limit) {
          echo "<p class='alert alert-danger text-center'>Error, You cannot vote for this position more than once, <b>$user</b></p>";
        }
          else {
          $sql = "INSERT INTO votes(candidate_name, position_id, user) VALUES('$name', '$position_id', '$user')";
          $query = mysqli_query($connection, $sql);
           
          if($query) {
            echo "<p class='alert alert-success text-center'>You have voted for $name.</p>";
            echo "<br>";
            echo "<a href='results.php'><< View Results</a>";
          } else {
            echo "<p class='alert alert-danger text-center'>Query Failed!!!!</p>" . mysqli_error($connection);
          }
        }
      }



      ?>
      <?php 
        

        $sql = "SELECT * FROM candidates WHERE position_id = '$p_id'";
        $get_postion = mysqli_query($connection, $sql);
        if(mysqli_num_rows($get_postion) < 1) {
          echo "<p class='alert alert-danger text-center'>No candidates for this position.</p>";
        }
        // $row = mysqli_fetch_assoc($get_postion);
        //   $id = $row['id'];
        //   $manifesto = $row['bio'];
        //   $firstname = $row['firstname'];
        //   $image = $row['image'];
        //   $matric = $row['matric'];
        //   $lastname = $row['lastname'];
        //   $name = $firstname . ' ' . $lastname;
        while($row = mysqli_fetch_assoc($get_postion)) {
                $user_id = $row['id'];
                $firstname = $row['firstname'];
                $image = $row['image'];
                $matric = $row['matric'];
                $lastname = $row['lastname'];
                $manifesto = $row['bio'];
                $name = $firstname . ' ' . $lastname;
              
        
          ?>
          <div class="col-lg-3 col-xs-6">
            <div class="card-deck">
                <div class="card">
                  <img src="http://localhost:8888/vote/images/<?php echo $image;?>" class="card-img-top" alt="<?php echo $name;?>" style="height: 250px;">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $name;?></h5>
                    <p class="card-text"><?php echo substr($manifesto, 0 , 50);?>.</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted"><?php echo $matric;?></small>
                  </div>
                </div>
              </div>
            <form action="vote.php" method="post">
                <input type="hidden" name="position_id" value="<?php echo $p_id;?>">
                <input type="hidden" class="form-check-input" name="cand_name" value="<?php echo $row['name'];?>"/>
                <button type="submit" class="btn btn-success vote" name="submit">Vote</button> 
                <br> <p></p>
                
              </form>
              <a type="" href="" class="text-center"  data-toggle="modal" data-target="#exampleModalLong">View Manifesto</a>
          </div>
          <!-- Modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $lastname?>'s Manifesto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                    <?php echo $lastname?>'s Manifesto
                    <?php
                      echo substr($manifesto, 0 , 200);
                     
                     ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
        <?php } ?>
                  
          
          

    </div>
  </div> 
</body>
</html>
      
      


<?php include "includes/footer.php";?>