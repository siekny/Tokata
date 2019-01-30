<?php /* Template Name: entertainment Template */ ?>
<?php get_header(); ?>

<!-- div wrap -->
<!-- div wrapper container -->

			<!-- content -->
			<div id="content">

				<div id="sidebar" class="col-md-3">
					<?php 
						$parent_term_id_doc = 10; // term id of parent term (edited missing semi colon)
						$taxonomies = array( 
						    'category',
						);
						$args = array(
						    'parent'         => $parent_term_id_doc,
						); 
						$terms_doc = get_terms($taxonomies, $args);
					?>
					<?php 
						$parent_term_id_pc = 15; // term id of parent term (edited missing semi colon)
						$taxonomies_pc = array( 
						    'category',
						);
						$args_pc = array(
						    'parent'         => $parent_term_id_pc,
						); 
						$terms_pc = get_terms($taxonomies_pc, $args_pc);
						
					?>
					<?php 
						$parent_term_id_enter = 14; // term id of parent term (edited missing semi colon)
						$taxonomies_enter = array( 
						    'category',
						);
						$args_enter = array(
						    'parent'         => $parent_term_id_enter,
						); 
						$terms_enter = get_terms($taxonomies_enter, $args_enter);
						
					?>
					<div class="sidebar-box">	
			      		<div class="box-title">
			      			<h3><?php echo get_the_category_by_ID($parent_term_id_enter); ?></h3>
			      		</div>
			      		
			      		<div class="box-content">
			      			

			      			<?php 

			      				for($i=0;$i<sizeof($terms_enter);$i++){ ?>
									
									<p><a href="<?php echo site_url(); ?>/entertainment"><?php echo $terms_enter[$i]->name; ?></a></p>

								<?php }
			      			 ?>
	      				</div>
	      				
			      		
			      	</div>
			      	
				</div>
				
			    <div id="main" class="col-md-9"> 
			    	<?php 
						$sub = new WP_Query(array(
							'post_type'			=>			'entertain',
							'category_name'		=>			'fairytale',
							'order'				=>			'ASC',
						));
					?>
			    	<?php if($sub->have_posts()): ?>
			    	<div class="main-box">
			    		<div class="box-title">
			    			
			    		</div>

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
			    	<?php endif; ?>

			    	<?php 
						$sub = new WP_Query(array(
							'post_type'			=>			'computer',
							'category_name'		=>			'network',
							'order'				=>			'ASC',
						));
					?>
					<?php if($sub->have_posts()): ?>
			    	<div class="main-box">
			    		<div class="box-title">
			    			
			    		</div>

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
			    	<?php endif; ?>

			    </div>
			    <!-- side bar -->


			    
	  		</div>
	  	</div>
	</div>

	<!--  -->

	


<?php get_footer(); ?>