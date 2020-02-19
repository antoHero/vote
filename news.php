<?php include "includes/header.php";?>
<?php include "includes/db.php";?>


<div class="container">

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h4 class="pb-4 mb-4 font-italic border-bottom">
        Latest News
      </h4>
			<?php

				$query = "SELECT * FROM posts ORDER BY post_id DESC";
				$select_all_posts = mysqli_query($connection, $query);

				if(mysqli_num_rows($select_all_posts) < 1) {
					echo "<p class='alert alert-danger'>No news yet, check back later.</p>";
				}

				while($row = mysqli_fetch_assoc($select_all_posts)) {
					$id = $row['post_id'];
					$post_title = $row['post_title'];
					$post_content = $row['post_content'];
					$post_image = $row['post_image'];
					$post_date = $row['postedOn'];
					
			?>
      <div class="blog-post">
      	<img class="img-responsive" src="http://localhost:8888/vote/images/<?php echo $post_image;?>" alt="News Image">
        <h2 class="blog-post-title"><?php echo $post_title;?></h2>
        <p class="blog-post-meta"><?php echo $post_date;?></p>

        <p><?php echo substr($post_content, 0 , 200);?> <a href="read.php?read=<?php echo $id;?>">...Read more</a></p>
        <hr>
      </div><!-- /.blog-post -->
 	 <?php } ?>
 	 <?php 

 	 	$query = "SELECT * FROM posts";
		$select_all_posts = mysqli_query($connection, $query);
		if(mysqli_num_rows($select_all_posts) > 5) {
			echo "<nav class='blog-pagination'>
			        <a class='btn btn-outline-primary' href='#'>Older</a>
			        <a class='btn btn-outline-secondary disabled' href='#' tabindex='-1' aria-disabled='true'>Newer</a>
			      </nav>";
		} else {
			echo "";
		}

 	 ?>

    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
      <div class="p-4 mb-3 bg-light rounded">
      </div>

      
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->