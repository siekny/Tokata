<?php get_header(); ?>

<div class="wrap">
	<div class="wrapper container" style="padding: 0">
		<div id="header" style="width: 100%">
		    <div id="connect"> <a href="#" class="facebook"></a> <a href="#" class="twitter"></a></div>
			<a id="logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.jpg" alt="logo"></a>
		</div>
	

		
	</div>
</div>
<?php 

	$api = "http://localhost/wordpress/Tokata/api/" 
	$rss=file_get_contents($myApi);
	$new_array=json_decode($rss,true);
	
?>

<?php get_footer(); ?>