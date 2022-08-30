<?php

// Meeting Ajax


add_action('wp_ajax_addfood', 'addfood', 0);
add_action('wp_ajax_nopriv_addfood', 'addfood');

function addfood()
{
	global $wpdb;
	$food_name = $_POST['food_name'];
	$lunch_type = $_POST['lunch_type'];
	$lunch_sub_type = $_POST['lunch_sub_type'];
	$food_price = $_POST['food_price'];
    $uid = $_POST['uid'];




	$post = array(
		'post_title'    => $food_name,
		'post_status'   => 'publish',
		'post_type'     => 'menu_items',
		'post_author' => $uid,
        'meta_input'   => array(
			'food_price' => $food_price			
		),
		'tax_input'    => array(
			'menu_types' => array($lunch_type),
			'menu_sub_types' => array($lunch_sub_type)
		),
	);
	$user_id = wp_insert_post($post);
	$price =  get_post_meta($product_id, 'menu_item_price', true);
	
	add_post_meta($user_id, 'order_type', 'Meeting', true);
	add_post_meta($user_id, 'user_type', $order, true);

	if (!is_wp_error($user_id)) {
		//sendmail($username,$password);
		echo wp_send_json(array('code' => 200, 'message' => __('Food Created Sucessfully')));
	} else {
		echo wp_send_json(array('code' => 0, 'message' => __('Error Occured please fill up form carefully.')));
	}

	die;
}
