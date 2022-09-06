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
			'date' => $date
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



	$post = array(
		'post_title'    => "OHYSX-" . rand(10, 100),
		'post_status'   => 'publish',
		'post_type'     => 'orders',
		'post_author' => $uid
	);
	$user_id = wp_insert_post($post);
	foreach ($weekdays as $weekday) {
		$day = $weekday;
		add_post_meta($user_id, $day, $day, true);
	}

	$t_day = count($weekdays);
	add_post_meta($user_id, 'week_id', $weekid, true);
	add_post_meta($user_id, 'order_status', 'Pending', true);
	add_post_meta($user_id, 'order_type', 'Weekly', true);


	add_post_meta($user_id, 'user_type', $usertype, true);








	add_post_meta($user_id, 'total_days', $t_day, true);

	foreach ($menu_items as $menu_item) {
		$product_id = $menu_item[0];
		$menu_item = $menu_item[1];
		$price =  get_post_meta($product_id, 'menu_item_price', true);
		$total_price = ($price * $menu_item) * $t_day;
		add_post_meta($user_id, 'total_price', $total_price, true);
		add_post_meta($user_id, 'productid-' . $product_id, $menu_item, true);
	}

	if (!is_wp_error($user_id)) {
		//sendmail($username,$password);
		echo wp_send_json(array('code' => 200, 'message' => __('Order Sucessfully Create')));
	} else {
		echo wp_send_json(array('code' => 0, 'message' => __('Error Occured please fill up form carefully.')));
	}

	die;
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


	$post = array(
		'post_title'    => "OHYSX-" . rand(10, 100),
		'post_status'   => 'publish',
		'post_type'     => 'orders',
		'post_author' => $uid
	);
	$user_id = wp_insert_post($post);

	add_post_meta($user_id, 'week_id', $weekid, true);
	add_post_meta($user_id, 'order_status', 'Pending', true);
	add_post_meta($user_id, 'order_type', 'Fixed Day', true);
	add_post_meta($user_id, 'user_type', $usertype, true);
	add_post_meta($user_id, 'order_day', $sel_day, true);

	

	
	foreach ($menu_items as $menu_item) {
		$product_id = $menu_item[0];
		$menu_item = $menu_item[1];
		$price =  get_post_meta($product_id, 'menu_item_price', true);
		$total_price = $price * $menu_item;
		add_post_meta($user_id, 'total_price', $total_price, true);
		add_post_meta($user_id, 'productid-' . $product_id, $menu_item, true);
	}

	if (!is_wp_error($user_id)) {
		//sendmail($username,$password);
		echo wp_send_json(array('code' => 200, 'message' => __('Order Sucessfully Create')));
	} else {
		echo wp_send_json(array('code' => 0, 'message' => __('Error Occured please fill up form carefully.')));
	}

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
	add_post_meta($user_id, 'user_type', 'Personal', true);


	$items = array();
	foreach ($menu_items as $menu_item) {
		$product_id = $menu_item[0];
		$menu_item = $menu_item[1];
		$price =  get_post_meta($product_id, 'menu_item_price', true);
		$total_price_item = $price * $menu_item;
		add_post_meta($user_id, 'productid_' . $product_id, $menu_item, true);
		add_post_meta($user_id, 'menu_item_price_' . $product_id, $total_price_item, true);
		$items[] = $total_price_item;
	}

	$total_price =  array_sum($items);
	add_post_meta($user_id, 'total_price', $total_price, true);
	if (!is_wp_error($user_id)) {
		echo wp_send_json(array('code' => 200, 'message' => __('Order Sucessfully Create')));
	} else {
		echo wp_send_json(array('code' => 0, 'message' => __('Error Occured please fill up form carefully.')));
	}

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

	$items = array();
	foreach ($menu_items as $menu_item) {

		$product_id = $menu_item[0];
		$menu_item = $menu_item[1];
		$price =  get_post_meta($product_id, 'menu_item_price', true);
		$total_price_item = $price * $menu_item;
		add_post_meta($user_id, 'productid_' . $product_id, $menu_item, true);
		add_post_meta($user_id, 'menu_item_price_' . $product_id, $total_price_item, true);
		$items[] = $total_price_item;
	}

	$total_price =  array_sum($items);
	add_post_meta($user_id, 'total_price', $total_price, true);
	add_post_meta($user_id, 'order_day', '1', true);
	add_post_meta($user_id, 'order_status', 'Pending', true);
	add_post_meta($user_id, 'order_type', 'Meeting', true);
	add_post_meta($user_id, 'user_type', $order, true);

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
	$user_id = update_user_meta($uid, 'profile_address', $address);
	if (!is_wp_error($user_id)) {
		//sendmail($username,$password);
		echo wp_send_json(array('code' => 200, 'message' => __('Address Updated')));
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
	$starting_date = $_POST['starting_date'];

	$user_id = update_user_meta($uid, 'starting_date', $address);
	if (!is_wp_error($user_id)) {
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

	$user_id = update_user_meta($uid, 'profile_delivery_phone', $profile_delivery_phone);
	if (!is_wp_error($user_id)) {
		update_user_meta($uid, 'profile_delivery_address', $profile_delivery_address);
		update_user_meta($uid, 'profile_delivery_email', $profile_delivery_email);
		echo wp_send_json(array('code' => 200, 'message' => __('Address Updated')));
	} else {
		echo wp_send_json(array('code' => 0, 'message' => __('Error Occured please check address')));
	}

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


add_action('wp_ajax_profile_card_number', 'profile_card_number', 0);
add_action('wp_ajax_nopriv_profile_card_number', 'profile_card_number');

function profile_card_number()
{
	global $wpdb;
	$uid = stripcslashes($_POST['uid']);
	$profile_card_no = $_POST['profile_card_no'];

	$user_id = update_user_meta($uid, 'profile_card_no', $profile_card_no);
	if (!is_wp_error($user_id)) {

		echo wp_send_json(array('code' => 200, 'message' => __('Profile Card Number Updated')));
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
	$profile_allergies_other = $_POST['profile_allergies_other'];

	$user_id = update_user_meta($uid, 'profile_allergies_other', $profile_allergies_other);
	if (!is_wp_error($user_id)) {

		echo wp_send_json(array('code' => 200, 'message' => __('Profile Allergies Updated')));
	} else {
		echo wp_send_json(array('code' => 0, 'message' => __('Error Occured please check address')));
	}
	die;
}







add_action('wp_ajax_get_type_products', 'get_type_products', 0);
add_action('wp_ajax_nopriv_get_type_products', 'get_type_products');

function get_type_products()
{
	global $wpdb;
	
	$lunch_type = $_GET['lunch_type'];
	$lunch_day = $_GET['lunch_day'];	
	 	query_posts(array(
                                    'post_type' => 'menu_items',
                                    'posts_per_page' => 5,
                                    'menu_food_type' => $lunch_type
                                ));
                                if (have_posts()) :  while (have_posts()) : the_post();
								 $i++;


								       
										//echo $days[$i];

										$today_day = $lunch_day;							
									
                                        $pid = get_the_ID(); ?>
       <div id="food_<?php echo $pid ?>" genrateid="<?php echo $today_day ?>_id_<?php echo $pid ?>" product-id="<?php echo $pid ?>" onClick="reply_click(this.id, '<?php echo $today_day ?>')"><?php the_title(); ?></div>
                                    <?php endwhile;
                                    wp_reset_query();
                                else : ?>
                                    <h2><?php _e('Nothing Found', 'lbt_translate'); ?></h2>
                                <?php endif; 


	


	

	

	die;
}
