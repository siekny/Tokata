<!-- div wrap -->
<!-- div wrapper container -->

	

			<!-- content -->
			<div id="content">
				<div class="col-md-2" style="padding: 0">
					<div id="sideleft">
				        <h4>Favorite <span>of the</span> Week Photos</h4>
				        
				        <?php 
				        	$args = array (
				        		'post_type'		=> 'photos',
				        		'post_per_page'	=> 1,
				        		'category_name'	=> 'home'
				        	);
				        	$query = new WP_Query($args);
				        	// json_encode($args);
				        ?>
				        <?php while($query->have_posts()) : $query->the_post(); ?>
				        	<a href="<?php the_permalink(); ?>" target="_blank"><?php the_post_thumbnail(); ?></a>
				        	<span class="author"><i>by</i> <a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a> </span>
				    	<?php endwhile; ?>
 
				    </div>
				</div>
			  
			    <div id="main" class="col-md-7" style="padding: 0"> <img class="main-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/bulldog.jpg" alt="main">
				    <div class="details">
				       
				        <h3><a href="<?php echo site_url('/event'); ?>" target="_blank">Entertainment</a></h3>
				        <div style="width: 35%; float: left;">
				        	<img src="<?php echo get_template_directory_uri(); ?>/assets/images//cat6.jpg" style="width: 100%; height: auto;">
				        	<div style="background: #38C378; padding: 10px 20px; color: #fff; font-size: 14px">
				        		មកដឹងលទ្ធផលសរុប MAMA ២០១៨  និងការសម្ដែងទាក់ភ្នែកជាងគេនៃថ្ងៃចុងក្រោយ
				        	</div>
				        </div>
				        <?php 
				        	$args = array(
				        		'post_type'		=>		'entertain',
					        	'post_per_page'	=>		1,
					        	'category_name'	=>		'home',
					        	'orderby'		=> 		'DSC'
				        	);
				        	$query = new WP_Query($args);
				        ?>
				        

				        <div class="entertainment-right">

				        	<?php while($query->have_posts()) : $query->the_post(); ?>

					        	<div class="entertainment-right-box">

					        		<?php echo the_post_thumbnail(); ?>
					        		<p><?php echo the_title(); ?></p>
					        	</div>
					        <?php endwhile; ?>

				        </div>

				    </div>

				    
			    </div>
			    <!-- side bar -->
			    <div id="sidebar" class="col-md-3" style="padding: 0">
			      	<ul id="featured">
				        <h4>Editors Pick</h4>
					    <?php 
					    	$args = array (
					    		'post_type'  	=> 		'editor',
					    		'post_per_page'	=> 		1,
					    		'category_name'	=> 		'home',
					    		'orderby'		=> 		'title',
					    		'order'			=> 		'DSC'
					    	);
					    	$query = new WP_Query($args);
					    	json_encode($args);
					    ?>
					    <?php while($query->have_posts()) : $query->the_post(); ?>
					    	<li> <?php the_post_thumbnail(); ?><em><?php the_content(); ?></em> <span class="author"><i>by</i><?php the_title(); ?></span> </li>	

					    <?php endwhile; ?>
					</ul>
				</div>

			    <div id="articles" class="col-md-12" style="padding: 0">
				    <div id="blogs" class="col-md-4" style="padding: 0">
				        <h4>Blog</h4>
				        <ul>
				          	<li>
				            	<p> <img src="wp-content/themes/loves/assets/images/photographer.jpg" alt=""> <a href="#">Mauris iaculis neque</a> <span class="author"><i>by</i> Morbi Indiam</span> Fusce dapibus vitae elementum. Pellentesque habitant morbi tristique senectus et netus et malesuada </p
				            	<p> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/photographer.jpg" alt=""> <a href="#">Mauris iaculis neque</a> <span class="author"><i>by</i> Morbi Indiam</span> Fusce dapibus vitae elementum. Pellentesque habitant morbi tristique senectus et netus et malesuada </p>
				          	</li>
				          	<li>
				            	<p> <a href="#">Mauris iaculis neque</a> <span class="author"><i>by</i> Vistibulum</span> Nunc eget mauris orci, ac rutrum elit. Cum sociis penatibus et magnis dis parturient montes, ascetur </p>
				          	</li>
				          	<li>
				            	
				            	<p> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/butterfly.jpg" alt=""> <a href="#">Aenediam dolor putate vehicula</a> <span class="author"><i>by</i> Morbi Indiam</span> Proin mollis, nunc in portal lobortis magnis dis parturient monter ascetur </p>
				          	</li>
				        </ul>
				    </div>
				    <div id="news" class="col-md-4" style="padding: 0">
				        <h4>News &amp; Events</h4>
				        <ul>
				          	<li> <a href="#">Jan</a> <span class="day">05 - 06</span>
				            	<p>If you're having problems editing this website template, then don't hesitate to ask for help on the Forum.</p>
				          	</li>
				          	<li> <a href="#">Mar</a> <span class="day">15</span>
				            	<p>Justo In a libero</p>
				            	<span class="day">17-20</span>
				            	<p>Praesent at elit eros <br>
				              sit amet congue velit</p>
				          	</li>
				          	<li> <a href="#">APR</a> <span class="day">20</span>
				            	<p>Nulla ultricies lacinia fringilla <br>
				              Donec mauris lorem</p>
				          	</li>
				        </ul>
				    </div>
				    <div id="updates" class="col-md-4" style="padding: 0">
				        <h4>Daily Updates</h4>
				        <p>You can remove any link to our website from this website template, you're free to use this website template without linking back to us.</p>
				        <form action="#" method="post">
				          	<input type="text" value="Name" class="txtfield" onblur="javascript:if(this.value==''){this.value=this.defaultValue;}" onfocus="javascript:if(this.value==this.defaultValue){this.value='';}">
				          	<input type="text" value="Enter Email Address" class="txtfield" onblur="javascript:if(this.value==''){this.value=this.defaultValue;}" onfocus="javascript:if(this.value==this.defaultValue){this.value='';}">
				          	<input type="submit" value="" class="button">
				        </form>
				        <ul class="navigation">
				          	<li class="selected"><a href="index.html">home</a></li>
				          	<li><a href="news.html">news &amp; events</a></li>
				          	<li><a href="about.html">about</a></li>
				          	<li><a href="gallery.html">gallery</a></li>
				          	<li><a href="blog.html">blog</a></li>
				          	<li><a href="contacts.html">contact us</a></li>
				        </ul>
				    </div>
	    		</div>
	  		</div>
	  	</div>
	</div>

	
