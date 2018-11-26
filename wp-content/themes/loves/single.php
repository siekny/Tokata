<?php get_header(); ?>

<div class="wrap">
	<div class="wrapper container" style="padding: 0">
		<div id="header" style="width: 100%">
		    <div id="connect"> <a href="#" class="facebook"></a> <a href="#" class="twitter"></a></div>
			<a id="logo"><img src="../../wp-content/themes/loves/assets/images/logo.jpg" alt="logo"></a>
		</div>
	

		<!-- content -->
		<?php while(have_posts()) { 
			the_post(); 

			$font_size1 = get_field('ranking1');

			if ($font_size ) {
				# code...
			}

			?>


			

			<div class="content-single">
				<div class="content-header">
					<h2>FAVORITE <span>OF THE</span> WEEK PHOTOS</h2>
				</div>
				<div class="top-content col-md-12">
					<div class="thumbnail" style="border: 0">
						<div class="top-content_img" style="float: left; width: auto; margin-right: 20px; margin-bottom: 20px">
							<!-- <?php //the_post_thumbnail(); ?> -->
						</div>
						<div class="top-content_text">
							<h3 class="text-center" style="margin: 0"><?php the_title(); ?></h3>
							<p><?php the_content(); ?></p>
						</div>
					</div>
				</div>
				<div class="sub-content col-md-12">
					<div class="col-md-6" style="padding-left: 0">
						<div class="thumbnail">
							<div class="content-img">
								<img src="<?php the_field('image1'); ?>" alt="content">
							</div>
							<div class="content-detail">
								<h3><?php the_field('title1'); ?></h3>
								<div class="review_star" style="background-size: 80px; height: 14px; width: 80px;">
									<div class="star" style="width: <?php echo get_field('ranking1'); ?>px; background-size: 80px; height: 14px;"></div>
								</div>
								<p><?php the_field('content1'); ?></p>
							</div>
						</div>
					</div>

					<div class="col-md-6" style="padding-left: 0">
						<div class="thumbnail">
							<div class="content-img">
								<img src="<?php the_field('image2'); ?>" alt="content">
							</div>
							<div class="content-detail">
								<h3><?php the_field('title2'); ?></h3>
								<div class="review_star" style="background-size: 80px; height: 14px; width: 80px;">
									<div class="star" style="width: <?php echo get_field('ranking2'); ?>px; background-size: 80px; height: 14px;"></div>
								</div>
								<p><?php the_field('content2'); ?></p>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-md-offset-3" style="padding-left: 0">
						<div class="thumbnail">
							<div class="content-img">
								<img src="<?php the_field('image3'); ?>" alt="content">
							</div>
							<div class="content-detail">
								<h3><?php the_field('title3'); ?></h3>
								<div class="review_star" style="background-size: 80px; height: 14px; width: 80px;">
									<div class="star" style="width: <?php echo get_field('ranking3'); ?>px; background-size: 80px; height: 14px;"></div>
								</div>
								<p><?php the_field('content3'); ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php } ?>
	</div>
</div>


<?php get_footer(); ?>