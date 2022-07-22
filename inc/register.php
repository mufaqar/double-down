<?php
add_action('wp_ajax_usersignup', 'usersignup', 0);
add_action('wp_ajax_nopriv_usersignup', 'usersignup');
function usersignup() {	

	require_once('../../../wp-config.php');
		global $wpdb;


		
	  $username = ($_POST['username']);
      $email = ($_POST['username']);
      $phone = stripcslashes($_POST['phone']);
      $referral = stripcslashes($_POST['referral']);	
      $name = stripcslashes($_POST['name']);
      $password = "123456789";


	 

 

	

			$errors = array();  
			// Check username is present and not already in use  
			$username = $wpdb->escape($username);  
			 
			if(empty($username)) 
			{   
				$errors['username'] = "Please enter a username";  
				
				
			} elseif( username_exists( $username ) ) 
			{  
				$errors['username'] = "Username already exists, please try another";
				
			} 


			if(count($errors) > 0 ){
				foreach($errors as $e){
					echo $e . "<br />";
				}
				
			}
			else {

				echo "User Added";
			
			 //$new_user_id = wp_create_user( $username, $password, $email );  
			 
			 //echo "User Created Sucess Fully";  
      		 exit();  
		
			
				}





   
		
}

