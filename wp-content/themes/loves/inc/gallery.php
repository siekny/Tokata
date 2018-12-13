<?php /* Template Name: Gallery Template */ ?>
<?php get_header(); ?>
<?php include('menu.php') ?>

<div class="container" style="padding: 0">
	<div class="gallery">
	    <hr class="border-gallery">
		<h1>Gallery</h1>
		<div class="content">
			<h3>This website template has been designed by Free Website Templates for you, for free. You can replace all this text with your own text.</h3>
			<p>This website template has been designed by Free Website Templates for you, for free. You can replace all this text with your own text. You can remove any link to our website from this website template, you're free to use this website template without linking back to us. If you're having problems editing this website template, then don't hesitate to ask for help on the Forum.</p>
			<div class="view col-md-8 col-md-offset-2">
				<div class="main-view">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/dogs2.jpg" alt="Tokata">
				</div>
				<div class="sub-view">
					<div class="col-md-2 col-md-offset-1" style="padding-left: 0">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/turtle2.jpg" alt="Tokata 1">
					</div>
					<div class="col-md-2" style="padding-left: 0">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/butterfly2.jpg" alt="Tokata 2">
					</div>
					<div class="col-md-2" style="padding-left: 0">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/dogs3.jpg" alt="Tokata 3">
					</div>
					<div class="col-md-2" style="padding-left: 0">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/owl2.jpg" alt="Tokata 4">
					</div>
					<div class="col-md-2" style="padding-left: 0">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/cat2.jpg" alt="Tokata 5">
					</div>
				</div>
			</div>
		</div>
    </div>
</div>

<?php get_footer(); ?>