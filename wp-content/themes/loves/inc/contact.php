<?php /* Template Name: Contact Template */ ?>
<?php get_header(); ?>

<div class="container" style="padding: 0">
	<div class="gallery">
	    <hr class="border-gallery">
		<h1>Comment</h1>

		<?php 
			$args = array(
				'post_type'			=>			'project',
				'post_per_page'		=>			1,
				'category_name'		=>			'contact',
			);
			$query = new WP_Query($args);
		?>
		
		<?php while($query->have_posts()) : $query->the_post(); ?>
		<div class="content content-comment">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon.jpg">
			<!-- <textarea class="form-control" placeholder="Comment Here" rows="5"></textarea>
			<input type="submit" value="Comment" class="comment"> -->
			<?php the_content(); ?>
		</div>
	<?php endwhile; ?>
	</div>
</div>

<?php get_footer(); ?>