<?php /* Template Name: NewsEvent Template */ ?>
<?php get_header(); ?>
<?php include('menu.php') ?>

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
			$post_count = count($query->posts);


		?>
		<?php while($query->have_posts()) : $query->the_post(); ?>
			<h1><?php echo $post_count++; ?></h1>
			<hr class="border-gallery">
			<h1><?php the_title(); ?></h1>
			<div class="content">
				<style type="text/css">
					.content p {
						margin-bottom: 0;
						padding-bottom: 0;
					}
					.event .date {
						background: <?php echo the_field('bgcolor'); ?>;
						padding: 0 5px;
						border-radius: 5px;
						width: auto;
						float: left;
						margin-right: 20px;
					}
					.event {
						clear: both;
						margin-bottom: 10px
					}
				</style>
				<div class="event">
					<p class="date"><?php the_field('date1'); ?></p>
					<p><?php the_field('event1'); ?></p>
				</div>
				<div class="event">
					<p class="date"><?php the_field('date2'); ?></p>
					<p><?php the_field('event2'); ?></p>
				</div>
				<div class="event">
					<p class="date"><?php the_field('date3'); ?></p>
					<p><?php the_field('event3'); ?></p>
				</div>
				<div class="event">
					<p class="date"><?php the_field('date4'); ?></p>
					<p><?php the_field('event4'); ?></p>
				</div>
				<div class="event">
					<p class="date"><?php the_field('date5'); ?></p>
					<p><?php the_field('event5'); ?></p>
				</div>
				
			</div>
		<?php endwhile; ?>
	    
	</div>
</div>

<?php get_footer(); ?>