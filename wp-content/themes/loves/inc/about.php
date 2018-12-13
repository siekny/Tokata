<?php /* Template Name: About Template */ ?>
<?php get_header(); ?>
<?php include('menu.php') ?>


<div class="container" style="padding: 0">
	<div class="gallery">
		<?php 

			$args = array(
				'post_type'			=>		'project',
				'post_per_type'		=>		1,
				'category_name'		=> 		'about'
			);
			$query = new WP_Query($args);

		?>
		<?php while($query->have_posts()) : $query->the_post(); ?>
			<hr class="border-gallery">
			<h1><?php the_title(); ?></h1>
			<div class="content">
				<style type="text/css">
					.content p {
						background: <?php echo the_field('bgcolor'); ?>; 
						border: <?php echo the_field('border'); ?>;
						padding: 15px;
						border-radius: 5px;
					}
				</style>
				<?php the_content(); ?>
				
			</div>
		<?php endwhile; ?>
	    
	</div>
</div>

<?php get_footer(); ?>

