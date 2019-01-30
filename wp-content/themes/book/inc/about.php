<?php /* Template Name: About Template */ ?>
<?php get_header(); ?>

	<div id="content">
		<?php $args = array(
			'post_type'			=>			'project',
			'category_name'		=>			'about',
		);
		$query = new WP_Query($args);

		?>

		    <div id="main" class="col-md-12"> 
		    	<?php while($query->have_posts()) : $query->the_post(); ?>
		    	<div class="main-box student-single">
		    		<h3 style="color: #C6811B; margin: 0 0 20px"><?php the_title(); ?></h3>
		    		<?php the_content(); ?>

		    	</div>
		    <?php endwhile; ?>

		    </div>
		    <!-- side bar -->

  		</div>
  	</div>
</div>

<?php get_footer(); ?>