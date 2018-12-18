<?php 
	
	$query = new WP_Query(array(
		'post_type' => 'event',
		'posts_per_page' => -1,
	));
	$datas = array();
	$i=0;
	while ($query->have_posts()) {  
		$query->the_post();

		$datas['title'][$i] = get_the_title();
		$datas['content'][$i] = get_the_content('content');
	
		$i++;
	}
	echo json_encode($datas);
	
 ?>