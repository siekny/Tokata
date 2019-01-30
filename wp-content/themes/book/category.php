<?php get_header(); ?>

<div id="main" class="col-md-10 col-md-offset-1"> 
	<div class="main-box">
		<?php 

		while(have_posts()){
			the_post();
			the_title();
		}

		 ?>

    		
	</div>

</div>

<?php get_footer(); ?>