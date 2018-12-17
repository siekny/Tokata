<?php /* Template Name: NewsEvent Template */ ?>
<?php get_header(); ?>

<div class="container" style="padding: 0">
	<div class="gallery">
		<?php 

			$args = array(
				'post_type'			=>		'event',
				'post_per_type'		=>		1,
				'category_name'		=> 		'newsevent'
			);
			$query = new WP_Query($args);
			json_encode($args);
			
		?>
		<hr class="border-gallery">
			<h1>News <span> & </span>Event</h1>
		<?php while($query->have_posts()) : $query->the_post(); ?>
			
			<div class="content">
				<?php the_date('d-M-Y'); ?>

				<?php echo the_content(); ?>
				<style type="text/css">
					.content {
						width: 80%;
						margin: 0 auto;
					}
					.content p {
						margin-bottom: 0;
						padding-bottom: 0;
					}
					.event .date {
						padding: 0 5px;
						border-radius: 5px;
						width: auto;
						float: left;
						margin-right: 20px;
						color: #EDC057;
						margin-bottom: 10px;
					}
					.event {
						clear: both;
						margin-bottom: 10px
					}

				</style>
				
				
			</div>
		<?php endwhile; ?>
	    
	</div>
</div>

<?php get_footer(); ?>