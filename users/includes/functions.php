<?php require_once('config.php');?>

<?php
function showAllLevels() {
    global $connection;
    
    $query = "SELECT * FROM level";
    $result = mysqli_query($connection, $query);
   
    if(!$result) {
        echo "QUERY FAILED!!! " . mysqli_error($connection);
    }
    
    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $level = $row['level'];
        
        echo "<option value='$id'>$level</option>";
    }
   
}

function showAllPositions() {
    global $connection;
    
    $query = "SELECT * FROM position";
    $result = mysqli_query($connection, $query);
    
    if(!$result) {
        echo "QUERY FAILED! " . mysqli_error($connection);
    }
    
    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        
        echo "<option value='$id'>$name</option>";
    }
}


function addCandidate() {
    global $connection;
    
    
    if(isset($_POST['apply'])) {
        $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
        $level = $_POST['level'];
        $position = $_POST['position'];
        $matric = $_POST['matric'];
        $bio = mysqli_real_escape_string($connection, $_POST['bio']);
        $date = date('Y-m-d');
        $filename = $_FILES['image']['name'];
        // if(!empty($filename)) {
        //     move_uploaded_file($_FILES['image']['tmp_name'], '../images/' . $filename);
        if($firstname == "" || $lastname == "" || $level == "" || $position == "" || $matric == "" || $bio == "" || empty($filename)) {
        	echo "<p class='alert alert-danger text-center'>One or more fields is left empty.</p>";
        } else {
        	move_uploaded_file($_FILES['image']['tmp_name'], '../images/' . $filename);
	        $select = "SELECT * FROM candidates WHERE matric = '$matric'";
	        $run = mysqli_query($connection, $select);
	        if(mysqli_num_rows($run) > 1) {
	            echo "<p class='alert alert-danger text-center'>This Matric Number has already been used.</p>";
	        } else {

	            $sql = "INSERT INTO candidates (position_id, level_id, matric, firstname, lastname, image, bio, createdOn) ";
	            $sql .= "VALUES('$position', '$level', '$matric', '$firstname', '$lastname', '$filename', '$bio', '$date')";
	            $result = mysqli_query($connection, $sql);
	            if($result) {
	                echo "<p class='alert alert-success text-center'>Application successful.</p>";
	            } else {
	                echo "<p class='alert alert-danger text-center'>An error occurred.</p>" . mysqli_error($connection);
	            }
	        }
	    }
    }
}

function viewCandidates() {
    global $connection;
    
    $sql = "SELECT * FROM candidates";
    $query = mysqli_query($connection, $sql);
    if(!$query) {
        echo "Couldn't fetch Candidates " .mysqli_error($connection);
    }
    
    if(mysqli_num_rows($query) < 1) {
        echo "No candidates yet";
    }
    
    while($row = mysqli_fetch_assoc($query)) {
        $id = $row['id'];
        $name = $row['firstname'] ." ". $row['lastname'];
        $lastname = $row['lastname'];
//        $bio = $row['bio'];
//        $matric = $row['matric_no'];
        $image = (!empty($row['image'])) ? '../images/' .$row['image'] : '../images/profile.jpg';
        
        echo "
            <div class='col-md-4'>
          <div class='card mb-4 shadow-sm'>
          <img src='".$image."' width='100%' height='500'>
            <div class='card-body'>
              <p class='card-text'>".$row['bio']."</p>
              <div class='d-flex justify-content-between align-items-center'>
                <div class='btn-group'>
                  <a href='vote.php?id=".$id."' type='button' class='btn btn-sm btn-outline-danger' data-toggle='modal' data-target='#exampleModalScrollable'>View Manifesto</a>
                  <button type='button' class='btn btn-sm btn-outline-secondary'>Vote Now</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        ";
//        
//        echo 
//            "
//            <tr>
//                <td class='hidden'></td>
//                <td>".$row['id']."</td>
//                <td>
//                    <img src='".$image."' width='150px' height='150px'>
//                    <a href='#edit_photo' data-toggle='modal' class='pull-right photo' data-id='".$row['id']."'><span class='fa fa-edit'></span></a>
//                </td>
//                <td>".$row['firstname']."</td>
//                <td>".$row['lastname']."</td>
//                <td>".$row['matric']."</td>
//                <td>".$row['bio']."</td>
//                <td>
//                <a href='view_candidate.php?voter_id='".$row['id']."'><button class='btn btn-success btn-sm edit btn-flat' data-id=''><i class='fa fa-edit'></i> View</button></a>
//                </td>
//            </tr>";
    }
}

function viewPosts() {
    global $connection;
    $sql = "SELECT * FROM posts";
    $query = mysqli_query($connection, $sql);
    //echo connection_status();
    if(!$query) {
        echo "Error while getting posts" . mysqli_error($connection);
    }
     while($row = mysqli_fetch_assoc($result)) {
        echo 
            "
            <div class='media text-muted pt-3'>
      <p class='media-body pb-3 mb-0 small lh-125 border-bottom border-gray'>
        <strong class='d-block text-gray-dark'>@username</strong>
            ".$row['body']."
      </p>
    </div>";
    }
    
}

function viewCandidate() {
    global $connection;
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM voters candidates WHERE id = '$id'";
    $result = mysqli_query($connection, $sql);
    //echo connection_status();
    while($row = mysqli_fetch_assoc($sql)) {
        $id = $row['id'];
        $image = $row['image'];
        $name = $row['firstname'] ." ". $row['lastname'];
        $matric = $row['matric'];
        $bio = $row['bio'];
        echo "
        
        
        <div id='single_product'>
							<div >
								<div >
									<div >
					
										<img src='images/$image' width='180' height='180' />
					
										<h2><b> Name: $ $name </b></h2>
										<p>$matric</p>
                                        <p>$bio</p>
					
										<a href='index.php?add_cart=$id'><button style='float:right'>Vote</button></a>
								</div>
							</div>
						</div>
        ";
    }
}

function vote() {
	global $connection;
	if(isset($_GET['vote'])) {
		$candidate_id = $_GET['vote'];
		$position_id = $_GET['vote'];
	}

	$sql = "INSERT INTO votes(candidate_id, position_id, ) VALUES('$candidate_id', '$position_id', )"; 
	$insert_vote = mysqli_query($connection, $sql);
	$count = mysqli_num_rows($insert_vote);

}

function getCandidatesList() {
	global $connection;
    
    $query = "SELECT * FROM candidates";
    $result = mysqli_query($connection, $query);
   
    if(!$result) {
        echo "QUERY FAILED!!! " . mysqli_error($connection);
    }
    
    while($row = mysqli_fetch_assoc($result)) {
    	$id = $row['id'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $name = $firstname . ' ' . $lastname;
        
        echo "<option value='$id'>$name</option>";
    }
}

function getPositionsList() {
	global $connection;
    
    $query = "SELECT * FROM position";
    $result = mysqli_query($connection, $query);
    
    if(!$result) {
        echo "QUERY FAILED! " . mysqli_error($connection);
    }
    
    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        
       echo "<li style='padding-bottom: 10px;'><a href='vote.php?vote={$id}'>$name</a></li>";
    }
}




?>

