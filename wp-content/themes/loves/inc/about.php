<?php /* Template Name: About Template */ ?>
<?php get_header(); ?>
<?php include('menu.php') ?>

<div class="container" style="padding: 0">
	<div class="gallery">
	    <hr class="border-gallery">
		<h1>About</h1>
		<div class="content">
			<div class="content-box">
				<h3>We Have Free Templates for Everyone</h3>
				<p>Our website templates are created with inspiration, checked for quality and originality and meticulously sliced and coded. What´s more, they´re absolutely free! You can do a lot with them. You can modify them. You can use them to design websites for clients, so long as you agree with the Terms of Use. You can even remove all our links if you want to.</p>
			</div>
			<div class="content-box">
				<h3>We Have Free Templates for Everyone</h3>
				<p>Our website templates are created with inspiration, checked for quality and originality and meticulously sliced and coded. What´s more, they´re absolutely free! You can do a lot with them. You can modify them. You can use them to design websites for clients, so long as you agree with the Terms of Use. You can even remove all our links if you want to.</p>
			</div>
		</div>
	</div>
</div>

<?php 

	$args = array (
		'post_type'		=>		'post',
		'post_per_type'	=>		1,
		'category_name'	=>		'about'
	);
	$query = new WP_Query($args);
	while ($query->have_posts()) : $query->the_post();
	endwhile;
 ?>

<?php get_footer(); ?>