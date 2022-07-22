<?php
add_action('wp_ajax_usersignup', 'usersignup', 0);
add_action('wp_ajax_nopriv_usersignup', 'usersignup');
function usersignup() {	
	  global $wpdb; 	
	  $username = ($_POST['username']);
      $email = ($_POST['username']);
      $phone = stripcslashes($_POST['phone']);
      $referral = stripcslashes($_POST['referral']);	
      $name = stripcslashes($_POST['name']);
      $password = "123456789";


	  

    $user_id = wp_insert_user($userdata);

	global $wpdb; 

			$errors = array();  
			// Check username is present and not already in use  
			$username = $wpdb->escape($username);  
			 
			if(empty($username)) 
			{   
				$errors['username'] = "Please enter a username";  
				
				
			} else if( username_exists( $username ) ) 
			{  
				$errors['username'] = "Username already exists, please try another";
				
			} 


			if(count($errors) > 0 ){
				foreach($errors as $e){
					echo $e . "<br />";
				}
			}
			else {
			
			 $new_user_id = wp_create_user( $username, $password, $email );  
			 
			 echo "User Created Sucess Fully";  
      		 exit();  
		
			
				}





   
		
}

