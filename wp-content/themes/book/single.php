<?php get_header(); ?>

<!-- div wrap -->
<!-- div wrapper container -->

			<!-- content -->
			<div id="content">

			    <div id="main" class="col-md-12"> 
			    	<div class="main-box student-single">
			    		<div class="box-sudent-single">
        				<?php while(have_posts()) { ?>
				        	<?php the_post(); ?>

					       		<!-- <div class="box-content"> -->
					       			<div class="box-detail" style="width: 72%; float: left;">
					    				<?php  the_content(); ?>
					    				<p style="color: #99A6C4"><?php the_time('d-M-Y'); ?> <?php the_time(); ?></p>
					    				
					    			</div>
					       			<div class="box-inner" style="float: right;">
					    				<?php the_post_thumbnail(); ?>
					    				
					    				<p><?php the_title(); ?></p>

					    			</div>

				         		<!-- </div> -->
				       	<?php } ?>
						</div>

			    	</div>

			    </div>
			    <!-- side bar -->


			    
	  		</div>
	  	</div>
	</div>

	<style type="text/css">
		iframe {width: 100% !important}
		.main-box .box-inner { cursor: auto;}
		.main-box .box-inner:hover {border: 1px solid transparent; }
	</style>

	<!--  -->

	


<?php get_footer(); ?>