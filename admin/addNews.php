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
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  
                  <form>
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
                    <button class="btn btn-primary" type="submit">Post</button>
                  </form>
                  
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include "includes/footer.php";?>

