<?php
add_action('wp_ajax_usersignup', 'usersignup', 0);
add_action('wp_ajax_nopriv_usersignup', 'usersignup');
function usersignup() {	
	  global $wpdb; 	
	  $username = stripcslashes($_POST['username']);
      $phone = stripcslashes($_POST['phone']);
	  $password = '123456';
	  $email = stripcslashes($_POST['email']);	
	  
	 		
		$errors = array();  
		// Check username is present and not already in use  
        $username = $wpdb->escape($username);  
        if ( strpos($username, ' ') !== false )
        {   
            $errors['username'] = "Sorry, no spaces allowed in usernames"; 
			
        }  
        if(empty($username)) 
        {   
            $errors['username'] = "Please enter a username";  
			
			
        } elseif( username_exists( $username ) ) 
        {  
            $errors['username'] = "Username already exists, please try another";
			
        }  
   
        // Check email address is present and valid  
        $email = $wpdb->escape($_REQUEST['email']);  
        if( !is_email( $email ) ) 
        {   
            $errors['email'] = "Please enter a valid email";  
			
        } elseif( email_exists( $email ) ) 
        {  
            $errors['email'] = "This email address is already in use"; 
				
        }  
   
        // Check password is valid  
        if(0 === preg_match("/.{6,}/", $_POST['password']))
        {  
          $errors['password'] = "Password must be at least six characters";  
		  
        }  
    
		if(count($errors) > 0){
				foreach($errors as $e){
					echo $e . "<br />";
				}
			}
			else {
			
			 $new_user_id = wp_create_user( $username, $password, $email );  
			 
			 echo "<script type='text/javascript'>window.location.href='". home_url('/account') ."'</script>";  
      		 exit();  
		
			
				}
				
   
			
		
			
   
   
		
}


