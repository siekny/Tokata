
	<div class="wrap">
		<div class="wrapper container" style="padding: 0">
			<div id="header">
		        <div id="connect"> <a href="#" class="facebook"></a> <a href="#" class="twitter"></a> </div>
			    <a href="" id="logo"><img src="../wp-content/themes/loves/assets/images/logo.jpg" alt="logo"></a>

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
			<div id="content" class="col-md-12" style="padding: 0">
				<div class="col-md-2" style="padding: 0">
					<div id="sideleft">
				        <h4>Favorite <span>of the</span> Week Photos</h4>
				        <img src="../wp-content/themes/loves/assets/images/cat.jpg" alt=""><span class="author"><i>by</i> Rhon Cusnon</span>
				        <p><img src="../wp-content/themes/loves/assets/images/owl.jpg" alt=""><span class="author"><i>by</i> J.U.</span></p>
				        <p><img src="../wp-content/themes/loves/assets/images/turtle.jpg" alt=""><span class="author"><i>by</i> Liza C.</span></p>
				        <a href="#">Go to Gallery</a> 
				    </div>
				</div>
			    
	  		</div>
	  	</div>
	</div>
