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
                  
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">

                  <div class="my-3 p-3 bg-white rounded shadow-sm">
      <h6 class="border-bottom border-gray pb-2 mb-0">View Results By Position</h6>  
      
      <ul style="list-style: none; padding-top: 10px;">
        <?php 


        $query = "SELECT * FROM position";
        $result = mysqli_query($connection, $query);
        
        if(!$result) {
            echo "QUERY FAILED! " . mysqli_error($connection);
        }
        
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['name'];
            
           echo "<li style='padding-bottom: 10px;'><a href='view.php?view={$id}'>$name</a></li>";
        }


        ?>

      </ul> 
      
      
  </div>
                  
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include "includes/footer.php";?>

