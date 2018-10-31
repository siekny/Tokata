<?php
	$args = array(
		'post_type' 		=> 'post',
		'posts_per_page'	=> 1,
		'category_name'     => 'service',

	);
	$query = new WP_Query($args);?>
	<div class="container">
		<div class="wraper">
		<div class="service scrollspy-example z-depth-1 mt-4" data-spy="scroll" data-target="#navbar6" data-offset="50" id="service">
		<div class="row">
		<?php while($query->have_posts()) : $query->the_post(); ?>
			<?php the_content();?>
		<?php endwhile;?>
		</div>
		</div>
		</div>
	</div>


	<?php 
	$args = array(
		'post_type' 		=> 'post',
		'posts_per_page'	=> 1,
		'category_name'     => 'jongnham',

	);
	$query = new WP_Query($args);?>

	<div class="Product scrollspy-example z-depth-1 mt-4" data-spy="scroll" data-target="#navbar6" data-offset="50" id="Product">
		<div class="container">
		<div class="row">
		<?php while($query->have_posts()) : $query->the_post(); ?>
			<?php the_content();?>
		<?php endwhile;?>
		</div>
		</div>
	</div>

	<?php 
	$args = array(
		'post_type' 		=> 'post',
		'posts_per_page'	=> 1,
		'category_name'     => 'portfolio',

	);
	$query = new WP_Query($args);?>

	<div class="Portfolio">
		<div class="container">
		<div class="row">
		<div class="portfolio">
		<?php while($query->have_posts()) : $query->the_post(); ?>
			<?php the_content();?>
		<?php endwhile;?>
		</div>
		</div>
		</div>
	</div>


	<?php 
	$args = array(
		'post_type' 		=> 'post',
		'posts_per_page'	=> 1,
		'category_name'     => 'client',

	);
	$query = new WP_Query($args);?>

	<div class="our-partner">
		<div class="container">
		<div class="row">
		<?php while($query->have_posts()) : $query->the_post(); ?>
			<?php the_content();?>
		<?php endwhile;?>
		</div>
		</div>
	</div>

