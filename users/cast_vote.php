
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
        if($voter_count >= $limit) {
        	$_SESSION['error'] = "<p class='alert alert-danger text-center'>Error, You cannot vote for this position more than once, <b>$user</b></p>";
        	header("location: vote.php");
        }
          else {
          $sql = "INSERT INTO votes(candidate_name, position_id, user) VALUES('$name', '$position_id', '$user')";
          $query = mysqli_query($connection, $sql);
           
          if($query) {
          	$_SESSION['success'] = "<p class='alert alert-success text-center'>You have voted for $name.</p>";
          	header("location: vote.php");
          } else {
          	$_SESSION['error'] = "<p class='alert alert-danger text-center'>Query Failed!!!!</p>" . mysqli_error($connection);
          	header("location: vote.php");
          }
        }
      }



      ?>