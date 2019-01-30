<!DOCTYPE html>
<html lang='en'>
<head>
	<?php wp_head();?>
	<title>Loves</title>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" />

</head>
<body>
<div class="wrap">
		<div class="wrapper" style="padding: 0">
			<div id="header">
		        <div id="connect"> </div>
			    <a href="" id="logo"><img style="width: 112px; height: auto;" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="logo"></a>

			    <div id="navigation">

				    <?php dynamic_sidebar( 'custom-header-widget' ); ?>    
	          		<?php
	                   $args=array(
	                      'head menu' => '',
	                       'container' => '',
	                       'container_class' => '',
	                       'container_id' => '',
	                       'menu_class' => 'navbar-nav',
	                       'menu_id' => '',
	                       'echo' => true,
	                       'fallback_cb' => '',
	                       'before' => '',
	                       'after' => '',
	                       'items_wrap' => '<ul id="%1$s" class="nav navbar-nav navbar-right">%3$s</ul>',
	                       'depth' => 0, 'walker' => '', 'theme_location' => 'header-menu');
	             		?>
	              	<?php wp_nav_menu($args);?>
              	</div>

			</div>