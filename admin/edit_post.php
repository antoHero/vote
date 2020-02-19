<?php include "includes/header.php";?>
<?php include "includes/sidebar.php";?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5">
                    <h2>Edit News</h2>
                    <a href="posts.php"><< view posts</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <?php

                    if(isset($_GET['p_id'])) {
                      $p_id = $_GET['p_id'];
                    }

                    $sql = "SELECT * FROM posts WHERE post_id = $p_id";
                    $select_news_by_id = mysqli_query($connection, $sql);
                    while($row = mysqli_fetch_assoc($select_news_by_id)) {
                      $post_id = $row['post_id'];
                      $post_title = $row['post_title'];
                      $post_content = $row['post_content'];
                      $post_image = $row['post_image'];
                    }

                    $target_dir = "images/";
                    if(isset($_POST['submit'])) {
                      $title = mysqli_real_escape_string($connection, $_POST['title']);
                      $content = mysqli_real_escape_string($connection, $_POST['post_content']);
                      $postedOn = date('Y-m-d');
                      $image = $target_dir . basename($_FILES['post_image']['name']);
                      

                      if(move_uploaded_file($_FILES['post_image']['tmp_name'], $image)) {
                        $query = "UPDATE posts SET post_content='{$content}', post_title='{$title}', post_image='{$image}', postedOn=now() WHERE post_id='{$p_id}'";
                        $update_query = mysqli_query($connection, $query);
                        if($update_query) {
                          echo "<p class='alert alert-success'>News Updated Successfully.</p>";
                          header("location: posts.php");
                        }
                      } else {
                        echo "<p class='alert alert-danger'>Sorry your file could not be uploaded.</p>" . mysqli_error($connection);
                      }

                    }

                      

                  ?>
                  <form action="edit_post.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleFormControlInput1">News Title</label>
                      <input type="text" class="form-control" id="post_title" name="title" value="<?php echo $post_title;?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Content</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="post_content" cols="" rows="5">
                        <?php echo $post_content;?>
                      </textarea>
                    </div>
                    <div class="form-group">
                      <img src="<?php echo $post_image;?>">
                      <input type="file" name="post_image" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <button class="btn btn-success" type="submit" name="submit">Update</button>
                  </form>
                  
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include "includes/footer.php";?>

