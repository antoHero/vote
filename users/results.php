<?php include "includes/header.php";?>
<?php include "includes/functions.php";?>
<title>Election Results</title>

<main role="main" class="container">
 

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
</main>


<?php include "includes/footer.php";?>