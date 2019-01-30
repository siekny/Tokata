<!-- div wrap -->
<!-- div wrapper container -->

			<!-- content -->
			<div id="content">

				<div id="sidebar" class="col-md-3">
			      	<div class="sidebar-box">
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
	
			      		<div class="box-title">
			      			<h3><?php echo get_the_category_by_ID($parent_term_id_doc); ?></h3>
			      		</div>
			      		
			      		<div class="box-content">
			      			
			      			<?php 
			      				for($i=0;$i<sizeof($terms_doc);$i++){ ?>
									<p><a href="<?php echo site_url(); ?>/studentdocs"><?php  echo $terms_doc[$i]->name; ?></a></p>

								<?php }
			      			 ?>
	      				</div>
	      				
			      		
			      	</div>

			      	<div class="sidebar-box">
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
	
			      		<div class="box-title">
			      			<h3><?php echo get_the_category_by_ID($parent_term_id_pc); ?></h3>
			      		</div>
			      		
			      		<div class="box-content">
			      			
			      			<?php 
			      				for($i=sizeof($terms_doc);$i<sizeof($terms_pc)+sizeof($terms_doc);$i++){ ?>
									
									<p><a href="<?php echo site_url(); ?>/computerscience">
										<?php echo $terms_pc[$i]->name; ?></a></p>

								<?php }
			      			 ?>
	      				</div>
	      				
			      		
			      	</div>

			      	<div class="sidebar-box">	
			      		<?php 
							$parent_term_id_enter = 14; // term id of parent term (edited missing semi colon)
							$taxonomies_enter = array( 
							    'category',
							);
							$args_enter = array(
							    'parent'         => $parent_term_id_enter,
							); 
							$terms_enter = get_terms($taxonomies_enter, $args_enter);
							$arr=array();
						?>
			      		<div class="box-title">
			      			<h3><?php echo get_the_category_by_ID($parent_term_id_enter); ?></h3>
			      		</div>
			      		
			      		<div class="box-content">
			      			

			      			<?php 
			      				for($i=0;$i<sizeof($terms_enter);$i++){ ?>
									
									<p><a href="<?php echo site_url(); ?>/entertainment"><?php  echo $terms_enter[$i]->name; ?></a></p>

								<?php }
			      			 ?>
	      				</div>
	      				
			      		
			      	</div>
			      	
			      	
				</div>
				
			    <div id="main" class="col-md-9"> 
			    	<div class="main-box">
			    		<div class="box-title">
			    			<h3><?php echo get_the_category_by_ID($parent_term_id_doc); ?></h3>
			    		</div>

			    		<div class="box-content">

			      			<?php 
			      				for($i=0;$i<sizeof($terms_doc);$i++){ ?>
			      					<div class="box-inner">
			      					<a href="<?php echo site_url(); ?>/studentdocs">
				    					<?php echo $terms_doc[$i]->description; ?>
					    				<p><?php echo $terms_doc[$i]->name; ?></p>
				    				</a>
				    				</div>
									
								<?php }
			      			 ?>
			      			
	      				</div>


				    	<div class="box-title">
			    			<h3><?php echo get_the_category_by_ID($parent_term_id_pc); ?></h3>
			    		</div>
						<div class="box-content">

			      			<?php 
			      				for($i=sizeof($terms_doc);$i<sizeof($terms_pc)+sizeof($terms_doc);$i++){ ?>
			      					<div class="box-inner">
			      					<a href="<?php echo site_url(); ?>/computerscience">

				    					<?php echo $terms_pc[$i]->description; ?>
					    				<p><?php echo $terms_pc[4]->name; ?></p>
				    				</a>
				    				</div>
									
								<?php }
			      			 ?>
			      			
	      				</div>


				    	<div class="box-title">
			    			<h3><?php echo get_the_category_by_ID($parent_term_id_enter); ?></h3>
			    		</div>
						<div class="box-content">

			      			<?php 
			      				for($i=0;$i<sizeof($terms_enter);$i++){ ?>
			      					<div class="box-inner">
			      					<a href="<?php echo site_url(); ?>/entertainment">
				    					<?php echo $terms_enter[$i]->description; ?>
					    				<p><?php echo $terms_enter[$i]->name; ?></p>
				    				</a>
				    				</div>
									
								<?php }
			      			 ?>
			      			
	      				</div>

				    		
			    	</div>

			    </div>
			    <!-- side bar -->


			    
	  		</div>
	  	</div>
	</div>

	<!--  -->

	
