<?php 

	$data = new WP_Query(array(
		'post_type' => 'editor',
		'posts_per_page' => -1,
	));

	$datas = array();
	$i=0;
	while ($data->have_posts()) {
		$data->the_post();
		?>

		<?php 

			$datas['title'][$i]  = get_the_title();
			$datas['content'][$i] = get_the_content();
			$datas['picture'][$i] = get_the_post_thumbnail();
			//$datas['picture'][$i] = get_template_directory_uri().'/assets/images/'.;
			$i++;
		 ?> 
		<?php

	}

	echo json_encode($datas);
 ?>
