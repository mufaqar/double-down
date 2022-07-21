<?php 



get_header();
			

 global $current_user;
$logged_user = wp_get_current_user();
$UIL =  $logged_user->user_login;
$uid =  $logged_user->ID;


if ( is_user_logged_in() ) {
  $url =  home_url(). '/dashboard/';
wp_redirect($url);
exit();
} else {
  echo "Not Login";
}



?>


    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
            	
                <div class="error"></div>
                         <form class="card auth_form" id="addEducation" action="#" > 
                            <div class="body">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="username" placeholder="Username">
                                   
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="email" placeholder="Enter Email">
                                    
                                </div>                        
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                                            
                                </div>
                                
                                <input type="submit" class="btn btn-primary btn-block waves-effect waves-light" value="SIGN UP">
                                <div class="signin_with mt-3">
                                    <a class="link" href="<?php echo home_url('login'); ?>">You already have a membership?</a>
                                </div>
                            </div>
                        </form>
              
                </div>
            
        </div>
    </div>



    <?php get_footer();?>



   <script type="text/javascript">
   
   jQuery(document).ready(function($) {
	   

	  
		
		
	$("#addEducation").submit(function(e) { 
        e.preventDefault();
        var username = jQuery('#username').val();
	    	var email = jQuery('#email').val();
        var password = jQuery('#password').val();	
        jQuery.ajax({
          type:"POST",
          url:"<?php echo admin_url('admin-ajax.php'); ?>",
          data: {
            action: "usersignup",
            username : username,
		        email : email,
			      password : password
          },
          success: function(response){
            console.log(response);
			  $('.error').html(response);
			//  alert(response); 
			  // setInterval('location.reload()', 1000);
			  
       
          },
          error: function(results) {
			   jQuery('.register-message').text(fail).show();

          }
        });
      });
	  
	 
		   
	
	});

	</script>


