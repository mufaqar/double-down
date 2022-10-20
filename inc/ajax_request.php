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
	$pro_cat = $_POST['pro_cat'];
	$pro_sub_cat = $_POST['pro_sub_cat'];
	$allergens = $_POST['allergens'];
	$user_type = $_POST['user_type'];
	$uid = $_POST['uid'];
	$reason = $_POST['reason'];

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
			'reason' => $reason,
		),
		'tax_input'    => array(
			'food_type' => array($food_type),
	
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


add_action('wp_ajax_addcatering_email', 'addcatering_email', 0);
add_action('wp_ajax_nopriv_addcatering_email', 'addcatering_email');

function addcatering_email()
{
	global $wpdb;
	$name = $_POST['name'];
	$email = $_POST['email'];
	$people = $_POST['people'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$address = $_POST['address'];
	$person = $_POST['person'];
	$food_type = $_POST['food_type'];
	$reason = $_POST['reason'];
	$pro_cat = $_POST['pro_cat'];
	$pro_sub_cat = $_POST['pro_sub_cat'];
	$allergens = $_POST['allergens'];
	$user_type = $_POST['user_type'];
	$uid = $_POST['uid'];
	$admin = 'bestilling@doubledowndish.no';	
	$to = 'hei@doubledowndish.no';
	$cc = $email;
	$subject = "Double Downdish | Catering Inquiry";
	$body  = "<p><strong> Name </strong>:  ".$name."  </p>";
	$body  .= "<p><strong> Email </strong>:  ".$email."  </p>";
	$body  .= "<p><strong> Number of People  </strong>:  ".$people."  </p>";
	$body  .= "<p><strong> Date  </strong>:  ".$date."  </p>";
	$body  .= "<p><strong> Time  </strong>:  ".$time."  </p>";
	$body  .= "<p><strong> Address  </strong>:  ".$address."  </p>";
	$body  .= "<p><strong> Food Type  </strong>:  ".$food_type."  </p>";
	$body  .= "<p><strong> Reason  </strong>:  ".$reason."  </p>";
	$body  .= "<p><strong> Product Category  </strong>:  ".$pro_cat."  </p>";
	$body  .= "<p><strong> Heating Options </strong>:  ".$pro_sub_cat."  </p>";
	$body  .= "<p><strong> Allergens  </strong>:  ".$allergens."  </p>";
	$body  .= "<p><strong> Budget Per Person  </strong>:  ".$person."  </p>";	
	$headers = array('Content-Type: text/html; charset=UTF-8');	
	$headers  = "From: " . $to . "\r\n";
	$headers .= "Reply-To: " . $cc . "\r\n";
	$headers .= "CC: ".$cc."\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	mail( $admin, $subject, $body, $headers );
	echo wp_send_json(array('code' => 200, 'message' => __('Email sent sucessfully ')));
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
	//	print_r($days);
		

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
						'key' => 'order_type',
						'value' => 'Weekly',
						'compare' => '='
					),
					array(
						'key'     => 'user_type',
						'value' => $usertype,
						'compare' => '='
					),
					array(
						'key'     => 'order_uid',
						'value' => $uid,
						'compare' => '='
					)
				)
			);


	

		$postinweek = new WP_Query($query_meta);
		if ( $postinweek->have_posts() ): while ( $postinweek->have_posts() ): $postinweek->the_post();		
			$updated_post_id = get_the_ID();	
			

			// If Menus are empty and days selected 
			if($menu_items == '')
			{

			
				$orders_price = get_post_meta($updated_post_id, 'food_order' , true);			
				$a1=$orders_price;
			//	unset($orders_price['Wednesday']);				
				$a2=$days;

				$result=array_diff_assoc($a1,$a2);

				//print_r($result);
				foreach ($result as $key => $value) {
					//echo $key;
					unset($orders_price[$key]);	
				}

				update_post_meta($updated_post_id, 'food_order', $orders_price);
				echo wp_send_json(array('code' => 200, 'message' => __('Order Sucessfully Updated {Day not seletc with 0 menu}')));
				die;
		

			}
			else{
				
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
				update_post_meta($updated_post_id, 'user_type', $usertype);
				echo wp_send_json(array('code' => 200, 'message' => __('Order Sucessfully Updated')));
				die;
			


			}
			



		
			

		endwhile; wp_reset_query(); else : 		

			// Insert post as its not exisit 
					$postdata = array(
						'post_title'    => "OHYSX-" . rand(10, 100),
						'post_status'   => 'publish',
						'post_type'     => 'orders'
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
                'key' => 'order_type',
                'value' => 'Weekly',
                'compare' => '='
            ),
			array(
				'key'     => 'user_type',
				'value' => $usertype,
				'compare' => '='
			),
			array(
				'key'     => 'order_uid',
				'value' => $uid,
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
		//print_r($food_orderd_data);
		if (array_key_exists($sel_day,$food_orderd_data))
		{

			// Order Exisit and Days Exist
		
			unset($food_orderd_data[$sel_day]);
			$food_orderd_data[$sel_day] = array_shift($daily_food);	

			update_post_meta($updated_post_id, 'food_order', $food_orderd_data);
			$total_days = count($food_orderd_data);
			update_user_meta( $uid, $usertype.'_days', $total_days);
			$orders_price = get_post_meta($updated_post_id, 'food_order' , true);
			$price_arr = [];
			foreach($orders_price as $index => $order_price)
			{
				foreach($order_price as $pro_id => $pro_qty)
					{					
						$price =  get_post_meta($pro_id, 'menu_item_price', true);
						$price_arr[] = $price*$pro_qty;		
						
					}
			
			}
			$order_total = array_sum($price_arr);
			update_post_meta($updated_post_id, 'order_total', $order_total);
			echo wp_send_json(array('code' => 200, 'message' => __('Order Updated Sucessfully {Days Updated}')));
			die();		
		
		
		}
		else {	

				// Order Exisit and Days Not Found
			

			$food_orderd_data[$sel_day] = array_shift($daily_food);
			update_post_meta($updated_post_id, 'food_order', $food_orderd_data);
			$total_days = count($food_orderd_data);
			update_user_meta( $uid, $usertype.'_days', $total_days);			
			$orders_price = get_post_meta($updated_post_id, 'food_order' , true);
			$price_arr = [];
			foreach($orders_price as $index => $order_price)
			{
				foreach($order_price as $pro_id => $pro_qty)
					{					
						$price =  get_post_meta($pro_id, 'menu_item_price', true);
						$price_arr[] = $price*$pro_qty;		
						
					}
			
			}
			$order_total = array_sum($price_arr);
			update_post_meta($updated_post_id, 'order_total', $order_total);
			echo wp_send_json(array('code' => 200, 'message' => __('Order Updated Sucessfully { Days Added }')));			
			die();
			
			

			}

	endwhile; wp_reset_query(); else : 	

		
		$postdata = array(
			'post_title'    => "OHYSX-" . rand(10, 100),
			'post_status'   => 'publish',
			'post_type'     => 'orders'
		);
		$user_id = wp_insert_post($postdata);
		add_post_meta($user_id, 'food_order', $daily_food, true);
		add_post_meta($user_id, 'order_uid', $uid, true);
		add_post_meta($user_id, 'order_week', $weekid, true);
		add_post_meta($user_id, 'order_status', 'Pending', true);
		add_post_meta($user_id, 'order_type', 'Weekly', true);
		add_post_meta($user_id, 'user_type', $usertype, true);	

		
		if (!is_wp_error($user_id)) {

			$orders_price = get_post_meta($user_id, 'food_order' , true);
			$price_arr = [];
			foreach($orders_price as $index => $order_price)
			{
				foreach($order_price as $pro_id => $pro_qty)
					{					
						$price =  get_post_meta($pro_id, 'menu_item_price', true);
						$price_arr[] = $price*$pro_qty;			
						
					}
			
			}
			$order_total = array_sum($price_arr);
			update_post_meta($user_id, 'order_total', $order_total);
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
	$week = $_POST['weekid'];
	$usertype = $_POST['usertype'];	
	$author_obj = get_user_by('id', $uid);
	$author =  $author_obj->display_name;	
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
			'relation' => 'AND',
            array(
                'key' => 'order_day',
                'value' => $day,
                'compare' => '='
            ),
			array(
				'key'     => 'user_type',
				'value' => $usertype,
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
		$orders_price_data = get_post_meta($updated_post_id, 'food_order' , true);
		
		$price_arr = [];
		foreach($orders_price_data[$day] as $key=> $order_price)
		{	
			$product_id =  $key;
			$product_qty =  $order_price;
			$price_item =  get_post_meta($product_id, 'menu_item_price', true);			
			$price_arr[] = $price_item*$product_qty;				
				
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
	$time = $_POST['time'];
	$menu_items = $_POST['menu_items'];
	$uid = $_POST['uid'];
	$order = $_POST['order'];
	$weekid = $_POST['weekid'];

	
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
	add_post_meta($user_id, 'order_time', $time, true);	
	add_post_meta($user_id, 'order_week', $weekid, true);		
	
	$food_items = [];
	foreach ($menu_items as $menu_item) {
		$product_id = $menu_item[0];
		$menu_item = $menu_item[1];		
		$food_items[$product_id] = $menu_item;
	}

	$food_items_arr = array();
	$food_items_arr[$date] = $food_items;
	add_post_meta($user_id, 'food_order', $food_items_arr);	
	add_post_meta($user_id, 'order_status', 'Pending', true);
	add_post_meta($user_id, 'order_type', 'Meeting', true);
	add_post_meta($user_id, 'user_type', $order, true);
	$orders_price = get_post_meta($user_id, 'food_order' , true);
	$price_arr = [];
	foreach($orders_price as $index => $order_price)
	{
		foreach($order_price as $key => $o_price)
		{
			$price =  get_post_meta($key, 'menu_item_price', true);		
			$price_arr[] = $price * $o_price;
		}			
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
		echo wp_send_json(array('code' => 200, 'message' => __('Compnay address updated')));
	} else {
		echo wp_send_json(array('code' => 0, 'message' => __('Error Occured please check address')));
	}

	die;
}


add_action('wp_ajax_company_shipping_method', 'company_shipping_method', 0);
add_action('wp_ajax_nopriv_company_shipping_method', 'company_shipping_method');

function company_shipping_method()
{
	global $wpdb;
	$uid = $_POST['uid'];
	$shipping_methods = $_POST['shipping_methods'];
	$user_id = update_user_meta($uid, 'compnay_shipping_method', $shipping_methods);
	if (!is_wp_error($user_id)) {
		echo wp_send_json(array('code' => 200, 'message' => __('Compnay Shipping Method updated')));
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
		update_user_meta($uid, 'compnay_name', $compnay_agreement);
		//sendmail($username,$password);
		echo wp_send_json(array('code' => 200, 'message' => __('Agreement detail updated')));
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
	update_user_meta($uid, 'profile_delivery_address', $profile_delivery_address);
	echo wp_send_json(array('code' => 200, 'message' => __('Profile address updated')));
	die;
}


// Profile Devivery Address


add_action('wp_ajax_profile_details', 'profile_details', 0);
add_action('wp_ajax_nopriv_profile_details', 'profile_details');

function profile_details()
{
	global $wpdb;
	$uid = stripcslashes($_POST['uid']);
	$profile_delivery_phone = $_POST['profile_delivery_phone'];
	update_user_meta($uid, 'profile_delivery_phone', $profile_delivery_phone);
	echo wp_send_json(array('code' => 200, 'message' => __('Profile details updated')));
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

		echo wp_send_json(array('code' => 200, 'message' => __('Profile contact details updated')));
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

		echo wp_send_json(array('code' => 200, 'message' => __('Profile allergies updated')));
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
									<?php show_Allergens() ?>									
								</div>
								<?php endwhile;
                                    wp_reset_query(); else : ?>
                                   <div class="catering_card _pro_salat">
										<h3> Sorry, no <span><?php echo $catname ?></span> menu added for this (<?php echo $week?>)week</h3>
										<p class="mt-3"> We are workign on it, we will add it soon</p>                            
									</div>
                                <?php endif; 

	

		die;
	}







	
add_action('wp_ajax_get_invoice_detail_personal', 'get_invoice_detail_personal', 0);
add_action('wp_ajax_nopriv_get_invoice_detail_personal', 'get_invoice_detail_personal');

	function get_invoice_detail_personal()
	{
							global $wpdb;	
							$orderid = $_POST['orderid'];
							$uid = $_POST['uid'];	
							$user_info = get_userdata( $uid);
							$args = array('p' => $orderid, 'post_type' => 'orders');							
							$order_week  =   get_post_meta( $orderid, 'order_week', true );
							$order_total = get_post_meta( $orderid, 'order_total', true );
							$shipping_price = get_option('shipping_price');
							$vat_price = get_option('vat_price');						
							?>

				
						            
						   <div class="invoice_table">
								<table class="invoice_slip_table">
									<thead>
									<tr>
										<th scope="col">Cloud</th>
										<th scope="col">Distribution</th>
									</tr>
									</thead>							
									<tbody>
									<tr>
										<td scope="row"><strong>Name: </strong><?php echo $user_info->display_name; ?></td>
										<td scope="row"><strong>Week: </strong><?php echo $order_week ?></td>										
									</tr>
									<tr>
										<td scope="row"><strong>Email: </strong><?php echo $user_info->user_login ?></td>
										<td scope="row"><strong>Shipping: </strong>NOK <?php echo $shipping_price?></td>
									</tr>
									
									</tbody>
								</table>
								<?php $loop = new WP_Query($args); while ( $loop->have_posts() ) : $loop->the_post();  global $post; ?>
								<h5 class="mt-4">Summary</h5>
								<table class="invoice_slip_table">
									<thead>
									<th scope="col">Description</th>
									<th scope="col">Number</th>
									<th scope="col">VAT</th>
									<th scope="col">Price</th>
									</thead>
									<tbody>
										<?php   
												$shipping_days_arr = array();
												$food_item_day_arry = array();

												$food_total_vat_arr = array();

												$food_price_day_total_arr = array();
												

												$food_items =  get_post_meta( get_the_ID(), 'food_order', true );						
												foreach($food_items as $index => $food) {
													$shipping_days_arr[] = $index;
													?>
														<tr>
																<td scope="row"><strong><?php echo $index ?></td>
																<td>
																<?php   
																
																$food_item_arr = array();
																$food_item_vat_arr = array();
																$food_item_price_arr = array();
																foreach($food as $key => $ky_item) { 
																		$menu_item_price =  get_post_meta( $key, 'menu_item_price', true );
																		$food_item_price_arr[] = $menu_item_price*$ky_item;
																		
																	?>	<p>  <?php echo  get_the_title($key) . " [". $ky_item . "] " ; ?> 
																		 NOK <?php echo $menu_item_price ?> </p>																	
																
																	<?php 	}  ?>
																	</td>
																	<td>
																		<?php foreach($food as $key => $ky_item) { 
																			$menu_item_price =  get_post_meta( $key, 'menu_item_price', true );
																			$menu_item_price_vat = $menu_item_price*$vat_price/100 *$ky_item;
																			$food_total_vat_arr[] =  $menu_item_price_vat;

																			$food_item_day_price =  array_sum($food_item_price_arr);

																			
																			?>
																
																			<p>NOK <?php echo $menu_item_price_vat?> </p>
																
																	<?php 	}  ?>
																	</td>

																	<td>																
																		<p>NOK <?php 
																		
																		$food_price_day_total_arr[] = $food_item_day_price;
																		echo $food_item_day_price;?> </p>	
																	</td>
																
														</tr>

												<?php }  endwhile; 

													$shipping_days =  count($shipping_days_arr);
													$tatal_vat = array_sum($food_total_vat_arr);
													$shipping_cost =  $shipping_days* $shipping_price;
													$days_order_price =  array_sum($food_item_day_arry); 													
													$total_menus_days_price =  array_sum($food_price_day_total_arr); 
													$shipping_vat  = $shipping_cost*25/100; 
													$total_shipping  = $shipping_vat+$shipping_cost;
													$total_shipping_vat  = $shipping_vat+$shipping_cost+$tatal_vat;
													$grand_total =  $total_shipping_vat+$total_menus_days_price; 
												 
												 ?>
												<tr>
												<td scope="row"><strong>Item Total</td>
												<td scope="row"><strong></td>
												<td scope="row"><strong>NOK <?php echo $tatal_vat ?></td>
												<td scope="row"><strong>NOK <?php echo $total_menus_days_price ?></td>
												</tr>
												<tr>
												<td scope="row"><strong>Shipping</td>
												<td scope="row"><strong>Delivery Days [<?php echo $shipping_days ?>]</td>												
												
												<td scope="row"></td>
												<td scope="row"><strong>NOK <?php echo $shipping_cost ?></td>
												</tr>
												<tr>
												<td scope="row"><strong>VAT</td>
												<td scope="row"></td>												
												<td scope="row"></td>
												<td scope="row"><strong>NOK <?php echo $shipping_vat?></td>
												</tr>
												
												<td scope="row"><strong>Grand Total</td>
												<td scope="row"><strong></td>
												<td scope="row"><strong>NOK <?php echo $total_shipping_vat?></td>
												<td scope="row"><strong>NOK <?php echo $grand_total ?></td>
												</tr>

										
									<tbody>
								</table>
							</div>
							
                      
                     

				 
						   
	

					<?php	die;
	}



		
add_action('wp_ajax_get_invoice_detail_personal_company', 'get_invoice_detail_personal_company', 0);
add_action('wp_ajax_nopriv_get_invoice_detail_personal_company', 'get_invoice_detail_personal_company');

	function get_invoice_detail_personal_company()
	{
							global $wpdb;
							$weeks = get_weeks('01-09-2022');	
							$orderid = $_POST['orderid'];				
							$uid = $_POST['uid'];	
							$user_info = get_userdata( $uid);
							$args = array('p' => $orderid, 'post_type' => 'orders');

							$available_active_employee = get_users(
								array(
									'role' => 'personal',
									'meta_query' => array(
										array(
											'key' => 'employee',
											'value' => $uid,
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

						    $total_emp =   count($available_active_employee);
							$order_total =  get_post_meta( $orderid, 'order_total', true );
							$company_days =  get_user_meta($uid ,'Company_days',true);   						   
							$order_week  =   get_post_meta( $orderid, 'order_week', true );	
							$lunch_benefit =  get_user_meta($uid ,'lunch_benefit',true);
							$lunch_benfit_type =  get_user_meta($uid ,'lunch_benfit_type',true);                                               
							$fixed_total = $order_total-$lunch_benefit;
							$order_total_price =  $order_total * $company_days  * $total_emp ;

						




							$method =  get_user_meta($uid, 'compnay_shipping_method', true );
							$shipping_cost = get_option('shipping_price');
							$vat_cost = get_option('vat_price');

							if($method == 'method_one')
								{  $shipping_cost = get_option('shipping_price'); }
							elseif($method == 'method_two')
							{ $shipping_cost = get_option('shipping_price'); }
							else {
								{ $shipping_cost = 0; }
							}



								$order_total = get_post_meta( $orderid, 'order_total', true ); 

								$compnay_name =  get_user_meta($uid ,'compnay_name',true);   


							
								



							$args = array(
								'post_type' => 'orders',
								'posts_per_page' => -1,
								'order' => 'desc',
							
								'meta_query' => array(   
									'relation' => 'AND',                                                            
										array(
											'key'      => 'user_type',
											'value'    => 'Company',
											'compare'  => '='
										),
										array(
											'key'     => 'order_uid',
											'value'   =>  $uid,
											'compare' => '='
										),
										array(
											'key'     => 'order_week',
											'value' => $weeks,
											'compare' => 'IN'
										)
								)    
							);   
							
							
							$order_price_arr = array();
							$order_type_arr = array();
							$query = new WP_Query( $args );
							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) {   $query->the_post();															
									$order_total = get_post_meta( get_the_ID(), 'order_total', true );
									$order_type = get_post_meta( get_the_ID(), 'order_type', true );
									$order_price_arr[] = $order_total;
									$order_type_arr[] = $order_type;
									}  									
								}  														
								$total_order_price = array_sum($order_price_arr);
								$total_company_lunch = count($order_price_arr);            
								$total_order_type = array_count_values($order_type_arr);       
								$meeting_orders =  $total_order_type['Meeting'];
								$weekly_orders =  $total_order_type['Weekly'];
								$daily_orders = $total_order_type['Day']; 
								
								

							
							?>

				
						            
						   <div class="invoice_table">
								<table class="invoice_slip_table">
										<thead>
											<tr>
												<th scope="col">Cloud</th>
												<th scope="col">Distribution</th>
											</tr>
										</thead>							
										<tbody>
											<tr>
												<td scope="row"><strong>Company : </strong><?php echo $compnay_name ?></td>
												<td scope="row"><strong>Email: </strong><?php echo $user_info->user_login ?></td>                        
											</tr>
											<tr>									
												<td scope="row"><strong>Compnay Benfit: </strong></td>
												<td scope="row"><strong> <?php echo  $lunch_benfit_type. " " . $lunch_benefit; ?></td>                       
											</tr>
											<tr>
												<td scope="row"><strong>Total Compnay Lunch: </strong><?php echo $daily_orders ?></td>
												<td scope="row"><strong>Total Lunch Fixed: </strong> <?php echo $weekly_orders?></td>                        
											</tr>
											<tr>									
												<td scope="row"><strong>Total Meeting Food: </strong><?php echo $meeting_orders; ?></td>
												<td scope="row"><strong>Total Employee: </strong><?php echo $total_emp; ?></td>                       
											</tr>
											
											<tr>									
												<td scope="row"><strong>Shipping Method: </strong></td>
												<td scope="row">
													<?php  if($method == 'method_one')
															{ echo "Method 1"; echo " [Company Pay ". get_option('shipping_price') . "]";  }
															elseif($method == 'method_two')
															{ echo "Method 2"; echo " [Divided on all Employees]";  }
															else {
																{ echo "Method 3"; echo " [Pickup]";  }
															}?>
												</td>                       
										</tr>
										</tbody>
									</table>
								<h5 class="mt-4">Summary</h5>
								<table class="invoice_slip_table">
									<thead>
										<th scope="col">Description</th>
										<th scope="col">Products</th>
										<th scope="col">Price</th>
									</thead>
									<tbody>
										<?php   
										
											$shipping_days_arr = array();
											$total_price_arr = array();
											$order_price_arr = array();
											$query = new WP_Query( $args );
											if ( $query->have_posts() ) {
												while ( $query->have_posts() ) {   $query->the_post();															
													
													$order_type = get_post_meta( get_the_ID(), 'order_type', true );
													$weekid = get_post_meta( get_the_ID(), 'order_week', true );                                            
													$order_price_arr[] = $order_total;

												?> 
														<tr>
																<td scope="row"><strong><?php the_title() ?> <br/> <?php echo $order_type?><br/> [ <?php echo $weekid?>]</td>
																	<td> 
																		<table>

																		<thead>
																			<th scope="col">Day</th>
																			<th scope="col">Products</th>
																			<th scope="col">VAT</th>
																			<th scope="col">Price</th>
																			<th scope="col">Benifit</th>
																		</thead>



																			<?php   
																			$food_items =  get_post_meta( get_the_ID(), 'food_order', true );	
																			$food_price_days_arr = array();
																			$food_vat_days_arr = array();

																			$food_benfit_days_arr = array();

																			
																					foreach($food_items as $index => $food) {
																						$food_days =  count($food_items);
																						$shipping_days_arr[] = $food_days;

																						
																						
																						?>
																															<tr>
																																	<td scope="row"><strong><?php echo $index ?></td>
																																	<td>																																		
																																	<?php   foreach($food as $key => $ky_item) { 	?>
																																			<p>  <?php echo  get_the_title($key) . " [". $ky_item . "] " ; ?> NOK <?php $price = get_post_meta( $key, 'menu_item_price', true ); 
																																					echo $price   ?> </p>                                                                                                                        
																																		<?php 	}  ?>
																																		</td>																																		
																																		<td>
																																			<?php   foreach($food as $key => $ky_item) { 
																																				?>
																																					<p> NOK <?php $price = get_post_meta( $key, 'menu_item_price', true ); 
																																					$item_vat =  $price*15/100;
																																					$item_total_vat = $item_vat*$ky_item; 
																																					echo $item_total_vat;																																					
																																					$food_vat_days_arr[] =  $item_total_vat; 																																					?> </p>                                                                                                                                          
																																																																
																																				<?php 	}  ?>
																																		</td>
																																		
																																		<td>
																																			<?php   
																																				$food_benfit_arr = array();
																																				foreach($food as $key => $ky_item) { 
																																				?>
																																					<p> NOK <?php $price = get_post_meta( $key, 'menu_item_price', true ); 
																																					echo $price*$ky_item ;																																					
																																					$food_price_days_arr[] =  $price*$ky_item ;

																																					$food_benfit_arr[] = $price*$ky_item
																																					
																																					?> </p>                                                                                                                                          
																																																																
																																				<?php 	}  ?>
																																		</td>
																																		<td>

																																			<p>
																																				<?php   
																																					$food_benfit_arr_sum =  array_sum($food_benfit_arr);
																																					$total_ben = $food_benfit_arr_sum*10/100; 	

																																					
																																					if($lunch_benfit_type == '%')
																																					{
																																						//echo  $food_benfit_arr_sum*$lunch_benefit /100 ;
																																					}
																																					else{
																																					//	echo $food_benfit_arr_sum - $lunch_benefit;
																																					}
																																																																		
																																					

																																					echo "NOK ". $total_ben;	
																																					$food_benfit_days_arr[] = $total_ben;
																																					?>																																	
																																			</p>                                                                                                                                          
																																																																
																																			
																																		</td>
																																	
																															 </tr>
																														

																							<?php } 
																							
																												$total_price_day = array_sum($food_price_days_arr);
																												$total_vat_day = array_sum($food_vat_days_arr);	
																												$total_benfit_day = array_sum($food_benfit_days_arr);	

																												
																												
																												
																												?>

																													<tr>
																													<td scope="row"><strong>Total</td>
																													<td>Days : <?php echo $food_days ?>  </td>
																													<td>VAT : <?php echo $total_vat_day ?>  </td>																																	
																													<td>NOK	<?php echo $total_price_day ?> 	</td>
																													<td>NOK	<?php echo $total_benfit_day ?> 	</td>
																													</tr>

																		</table>

																	</td>
																	<td>NOK 
																		<?php   $total_price_f =  ($total_price_day + $total_vat_day)  * $food_days;
																				$total_price_f  = $total_price_f-$total_benfit_day;
																				echo $total_price_f;																	
																				$total_price_arr[] = $total_price_f;

																				
																	?>
																	
																</td>																
														</tr>

										<?php   }   }  

												$shipping_days =  count($shipping_days_arr);
												$total_order_price = array_sum($order_price_arr);
												$final_order_price = array_sum($total_price_arr);


												$final_shipping = $shipping_days*$shipping_cost;

												$shipping_vat = $final_shipping*25/100;
												$ship_vat_total = $final_shipping+$shipping_vat;

												$invoice_price = $ship_vat_total+$final_order_price;

												$invoice_price_with_emp = $invoice_price*$total_emp;
												
												
												?>  

										<tr>										
											<td scope="row"><strong>Shipping </strong> </td>
											<td>  </td>
											<td><strong></strong>NOK <?php echo $final_shipping; ?></td>
											
										</tr>
										<tr>										
											<td scope="row"><strong>VAT : </strong> </td>
											<td></td>
											<td><strong></strong>NOK <?php echo $shipping_vat ?></td>
											
										</tr>
									
											<td scope="row"><strong>Total Grand : </strong></td>
											<td></td>                            
											<td scope="row"> NOK <?php echo  $invoice_price_with_emp ?></td>
										
										</tr>
									<tbody>
               					 </table>
							</div>
							
							
                      
                     

				 
						   
	

					<?php	die;
	}



	







