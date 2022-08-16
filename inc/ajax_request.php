<?php


add_action('wp_ajax_addcatering', 'addcatering', 0);
add_action('wp_ajax_nopriv_addcatering', 'addcatering');

function addcatering() {		
	  global $wpdb;		
	 
      $people = stripcslashes($_POST['people']);
	  $menu_items = $_POST['date'];
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
			echo wp_send_json( array('code' => 200 , 'message'=>__('Order Sucessfully Create')));

	  	} else {        
			  echo wp_send_json( array('code' => 0 , 'message'=>__('Error Occured please fill up form carefully.')));
	      	}
	  	
	die;   

	
		
}




add_action('wp_ajax_weeklyfood', 'weeklyfood', 0);
add_action('wp_ajax_nopriv_weeklyfood', 'weeklyfood');

function weeklyfood() {		
	  global $wpdb;		
	 
      $weekdays = $_POST['weekdays'];
	  $menu_items = $_POST['menu_items'];

	  die();




	  

	

	
	  
      
	  $post = array(
		'post_title'    => "Order" ,	
		'post_status'   => 'publish',
		'post_type'     => 'orders',		
		
		
		
	);
	   $user_id = wp_insert_post($post);

	   

	   foreach($weekdays as $weekday){

		$day = $weekday;
		add_post_meta($user_id, $day, $day, true);

	   
	 }

	
	 foreach($menu_items as $menu_item){
		$product_id = $menu_item[0];
		$menu_item = $menu_item[1];	
		add_post_meta($user_id, $menu_item, $menu_item, true);
	  
	 }



	  	if (!is_wp_error($user_id)) {		    
			//sendmail($username,$password);
			echo wp_send_json( array('code' => 200 , 'message'=>__('Order Sucessfully Create')));

	  	} else {        
			  echo wp_send_json( array('code' => 0 , 'message'=>__('Error Occured please fill up form carefully.')));
	      	}
	  	
	die;   

	
		
}








