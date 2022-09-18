<?php


add_action('wp_ajax_addcatering', 'addcatering', 0);
add_action('wp_ajax_nopriv_addcatering', 'addcatering');

function addcatering()
{
	global $wpdb;

	$people = stripcslashes($_POST['people']);
	$date = $_POST['date'];
	$time = $_POST['time'];
	$address = $_POST['address'];
	$person = $_POST['person'];
	$food_type = $_POST['food_type'];
	$food_cat = $_POST['food_cat'];
	$pro_cat = $_POST['pro_cat'];
	$pro_sub_cat = $_POST['pro_sub_cat'];
	$allergens = $_POST['allergens'];
	$user_type = $_POST['user_type'];
	$uid = $_POST['uid'];

	$post = array(
		'post_title'    => $date,
		'post_status'   => 'publish',
		'post_content'   => $food_type . $food_cat . $pro_cat . $pro_sub_cat . $allergens,
		'post_type'     => 'catering',
		'meta_input'   => array(
			'people' => $people,
			'time' => $time,
			'address' => $address,
			'person' => $person,
			'date' => $date,
			'user_type' => $user_type,
			'order_uid' => $uid,
		),
		'tax_input'    => array(
			'food_type' => array($food_type),
			'food_categories' => array($food_cat),
			'product_category' => array($pro_cat),
			'product_sub_category' => array($pro_sub_cat),
			'allergens' => array($allergens)
		),

	);
	$user_id = wp_insert_post($post);
	if (!is_wp_error($user_id)) {
		//sendmail($username,$password);
		echo wp_send_json(array('code' => 200, 'message' => __('Order Sucessfully Create')));
	} else {
		echo wp_send_json(array('code' => 0, 'message' => __('Error Occured please fill up form carefully.')));
	}

	die;
}


add_action('wp_ajax_weeklyfood', 'weeklyfood', 0);
add_action('wp_ajax_nopriv_weeklyfood', 'weeklyfood');

function weeklyfood()
{

	
	global $wpdb;

	$weekdays = $_POST['weekdays'];
	$usertype = $_POST['usertype'];
	$menu_items = $_POST['menu_items'];
	$uid = $_POST['uid'];
	$weekid = $_POST['weekid'];
	$total_days = count($weekdays);

	update_user_meta( $uid, $usertype.'_days', $total_days);

		$food_items = [];
		foreach ($menu_items as $menu_item) {
			$product_id = $menu_item[0];
			$menu_item = $menu_item[1];
			$food_items[$product_id] = $menu_item;
		
		}
		$days = [];	
		foreach ($weekdays as  $weekday) {
			$day = $weekday;		
			$days[$day]= $food_items;			
		}

		

			// check if order already placed by week
			$query_meta = array(
				'posts_per_page' => -1,
				'post_type' => 'orders',
				'meta_query' => array(
					'relation' => 'AND',
					array(
						'key' => 'order_week',
						'value' => $weekid,
						'compare' => '='
					),
					array(
						'key'     => 'user_type',
						'value' => $usertype,
						'compare' => '='
					)
				)
			);


	

		$postinweek = new WP_Query($query_meta);
		if ( $postinweek->have_posts() ): while ( $postinweek->have_posts() ): $postinweek->the_post();
		
			// updated Existing Food order Weekly 
			$updated_post_id = get_the_ID();

				
			update_post_meta($updated_post_id, 'food_order', $days);
			$orders_price = get_post_meta($updated_post_id, 'food_order' , true);
			$price_arr = [];
			foreach($orders_price as $index => $order_price)
			{
				foreach($order_price as $key => $price )
				{   
					$get_price =  get_post_meta($key, 'menu_item_price', true);
					$price_arr[] = $get_price*$price;
					
				}    
			
			}
			$order_total = array_sum($price_arr);
			update_post_meta($updated_post_id, 'food_order', $days);
			update_post_meta($updated_post_id, 'order_total', $order_total);
			update_post_meta($updated_post_id, 'order_uid', $uid);
			echo wp_send_json(array('code' => 200, 'message' => __('Order Sucessfully Updated')));
			die;
		
			

		endwhile; wp_reset_query(); else : 

		

			// Insert post as its not exisit 
					$postdata = array(
						'post_title'    => "OHYSX-" . rand(10, 100),
						'post_status'   => 'publish',
						'post_type'     => 'orders',
						'post_author' => $uid
					);
					$user_id = wp_insert_post($postdata);
					add_post_meta($user_id, 'food_order', $days, true);				
					add_post_meta($user_id, 'order_week', $weekid, true);
					add_post_meta($user_id, 'order_status', 'Pending', true);
					add_post_meta($user_id, 'order_type', 'Weekly', true);
					add_post_meta($user_id, 'user_type', $usertype, true);
					add_post_meta($user_id, 'order_uid', $uid);

					$orders_price = get_post_meta($user_id, 'food_order' , true);
					$price_arr = [];
					foreach($orders_price as $index => $order_price)
					{
						foreach($order_price as $key => $price )
						{   
							$get_price =  get_post_meta($key, 'menu_item_price', true);
							$price_arr[] = $get_price*$price;
							
						}    
					
					}
					$order_total = array_sum($price_arr);
					add_post_meta($user_id, 'order_total', $order_total,true);




					echo wp_send_json(array('code' => 200, 'message' => __('Order Sucessfully Created')));
					die;

		endif;



	


	
}



add_action('wp_ajax_weeklyfood_byday', 'weeklyfood_byday', 0);
add_action('wp_ajax_nopriv_weeklyfood_byday', 'weeklyfood_byday');

function weeklyfood_byday()
{
	global $wpdb;

	$sel_day = $_POST['sel_day'];
	$usertype = $_POST['usertype'];
	$menu_items = $_POST['menu_items'];
	$uid = $_POST['uid'];
	$weekid = $_POST['weekid'];
	$tdate = $_POST['tdate'];


	$daily_food = [];
	$product_items = array();
	foreach ($menu_items as $menu_item) {
		$product_id = $menu_item[0];
		$menu_item = $menu_item[1];		
		$product_items[$product_id] = $menu_item;
		$daily_food[$sel_day] = $product_items;
	}






	// check if order already placed by week
	$query_meta = array(
        'posts_per_page' => -1,
        'post_type' => 'orders',
		'meta_query' => array(
			'relation' => 'AND',
            array(
                'key' => 'order_week',
                'value' => $weekid,
                'compare' => '='
            ),
			array(
				'key'     => 'user_type',
				'value' => $usertype,
				'compare' => '='
			)
        )
    );

    $postinweek = new WP_Query($query_meta);
	if ( $postinweek->have_posts() ): while ( $postinweek->have_posts() ): $postinweek->the_post();
		
		
		// updated Existing Food order Weekly 
		$updated_post_id = get_the_ID();
		
		
		$food_orderd_data = array();
		$food_orderd_data = get_post_meta( $updated_post_id, 'food_order' , true);
		if(array_key_exists($sel_day, $food_orderd_data))
		{
			unset($food_orderd_data[$sel_day]);
			$food_orderd_data[$sel_day] = array_shift($daily_food);
			
		
			
			

			update_post_meta($updated_post_id, 'food_order', $food_orderd_data);

			$total_days = count($food_orderd_data);
			update_user_meta( $uid, $usertype.'_days', $total_days);
			echo wp_send_json(array('code' => 200, 'message' => __('Order Updated Sucessfully')));
			
		
		
		}
		else {	
			
			

			$food_orderd_data[$sel_day] = array_shift($daily_food);	

			






			update_post_meta($updated_post_id, 'food_order', $food_orderd_data);
			$total_days = count($food_orderd_data);
			update_user_meta( $uid, $usertype.'_days', $total_days);
			echo wp_send_json(array('code' => 200, 'message' => __('Order Updated Sucessfully')));
			
			
			
			

			}

	endwhile; wp_reset_query(); else : 

		
		$postdata = array(
			'post_title'    => "OHYSX-" . rand(10, 100),
			'post_status'   => 'publish',
			'post_type'     => 'orders',
			'post_author' => $uid
		);
		$user_id = wp_insert_post($postdata);
		add_post_meta($user_id, 'food_order', $days, true);
		//$t_day = count($days);
		add_post_meta($user_id, 'order_week', $weekid, true);
		add_post_meta($user_id, 'order_status', 'Pending', true);
		add_post_meta($user_id, 'order_type', 'Weekly', true);
		add_post_meta($user_id, 'user_type', $usertype, true);

		
		if (!is_wp_error($user_id)) {
			//sendmail($username,$password);
			echo wp_send_json(array('code' => 200, 'message' => __('Order Sucessfully Create')));
		} else {
			echo wp_send_json(array('code' => 0, 'message' => __('Error Occured please fill up form carefully.')));
		}
		



		endif;





	die;
}



add_action('wp_ajax_dailyfood', 'dailyfood', 0);
add_action('wp_ajax_nopriv_dailyfood', 'dailyfood');

function dailyfood()
{
	global $wpdb;
	$day = $_POST['date'];
	$menu_items = $_POST['menu_items'];
	$uid = $_POST['uid'];
	$weekid = $_POST['weekid'];
	$usertype = $_POST['usertype'];	
	$author_obj = get_user_by('id', $uid);
	$author =  $author_obj->display_name;	
	$tdate = new DateTime($day);
	$week = $tdate->format("W");
	$food_items = [];
	foreach ($menu_items as $menu_item) {
		$product_id = $menu_item[0];
		$menu_item = $menu_item[1];			
		$food_items[$product_id] = $menu_item;
	
	}


	$days = [];
	$days[$day] = $food_items;
	// check if order already placed by week
	$query_meta = array(
        'posts_per_page' => -1,
        'post_type' => 'orders',
        'meta_query' => array(
            array(
                'key' => 'order_day',
                'value' => $day,
                'compare' => '='
            ),
        )
    );	

    $postinweek = new WP_Query($query_meta);
	if ( $postinweek->have_posts() ): while ( $postinweek->have_posts() ): $postinweek->the_post();

	// updated Existing Food order Weekly 
		$updated_post_id = get_the_ID();	
		update_post_meta($updated_post_id, 'food_order', $days);
		update_post_meta($updated_post_id, 'order_uid', $uid);	
		$orders_price = get_post_meta($updated_post_id, 'food_order' , true);
		$price_arr = [];
		foreach($orders_price[$day] as $index => $order_price)
		{		
			$price =  get_post_meta($index, 'menu_item_price', true);
			$price_arr[] = $price*$order_price;		
		}
		$order_total = array_sum($price_arr);
		update_post_meta($updated_post_id, 'order_total', $order_total);
		echo wp_send_json(array('code' => 200, 'message' => __('Order Updated Sucessfully')));
		die();
		


	

endwhile; wp_reset_query(); else : 

	// Insert post as its not exisit 

	
		$post = array(
			'post_title'    => "OHYSX-" . rand(10, 100),
			'post_status'   => 'publish',
			'post_type'     => 'orders',
			'post_author' => $uid
		);
		$user_id = wp_insert_post($post);
		add_post_meta($user_id, 'order_day', $day, true);
		add_post_meta($user_id, 'order_status', 'Pending', true);
		add_post_meta($user_id, 'order_type', 'Day', true);
		add_post_meta($user_id, 'user_type', $usertype, true);
		add_post_meta($user_id, 'order_week', $week, true);
		add_post_meta($user_id, 'food_order', $days);
		add_post_meta($user_id, 'order_uid', $uid);

	    $orders_price = get_post_meta($user_id, 'food_order' , true);
		$price_arr = [];

		foreach($orders_price[$day] as $index => $order_price)
		{		
		$price =  get_post_meta($index, 'menu_item_price', true);
		$price_arr[] = $price*$order_price;
		
		}
		$order_total = array_sum($price_arr);
		add_post_meta($user_id, 'order_total', $order_total);	
		echo wp_send_json(array('code' => 200, 'message' => __('Order Sucessfully Create')));
		die();

endif;
die;
}






add_action('wp_ajax_fixdelivery', 'fixdelivery', 0);
add_action('wp_ajax_nopriv_fixdelivery', 'fixdelivery');

function fixdelivery()
{
	global $wpdb;

	$mon =  json_decode(stripslashes($_POST['mon']));
	$tue =  json_decode(stripslashes($_POST['tue']));
	$wed =  json_decode(stripslashes($_POST['wed']));
	$thu =  json_decode(stripslashes($_POST['thu']));
	$fri =  json_decode(stripslashes($_POST['fri']));

	$days_data = array();
	$days_data[0] = $mon;
	$days_data[1] = $tue;
	$days_data[3] = $wed;
	$days_data[4] = $thu;
	$days_data[5] = $fri;
	


	$uid = $_POST['uid'];
	$author_obj = get_user_by('id', $uid);
	$author =  $author_obj->display_name;
	

	$post = array(
		'post_title'    => "OHYSX-" . rand(10, 100),
		'post_status'   => 'publish',
		'post_type'     => 'orders',
		'post_author' => $uid
	);
	$user_id = wp_insert_post($post);


	add_post_meta($user_id, 'order_day', 'Fixed Delivery', true);	
	add_post_meta($user_id, 'order_status', 'Pending', true);
	add_post_meta($user_id, 'order_type', 'Weekly', true);
	add_post_meta($user_id, 'user_type', 'Personal', true);



	$total_day_price = [];

	foreach ($days_data as $myday){

		//print_r($myday);

		$dayitems = [];
		

		$day = $myday->day;
		$type  = $myday->type;

		$items = $myday->items;
		foreach($items as $item)
		{
		
			$price =  get_post_meta($item, 'menu_item_price', true);			
		    $dayitems[] = $price;

		}
		 $day_price=  array_sum($dayitems);
		 $total_day_price[] =  $day_price;
		 add_post_meta($user_id, $day.'_ids', $day_price , true);	
		



		
	}

	$total_price =  array_sum($total_day_price);
	add_post_meta($user_id, 'total_price', $total_price ,true);	
	


	if (!is_wp_error($user_id)) {
		echo wp_send_json(array('code' => 200, 'message' => __('Order Sucessfully Create')));
	} else {
		echo wp_send_json(array('code' => 0, 'message' => __('Error Occured please fill up form carefully.')));
	}

	die;
}



// Meeting Ajax


add_action('wp_ajax_addmeeting', 'addmeeting', 0);
add_action('wp_ajax_nopriv_addmeeting', 'addmeeting');

function addmeeting()
{
	global $wpdb;
	$date = $_POST['date'];
	$menu_items = $_POST['menu_items'];
	$uid = $_POST['uid'];
	$order = $_POST['order'];
	$post = array(
		'post_title'    => "OHYSX-" . rand(10, 100),
		'post_status'   => 'publish',
		'post_type'     => 'orders',
		'post_author' => $uid
	);
	$user_id = wp_insert_post($post);
	$price =  get_post_meta($product_id, 'menu_item_price', true);
	add_post_meta($user_id, 'date', $date, true);	
	add_post_meta($user_id, 'order_uid', $uid, true);	
	$food_items = [];
	foreach ($menu_items as $menu_item) {
		$product_id = $menu_item[0];
		$menu_item = $menu_item[1];		
		$food_items[$product_id] = $menu_item;
	}
	add_post_meta($user_id, 'food_order', $food_items, true);	
	add_post_meta($user_id, 'order_status', 'Pending', true);
	add_post_meta($user_id, 'order_type', 'Meeting', true);
	add_post_meta($user_id, 'user_type', $order, true);

	$orders_price = get_post_meta($user_id, 'food_order' , true);
	$price_arr = [];
	foreach($orders_price as $index => $order_price)
	{
			$price =  get_post_meta($index, 'menu_item_price', true);		
			$price_arr[] = $price * $order_price;
	}

	
	$order_total = array_sum($price_arr);
	add_post_meta($user_id, 'order_total', $order_total,true);	





	if (!is_wp_error($user_id)) {
		//sendmail($username,$password);
		echo wp_send_json(array('code' => 200, 'message' => __('Order Sucessfully Create')));
	} else {
		echo wp_send_json(array('code' => 0, 'message' => __('Error Occured please fill up form carefully.')));
	}

	die;
}



// company_deliver_address Ajax


add_action('wp_ajax_company_deliver_address', 'company_deliver_address', 0);
add_action('wp_ajax_nopriv_company_deliver_address', 'company_deliver_address');

function company_deliver_address()
{
	global $wpdb;
	$uid = stripcslashes($_POST['uid']);
	$address = $_POST['address'];
	$user_id = update_user_meta($uid, 'compnay_delivery_address', $address);
	if (!is_wp_error($user_id)) {
		//sendmail($username,$password);
		echo wp_send_json(array('code' => 200, 'message' => __('Compnay Delivery Address Updated')));
	} else {
		echo wp_send_json(array('code' => 0, 'message' => __('Error Occured please check address')));
	}

	die;
}



add_action('wp_ajax_update_agreement', 'update_agreement', 0);
add_action('wp_ajax_nopriv_update_agreement', 'update_agreement');

function update_agreement()
{
	global $wpdb;
	$uid = stripcslashes($_POST['uid']);
	$compnay_agreement = $_POST['compnay_agreement'];
	$lunch_benefit = $_POST['lunch_benefit'];
	$benefit_type = $_POST['benefit_type'];

	$user_id = update_user_meta($uid, 'lunch_benefit', $lunch_benefit);

	if (!is_wp_error($user_id)) {
		update_user_meta($uid, 'lunch_benefit', $lunch_benefit);
		update_user_meta($uid, 'lunch_benfit_type', $benefit_type);
		update_user_meta($uid, 'compnay_agreement', $compnay_agreement);
		//sendmail($username,$password);
		echo wp_send_json(array('code' => 200, 'message' => __('Agreement Updated')));
	} else {
		echo wp_send_json(array('code' => 0, 'message' => __('Error Occured please form Data')));
	}

	die;
}




// Profile Devivery Address


add_action('wp_ajax_profile_deliver_address', 'profile_deliver_address', 0);
add_action('wp_ajax_nopriv_profile_deliver_address', 'profile_deliver_address');

function profile_deliver_address()
{
	global $wpdb;
	$uid = stripcslashes($_POST['uid']);
	$profile_delivery_address = $_POST['profile_delivery_address'];
	$profile_delivery_phone = $_POST['profile_delivery_phone'];
	$profile_delivery_email = $_POST['profile_delivery_email'];	
	update_user_meta($uid, 'profile_delivery_phone', $profile_delivery_phone);
	update_user_meta($uid, 'profile_delivery_address', $profile_delivery_address);
	update_user_meta($uid, 'profile_delivery_email', $profile_delivery_email);
	echo wp_send_json(array('code' => 200, 'message' => __('Profile Dellivery Details Updated')));
	

	die;
}


// Profile Devivery Address


add_action('wp_ajax_profile_deliver_fast', 'profile_deliver_fast', 0);
add_action('wp_ajax_nopriv_profile_deliver_fast', 'profile_deliver_fast');

function profile_deliver_fast()
{
	global $wpdb;
	$uid = stripcslashes($_POST['uid']);
	$profile_delivery_days = $_POST['profile_delivery_days'];

	$user_id = update_user_meta($uid, 'profile_delivery_days', $profile_delivery_days);
	if (!is_wp_error($user_id)) {

		echo wp_send_json(array('code' => 200, 'message' => __('Profile Delivery Days Updated')));
	} else {
		echo wp_send_json(array('code' => 0, 'message' => __('Error Occured please check address')));
	}
	die;
}

// Profile Payment Card Number Address


add_action('wp_ajax_profile_contact', 'profile_contact', 0);
add_action('wp_ajax_nopriv_profile_contact', 'profile_contact');

function profile_contact()
{
	global $wpdb;
	$uid = stripcslashes($_POST['uid']);
	$profile_contact = $_POST['profile_contact'];
	
	$user_id = update_user_meta($uid, 'profile_contact', $profile_contact);
	if (!is_wp_error($user_id)) {

		echo wp_send_json(array('code' => 200, 'message' => __('Profile Contact Updated')));
	} else {
		echo wp_send_json(array('code' => 0, 'message' => __('Error Occured please check address')));
	}
	die;
}


add_action('wp_ajax_profile_allergies_other', 'profile_allergies_other', 0);
add_action('wp_ajax_nopriv_profile_allergies_other', 'profile_allergies_other');

function profile_allergies_other()
{
	global $wpdb;
	$uid = stripcslashes($_POST['uid']);
	$choices_alergies = $_POST['choices_alergies'];
	

	$user_id = update_user_meta($uid, 'profile_alergies', $choices_alergies);
	if (!is_wp_error($user_id)) {

		echo wp_send_json(array('code' => 200, 'message' => __('Profile Allergies Updated')));
		die;
	} else {
		echo wp_send_json(array('code' => 0, 'message' => __('Error Occured please check address')));
		die;
	}
	die;
}







add_action('wp_ajax_get_type_products', 'get_type_products', 0);
add_action('wp_ajax_nopriv_get_type_products', 'get_type_products');

function get_type_products()
{
							global $wpdb;	
							$query_week = $_POST['weekid'];
							$catname = $_POST['catname'];							
							$week_arr = explode("-", $query_week, 2);
							$week = $week_arr[1];
							$year = $week_arr[0];	
							$dates = getStartAndEndDate($week,$year);
							$FirstDay = $dates['start_date'] ;
							$LastDay =  $dates['end_date'];   					
						  
					
							query_posts(array(
								'post_type' => 'menu_items',
								'posts_per_page' => -1,
								'order' => 'desc',   
								'menus_type' => $catname,                                                                                                       
								'meta_query' => array(
									array(
										'key' => 'date',
										'value' => array($FirstDay, $LastDay ),           
										'compare' => 'BETWEEN',
										'type' => 'DATE'
									),
								)
							) ); 

							//echo "Ajax Load Data -" . $catname;			
							

                                if (have_posts()) :  while (have_posts()) : the_post();
								$date = get_field('date'); ?>
								<div class="catering_card _pro_salat">
									<h3><?php the_title() ?> ( <?php $timestamp = strtotime($date); echo  date('D', $timestamp);  ?> | <span><?php echo $date ?> ) </h3>
									<p class="mt-3"><?php the_content() ?></p>
									<div class="row">
										<div class="col-md-12">
											<h6 class="mt-2">Contains:</h6>
											<p><?php echo get_post_meta(get_the_ID(), 'contains', true); ?></p>
											<p>Nutritional content: <?php echo get_post_meta(get_the_ID(), 'nutritional_content', true); ?></p>
										</div>                        
									</div>
								</div>
								<?php endwhile;
                                    wp_reset_query();
                                else : ?>
                                   <div class="catering_card _pro_salat">
                            <h3> Sorry, No <span class="text-uppercase"><?php echo $catname ?></span> Menu Added for this Week</h3>
                            <p class="mt-3"> We are workign on it We will add it soon</p>                            
                        </div>
                                <?php endif; 

	

	die;
}







