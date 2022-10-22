<?php /* Template Name: Test */

get_header('landing');




	
		$today = date("Y-m-d", strtotime('today'));
		$user_arr = array();
		$i = 0;
		query_posts(array(
			'post_type' => 'orders',
			'posts_per_page' => -1,
			'order' => 'desc',
			// 'meta_query' => array(   
			// 		array(
			// 			'key'     => 'order_day',			
			// 			'value' => '2022-10-17',
			// 			'compare' => 'IN'
			// 		)
			// )   
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
							'key'     => 'order_uid',			
							'value' => $company,
							'compare' => 'IN'
						)
					)   
				);

				

			
		$compnay_name = get_user_meta($company, 'compnay_name', true);               
		$food_items =  get_post_meta( $orderid, 'food_order', true );
		$today = date("Y-m-d", strtotime('today'));

		echo "<h2>".$compnay_name . "</h2>";
		echo "<h6>".$company . "</h6>";


				$available_active_employee = get_users(
					array(
						'role' => 'personal',
						'meta_query' => array(
							array(
								'key' => 'employee',
								'value' => $company,
								'compare' => '=='
							),
							array(
								'key' => 'status',
								'value' => 'active',
								'compare' => '=='
							)
						)
					)
				);

				foreach ($available_active_employee as $employee) {

					$emp_id = $employee->ID;

					echo $employee->user_login  ."<br>";

					$emp_allergies = get_user_meta( $emp_id, 'profile_alergies', true ); 
					if(!empty($emp_allergies)) {
							foreach($emp_allergies as $allergy)
							{
								echo  $allergy . "<br/>";
							}
						}


					


				}

	




				$user_orders_list = get_posts( $args );
		
				foreach($user_orders_list as $user_order) {

					echo "ID". $user_order->ID. "<br/>";

				//echo $user_order. "<br/>";
				
				
				}

				echo "<hr/>";




		}






die();

















	






	$orders_by_compnaies = array_diff($compnay_arr, array(''));
	
	print "<pre>";
	print_r($orders_by_compnaies);





	





	get_footer(); ?>


