<?php

function sendmail($to,$password) {
	$to = $username;
	$admin = 'hei@doubledowndish.no';
	$subject = 'Double Down Dish | Username & Password';
	$body  = "<p><strong> Username :  </strong> $username </p> <p> <strong> Password : </strong> $password  </p>";
	$headers = array('Content-Type: text/html; charset=UTF-8');	
	$headers  = "From: " . $admin . "\r\n";
	$headers .= "Reply-To: " . $username . "\r\n";		
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	mail( $to, $subject, $body, $headers );


	}



add_action('wp_ajax_usersignup', 'usersignup', 0);
add_action('wp_ajax_nopriv_usersignup', 'usersignup');


function usersignup() {	

	//require_once('../../../wp-config.php');
		global $wpdb;


		
	  $username = ($_POST['username']);
      $email = ($_POST['username']);
      $phone = stripcslashes($_POST['phone']);
      $referral = stripcslashes($_POST['referral']);	
      $name = stripcslashes($_POST['name']);    


	  function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	$password = generateRandomString();
	

	
	  $user_data = array(
		'user_login' => $username,
		'user_email' => $email,
		'user_pass' => $password,	
		'display_name' => $name,
		'role' => 'personal'
		);
	    $user_id = wp_insert_user($user_data);
	  	if (!is_wp_error($user_id)) {
		    
			sendmail($to,$password);


			echo wp_send_json( array('code' => 200 , 'message'=>__('we have Created an account for you.')));

	  	} else {
	    	if (isset($user_id->errors['empty_user_login'])) {
	          
			  echo wp_send_json( array('code' => 0 , 'message'=>__('User Name and Email are mandatory')));
	      	} elseif (isset($user_id->errors['existing_user_login'])) {
	         // echo 'User name already exixts.';
			  echo wp_send_json( array('code' => 0 , 'message'=>__('This email address is already registered.')));
	      	} else {	         
			  echo wp_send_json( array('code' => 0 , 'message'=>__('Error Occured please fill up the sign up form carefully.')));
	      	}
	  	}
	die;   
		
}



add_action('wp_ajax_companysignup', 'companysignup', 0);
add_action('wp_ajax_nopriv_companysignup', 'companysignup');
function companysignup() {	

	//require_once('../../../wp-config.php');
		global $wpdb;		
		$username = ($_POST['username']);
		$email = ($_POST['username']);
		$phone = stripcslashes($_POST['phone']);
		$compnay_name = $_POST['compnay_name'];	
		$company_address = $_POST['company_address'];	
		$oranch_as = $_POST['oranch_as'];	
		$lunch_benefit = $_POST['lunch_benefit'];
		$lunch_benfit_type = $_POST['lunch_benfit_type'];
		$start_date = $_POST['start_date'];
		
		
		$invite_user1 = $_POST['invite_user1'];	
		$invite_user2 = $_POST['invite_user2'];	
		$invite_user3 = $_POST['invite_user3'];	

		function generateRandomString($length = 10) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}

		$password = generateRandomString();

		
	

	
	  $user_data = array(
		'user_login' => $username,
		'user_email' => $email,
		'user_pass' => $password,	
		'display_name' => $compnay_name,
		'role' => 'company'
		);
	    $user_id = wp_insert_user($user_data);
		
	  	if (!is_wp_error($user_id)) {

			//update_user_meta( $user_id, 'country', 'Pakistan');
			update_user_meta( $user_id, '_address', $company_address);
			update_user_meta( $user_id, '_lunch_benefit', $lunch_benefit);
			update_user_meta( $user_id, '_lunch_benfit_type', $lunch_benfit_type);
			update_user_meta( $user_id, '_oranch_as', $oranch_as);
			update_user_meta( $user_id, '_start_date', $start_date);

			// User Inviated 
			if($invite_user1 != '') {
				$invited_user_data = array(
					'user_login' => $invite_user1,
					'user_email' => $invite_user1,
					'user_pass' => $password,
					'role' => 'personal'
					);
	
				$c_user_id = wp_insert_user($invited_user_data);
				update_user_meta( $c_user_id, '_afflite', $username);
	
			}
			// User Inviated 
			if($invite_user2 != '') {
				$invited_user2_data = array(
					'user_login' => $invite_user2,
					'user_email' => $invite_user2,
					'user_pass' => $password,
					'role' => 'personal'
					);
	
				$c_user2_id = wp_insert_user($invited_user2_data);
				update_user_meta( $c_user2_id, '_afflite', $username);
	
			}

			// User Inviated 
			if($invite_user3 != '') {
				$invite_user3_data = array(
					'user_login' => $invite_user3,
					'user_email' => $invite_user3,
					'user_pass' => $password,
					'role' => 'personal'
					);
	
				$c_user3_id = wp_insert_user($invite_user3_data);
				update_user_meta( $c_user3_id, '_afflite', $username);
	
			}

			

			




		    $to = $username;
			$admin = 'hei@doubledowndish.no';
			$subject = 'Double Down Dish | Username & Password';
			$body  = "<p><strong> Username :  </strong> $username </p> <p> <strong> Password : </strong> $password  </p>";
			$headers = array('Content-Type: text/html; charset=UTF-8');	
			$headers  = "From: " . $admin . "\r\n";
			$headers .= "Reply-To: " . $username . "\r\n";		
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
			mail( $to, $subject, $body, $headers );
			echo wp_send_json( array('code' => 200 , 'message'=>__('we have Created an account for you.')));

	  	} else {
	    	if (isset($user_id->errors['empty_user_login'])) {	          
			  echo wp_send_json( array('code' => 0 , 'message'=>__('User Name and Email are mandatory')));
	      	} elseif (isset($user_id->errors['existing_user_login'])) {
			  echo wp_send_json( array('code' => 0 , 'message'=>__('This email address is already registered.')));
	      	} else {	         
			  echo wp_send_json( array('code' => 0 , 'message'=>__('Error Occured please fill up the sign up form carefully.')));
	      	}
	  	}
	die;


	 

 

	

			




   
		
}



