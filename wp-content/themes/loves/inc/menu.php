
	<div class="wrap">
		<div class="wrapper container" style="padding: 0">
			<div id="header">
		        <div id="connect"> <a href="#" class="facebook"></a> <a href="#" class="twitter"></a> </div>
			    <a href="" id="logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.jpg" alt="logo"></a>

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

			<!-- content -->
			
	  	
