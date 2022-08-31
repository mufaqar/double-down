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
	$file_name = $_FILES["file"]["name"];
	$file_url        = $_FILES["file"]["tmp_name"]; 

	$post = array(
		'post_title'    => $food_name,
		'post_status'   => 'publish',
		'post_type'     => 'menu_items',
		'post_author' => $uid,
        'meta_input'   => array(
		'menu_item_price' => $food_price			
		),
		'tax_input'    => array(
			'menu_types' => array($lunch_type),
			'menu_sub_types' => array($lunch_sub_type)
		),
	);
	$post_id = wp_insert_post($post);





	    $image_url        = $file_url; // Define the image URL here
		$image_name       = $file_name;
		$upload_dir       = wp_upload_dir(); // Set upload folder
		$image_data       = file_get_contents($image_url); // Get image data
		$unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); // Generate unique name
		$filename         = basename( $unique_file_name ); // Create image file name
		
		// Check folder permission and define file location
		if( wp_mkdir_p( $upload_dir['path'] ) ) {
			$file = $upload_dir['path'] . '/' . $filename;
		} else {
			$file = $upload_dir['basedir'] . '/' . $filename;
		}
		// Create the image  file on the server
		file_put_contents( $file, $image_data );
			// Check image file type
		$wp_filetype = wp_check_filetype( $filename, null );
		
		// Set attachment data
		$attachment = array(
			'post_mime_type' => $wp_filetype['type'],
			'post_title'     => sanitize_file_name( $filename ),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);


		if (!is_wp_error($post_id)) {
			
			
			// Create the attachment
		  $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
		  
		  // Include image.php
		  require_once(ABSPATH . 'wp-admin/includes/image.php');
		  
		  // Define attachment metadata
		  $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
		  
		  // Assign metadata to attachment
		  wp_update_attachment_metadata( $attach_id, $attach_data );
		  
		  // And finally assign featured image to post
		  set_post_thumbnail( $post_id, $attach_id );

		  echo wp_send_json(array('code' => 200, 'message' => __('Food Created Sucessfully')));
		  
			  } else {	    	
				echo wp_send_json(array('code' => 0, 'message' => __('Error Occured please fill up form carefully.')));  
			}	

	die;
}
