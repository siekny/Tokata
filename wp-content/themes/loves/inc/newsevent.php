<?php /* Template Name: NewsEvent Template */ ?>
<?php get_header(); ?>

<div class="container" style="padding: 0">
	<div class="gallery">
		<?php 

			$args = array(
				'post_type'			=>		'event',
				'post_per_type'		=>		1,
				'category_name'		=> 		'newsevent',
				'order' 			=>		'ASC',
			);
			$query = new WP_Query($args);
			json_encode($args);
			
		?>
		<hr class="border-gallery">
			<h1>News <span> & </span>Event</h1>
		<?php while($query->have_posts()) : $query->the_post(); ?>
			
			<div class="event-box" id="box<?php the_ID(); ?>" data-toggle="modal" data-target="#myModal<?php the_ID(); ?>">
				<?php echo the_post_thumbnail(); ?>
				<span style="color: #9a9292"><?php the_time('d-M-Y'); ?></span>
				<p><?php echo the_title(); ?></p>
			</div>

			 <!-- Modal -->
			<div class="modal fade" id="myModal<?php the_ID(); ?>" role="dialog">
			    <div class="modal-dialog" style="margin-top: 8%">
			    
				    <!-- Modal content-->
			    	<div class="modal-content">
			        	<div class="modal-header">
			          		<button type="button" class="close" data-dismiss="modal">&times;</button>
			          		<h4 class="modal-title"><?php the_title(); ?></h4>
			        	</div>
			        	<div class="modal-body">
			        		<?php echo the_post_thumbnail(); ?>
			        		<span style="color: #9a9292"><?php the_time('d-M-Y'); ?></span>
			          		<?php the_content(); ?>
			        	</div>
			        	<div class="modal-footer">
			          		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        	</div>
			      	</div>
			      
			    </div>
			</div>
		<?php endwhile; ?>
	    
	</div>
</div>
<style type="text/css">
	.event-box {
		box-shadow: 1px 2px 2px 1px rgba(0,0,0,.2);
		width: 23%;
		margin-right:1%; 
		margin-left: 1%;
		float: left;
		cursor: pointer;
		padding: 10px 15px;
		margin-bottom: 20px;
	}
	.event-box img {
		width: 100%;
		height: 155px;
		margin-bottom: 10px;
	}
	.event-box p {
		margin-bottom: 0;
	}
	.modal-body img {
		width: 35%;
	    height: auto;
	    float: left;
	    margin-right: 15px;
	    margin-bottom: 15px;
	}

	
</style>

<?php get_footer(); ?>