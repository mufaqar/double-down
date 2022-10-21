<?php /* Template Name: Test */

get_header('landing');




	
		$today = date("Y-m-d", strtotime('today'));
		$user_arr = array();
		$i = 0;
		query_posts(array(
			'post_type' => 'orders',
			'posts_per_page' => -1,
			'order' => 'desc',
			'meta_query' => array(   
					array(
						'key'     => 'order_day',			
						'value' => $today,
						'compare' => 'IN'
					)
			)   
		));

		if (have_posts()) :  while (have_posts()) : the_post();
		$order_uid = get_post_meta(get_the_ID(),'order_uid', true);
		$user_arr[] = $order_uid;
		endwhile;
		wp_reset_query();else :  endif; 

		
		$companies = array_unique($user_arr);

		
		foreach($companies as $company)
		{

			
				$args = array(
				'post_type' => 'orders',
				'posts_per_page' => -1,
				'order' => 'desc',
				'meta_query' => array(   
						array(
							'key'     => 'order_day',			
							'value' => $today,
							'compare' => 'IN'
						),
						array(
							'key'     => 'order_uid',			
							'value' => $company,
							'compare' => 'IN'
						)
					)   
				);

				echo $company;

				$user_orders_list = get_posts( $args );
		
				foreach($user_orders_list as $user_order) {

					echo "ID". $user_order->ID. "<br/>";

				//echo $user_order. "<br/>";
				
				
				}




		}






die();

















	






	$orders_by_compnaies = array_diff($compnay_arr, array(''));
	
	print "<pre>";
	print_r($orders_by_compnaies);





	





	get_footer(); ?>


