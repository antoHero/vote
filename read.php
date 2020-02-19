<?php include "includes/header.php";?>
<?php include "includes/db.php";?>


<div class="container">

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      
			<?php

				$post_id = $_GET['read'];

				$query = "SELECT * FROM posts WHERE post_id = '$post_id'";
				$select_all_posts = mysqli_query($connection, $query);

				while($row = mysqli_fetch_assoc($select_all_posts)) {
					$id = $row['post_id'];
					$post_title = $row['post_title'];
					$post_content = $row['post_content'];
					$post_image = $row['post_image'];
					$post_date = $row['postedOn'];
					
			?>
		      <div class="blog-post">
		      	<h4 class="pb-4 mb-4 font-italic border-bottom blog-post-title">
		        <?php echo $post_title;?>
		      </h4>
		      	<img class="img-responsive" src="http://localhost:8888/vote/images/<?php echo $post_image;?>" alt="News Image">
		        <p class="blog-post-meta"><?php echo $post_date;?></p>

		        <p><?php echo $post_content;?></p>
		        <hr>
		      </div><!-- /.blog-post -->
		 	 <?php } ?>

    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
      <div class="p-4 mb-3 bg-light rounded">
      </div>

      
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->