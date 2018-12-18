<?php get_header(); ?>
<!-- content -->
<div class="container">
	
   <div id="main" class="col-md-9"> 
   	<img class="main-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/bulldog.jpg" alt="main">
	    <div class="details detail">
	       
	        <h3><a href="<?php echo site_url('/event'); ?>" target="_blank">Entertainment</a></h3>
	        <div class="details-inner detail-inner">
	        	
	        
		        <div style="width: 35%;">
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
		        

		        <div class="entertainment-detail">
		        	
		        	<?php while($query->have_posts()) : $query->the_post(); ?>
		        		
						<div class="entertainment-detail-box">
			        		<a href="<?php the_permalink(); ?>">
			        			<?php echo the_post_thumbnail(); ?>
			        			<span><?php echo the_title(); ?></span>
			        			<p style="color: #99A6C4;"><?php echo get_the_time('d-M-Y'); ?> <?php echo get_the_time(); ?></p>
			        			<hr>
			        			<?php echo wp_trim_words(get_the_content(), 4, '...' ); ?>
			        		</a>
			        	</div>

			        <?php endwhile; ?>
				    
			    </div>
			</div>

		</div>

	</div>

	<!-- side bar -->
    <div id="sidebar" class="col-md-3">
      	<div class="sidebar-box">
      		<img class="main-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/s1.gif" alt="main">
      		<img class="main-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/s2.gif" alt="main">
      	</div>
      	<div class="sidebar-box">
      		<img class="main-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/s3.jpg" alt="main">
      	</div>
      	<div class="sidebar-box">
      		<img class="main-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/s4.jpg" alt="main">
      	</div>
      	<div class="new-article">
      		<h4>អត្ថបទថ្មី</h4>
      		<?php while($query->have_posts()) : $query->the_post(); ?>
      			<p><a href=""><span class="glyphicon glyphicon-chevron-right" style="font-size: 10px; top: -1px; margin-right: 3px"></span><?php echo the_title(); ?></a></p>
      		<?php endwhile; ?>
      	</div>
	</div>
</div>

<?php get_footer(); ?>