<?php /* Template Name: Blog Template */ ?>
<?php get_header(); ?>

<div class="container" style="padding: 0">
	<div class="blog">
	    <hr class="border-blog">
		<h1>Blog</h1>
		<div class="content">
			<div class="col-md-9" style="padding-left: 0; padding-right: 20px">
				<?php 
					$args = array(
						'post_type'		=> 		'blog',
						'post_per_page'	=>		1,
						'category_name'	=>		'blog',
						'order'			=>		'ASC',
					);
					$query = new WP_Query($args);
				?>
				<?php while($query->have_posts()) : $query->the_post(); ?>
					<div class="blog-box">
						<h3><?php the_title(); ?></h3>
						<?php echo the_post_thumbnail(); ?>
						<span style="color: #9a9292"><?php the_time('d-M-Y'); ?></span>
						<p><?php the_content(); ?></p>
					</div>
				<?php endwhile; ?>
			</div>
			<!-- side bar -->
		    <div id="sidebar" class="col-md-3">
		      	<div class="sidebar-box">
		      		<img class="main-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/s1.gif" alt="main">
		      		<img class="main-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/s2.gif" alt="main">
		      	</div>
		      	<div class="sidebar-box">
		      		<img class="main-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/s3.jpg" alt="main">
		      	</div>
		      	<div class="sidebar-box">
		      		<img class="main-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/s4.jpg" alt="main">
		      	</div>
			</div>
		</div>
    </div>
</div>

<?php get_footer(); ?>