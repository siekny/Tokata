<?php /* Template Name: studentDocs Template */ ?>
<?php get_header(); ?>

<!-- div wrap -->
<!-- div wrapper container -->

			<!-- content -->
			<div id="content">

				<div id="sidebar" class="col-md-3">
					<?php 
						$parent_term_id = 10; // term id of parent term (edited missing semi colon)
						$taxonomies = array( 
						    'category',
						);
						$args = array(
						    'parent'         => $parent_term_id,
						); 
						$terms = get_terms($taxonomies, $args);
						$arr=array();
						
					?>
					<div class="sidebar-box">	
			      		<div class="box-title">
			      			<h3><?php echo get_the_category_by_ID(10); ?></h3>
			      		</div>
			      		
			      		<div class="box-content">
			      			

			      			<?php 

			      				for($i=0;$i<sizeof($terms);$i++){ ?>
									
									<p><a href="<?php echo site_url(); ?>/studentdocs"><?php  echo $terms[$i]->name; ?></a></p>

								<?php }
			      			 ?>
	      				</div>
	      				
			      		
			      	</div>
			      	
				</div>
				
			    <div id="main" class="col-md-9"> 
			    	<div class="main-box">
			    		<div class="box-title">
			    			
			    		</div>

			    		<?php 
							$sub = new WP_Query(array(
								'post_type'			=>			'studentDocs',
								'category_name'		=>			'highschool',
								'order'				=>			'ASC',
							));
						?>
						

			    		<div class="box-content">
			    			
				    			<?php while($sub->have_posts()) : $sub->the_post(); ?>
				    				
				    					<div class="box-inner">
						    				<a href="<?php the_permalink(); ?>">
						    					<?php the_post_thumbnail(); ?>
							    				<span></span>
							    				<p><?php the_title(); ?></p>
						    				</a>
						    			</div>
						    		
					    		<?php endwhile; ?>
					    	
				    	</div>

			    	</div>

			    	<div class="main-box">
			    		<div class="box-title">
			    			
			    		</div>

			    		<?php 
							$sub = new WP_Query(array(
								'post_type'			=>			'studentDocs',
								'category_name'		=>			'secondaryschool',
								'order'				=>			'ASC',
							));
						?>
						

			    		<div class="box-content">
			    			
				    			<?php while($sub->have_posts()) : $sub->the_post(); ?>
				    				
				    					<div class="box-inner">
						    				<a href="<?php the_permalink(); ?>">
						    					<?php the_post_thumbnail(); ?>
							    				<span></span>
							    				<p><?php the_title(); ?></p>
						    				</a>
						    			</div>
						    		
					    		<?php endwhile; ?>
					    	
				    	</div>

			    	</div>

			    </div>
			    <!-- side bar -->


			    
	  		</div>
	  	</div>
	</div>

	<!--  -->

	


<?php get_footer(); ?>