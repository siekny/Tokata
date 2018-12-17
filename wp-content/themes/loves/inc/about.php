<?php /* Template Name: About Template */ ?>
<?php get_header(); ?>

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
			<?php echo the_post_thumbnail(); ?>
			<hr class="border-gallery">
			<h1><?php the_title(); ?></h1>
			
			<div class="content">thanks 
				<?php 
					$args1 = array (
						'post_parent'	=>		get_the_ID(),
						'post_type'		=> 		'tabs_children'
					);
					$query1 = new WP_Query($args1);
				?>
				<?php while($query1->have_posts()) : $query1->the_post(); ?>
					<div class="content-box">
						<?php remove_filter('the_content', 'wpautop'); ?>
						<h3><?php the_title(); ?></h3>
						<?php remove_filter('the_content', 'wpautop'); ?>
						<p><?php the_content(); ?></p>
						<?php remove_filter('the_content', 'wpautop'); ?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endwhile; ?>
	    
	</div>
</div>

