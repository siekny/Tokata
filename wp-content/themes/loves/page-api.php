<?php 

	$data = new WP_Query(array(
		'post_type' => 'photos'
	));

	$datas = array();
	$i=0;
	while ($data->have_posts()) {
		$data->the_post();
		?>

		<?php 

			$datas['titlePhoto'][$i]  = get_the_title();
			$datas['url'][0] = 'http://localhost/learning/wordpress/Tokata/wp-content/uploads/2018/11/owl.jpg';
			$i++;

		 ?> 
		<?php

	}
	echo json_encode($datas
	);
 ?>