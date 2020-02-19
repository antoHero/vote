<?php include "includes/header.php";?>
<?php include "includes/sidebar.php";?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5">
                    <h2>Add News</h2>
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

                    $target_dir = "../images/";
                    if(isset($_POST['submit'])) {
                      $title = mysqli_real_escape_string($connection, $_POST['title']);
                      $content = mysqli_real_escape_string($connection, $_POST['post_content']);
                      $postedOn = date('Y-m-d');
                      $image = $target_dir . basename($_FILES['post_image']['name']);
                      $uploadOk = 1;
                      $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
                      //check if image is an actual image or a fake image
                      $check = getimagesize($_FILES['post_image']['tmp_name']);
                      if($check == false) {
                        echo "<p class='alert alert-danger'>This is not an image file.</p>";
                        $uploadOk = 0;
                      } 

                      //check if fields are empty
                      if($title == '' || $content == '') {
                        echo "<p class='alert alert-danger'>The title or content field cannot be empty.</p>";
                      }

                      //check if the image already exists
                      else if(file_exists($image)) {
                        echo "<p class='alert alert-danger'>This image has already been used.</p>";
                        $uploadOk = 0;
                      }

                      //check file size
                      else if($_FILES['post_image']['size'] > 500000) {
                        echo "<p class='alert alert-danger'>This image is too large.</p>";
                        $uploadOk = 0;
                      }

                      //allow certain image types
                      else if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
                        echo "<p class='alert alert-danger'>Image type not allowed. Only JPEG, JPG, GIF and PNG are allowed.</p>";
                        $uploadOk = 0;
                      }

                      //if uploadOk is set by an error
                      else if($uploadOk == 0) {
                        echo "<p class='alert alert-danger'>Sorry your file could not be uploaded.</p>";
                      }

                      //if everything is okay
                      else {
                        if(move_uploaded_file($_FILES['post_image']['tmp_name'], $image)) {
                          $insert = "INSERT INTO posts(post_content, post_title, post_image, postedOn) ";
                          $insert .= "VALUES('$content', '$title', '$image', '$postedOn')";
                          $save = mysqli_query($connection, $insert);
                          if($save) {
                            echo "<p class='alert alert-success'>News have been added successfully.</p>";
                          } else {
                            echo "<p class='alert alert-danger'>Sorry an error occured.</p>" . mysqli_error($connection);
                          }
                        } 
                      }

                    }

                  ?>
                  <form action="add_post.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleFormControlInput1">News Title</label>
                      <input type="text" class="form-control" id="post_title" name="title" placeholder="Enter News Title Here">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Content</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="post_content" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlFile1">Add News Image</label>
                      <input type="file" name="post_image" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <button class="btn btn-success" type="submit" name="submit">Post</button>
                  </form>
                  
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include "includes/footer.php";?>

