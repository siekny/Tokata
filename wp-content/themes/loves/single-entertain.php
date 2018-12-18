<?php get_header(); ?>
<!-- content -->
<div class="container">
	<div id="main" class="col-md-9"> 
   		<!-- <img class="main-img" src="<?php //echo get_template_directory_uri(); ?>/assets/images/bulldog.jpg" alt="main"> -->
	    <div class="detail-single">
        <?php while(have_posts()) { ?>
        <?php the_post(); ?>
	       <h2><?php the_title(); ?></h2>
	       <p style="color: #99A6C4"><?php the_time('d-M-Y'); ?> <?php the_time(); ?></p>
         <?php  the_content(); ?>
       <?php } ?>
		</div>

	</div>

    <!-- side bar -->
    <div id="sidebar" class="col-md-3">
      	<div class="sidebar-box">
      		<img class="main-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/s1.gif" alt="main">
      		<img class="main-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/s2.gif" alt="main">
      	</div>
      	<div class="sidebar-box">
      		<img class="main-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/s4.gif" alt="main">
      	</div>
        <div class="sidebar-box">
          <img class="main-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/s5.gif" alt="main">
        </div>
      	
	</div>
</div>

<?php get_footer(); ?>