<?php include "includes/header.php";?>
<?php include "includes/sidebar.php";?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5">
                    <h2>Site News</h2>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  
                 <table class="table table-hover table-bordered">
  <thead>
   <tr>
     <th>ID</th>
     <th>Title</th>
     <th>Image</th>
     <th>Date</th>
     <th>Edit</th>
     <th>Delete</th>
   </tr>
  </thead>
  <tbody>
     <tr>
       
      <?php

      $sql = "SELECT * FROM posts";
        $select_news = mysqli_query($connection, $sql);
        if(mysqli_num_rows($select_news) < 1) {
          echo "<p class='alert alert-danger'>No News have been added.</p>";
        } 

        while($row = mysqli_fetch_assoc($select_news)) {
          $post_id = $row['post_id'];
          $post_title = $row['post_title'];
          $post_image = $row['post_image'];
          $postedOn = $row['postedOn'];

          ?>
        <td><?php echo $post_id;?></td>
        <td><?php echo $post_title;?></td>
        <td><img src="<?php echo $post_image;?>"/></td>
        <td><?php echo $postedOn;?></td>
        <td><a type="button" class="btn btn-primary" href="edit_post.php?edit&p_id=<?php echo $post_id;?>">Edit</a></td>
        <td><a type="button" class="btn btn-danger" href="posts.php?delete=<?php echo $post_id;?>">Delete</a></td>
     </tr>
     <?php } ?>
     <?php

      if(isset($_GET['delete'])) {
        $post_id = $_GET['delete'];
        $sql = "DELETE FROM posts WHERE post_id = '$post_id'";
        $delete_query = mysqli_query($connection, $sql);
        if($delete_query) {
          echo "<p class='alert alert-danger text-center'>Post deleted successfully</p>";
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

