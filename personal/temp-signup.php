<?php /* Template Name: Signup ( Profile ) */ 



get_header();


?>  <main class="business_agreement">
<div
    class="agreement_wrapper d-flex position-relative justify-content-center flex-column align-items-center p-4">
    <img src="<?php echo get_template_directory_uri(); ?>/reources/images/logo.png" class="logo" alt="logo" />

    <form class="addprofile" id="addProfile" action="#" > 
        <div class="first_step step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
            <img src="<?php echo get_template_directory_uri(); ?>/reources/images/left arrow.png" class="arrow position-absolute" alt="back arrow" />
            <h2 class="mt-5">Your Information</h2>
            <p>
                As a buisness administrator, you must hve your own user to log in.
                Then you get full access tothe corporate agreement , and can add
                more administrators
            </p>
            <div class="mt-5 w-500">
                <div class="form-group ">
                    <label for="exampleInputEmail1">Referral Name</label>
                    <input type="text" class="form-control" id="referral" aria-describedby="emailHelp" placeholder="Hasnain Ali" />
                </div>
                <div class="form-group  mt-3">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                        placeholder="" />
                </div>
                <div class="form-group  mt-3">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="username" aria-describedby="emailHelp" placeholder=""  required  />
                </div>
                <div class="form-group  mt-3 mb-5">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="number" class="form-control" id="phone" aria-describedby="emailHelp" placeholder=""  />
                </div>

                <div class="tou mt-5">
                    <h2 class="">
                        Term of use, privacy andrelevant
                        information
                    </h2>
                    <p style="margin-top: -.8rem;" class="mb-4">
                        I will receive relevant information about product and services
                        from the Lunch Collective. This can be , for example,information
                        about the lunch menu and nutritional content,news and changes,
                        offers, compaigns, surveys etc. We promise not to bother you
                        prematurely
                    </p>

                    <div class="d-flex align-items-center mb-5">
                        <p class="">
                            <input type="radio" id="test1" name="radio-group" checked>
                            <label for="test1">Yes, Please</label>
                        </p>
                        <p style="margin-left: 2rem;">
                            <input type="radio" id="test2" name="radio-group">
                            <label for="test2">No Thanks</label>
                        </p>
                    </div>

                </div>

                <button type="next" class="btn_primary d-block next" >Complete</button>
            </div>
        </div>

        <!-- finish step  -->

        <div class="finish_step step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
            <!-- <img src="./reources/images/left arrow.png" class="arrow position-absolute" alt="back arrow"
                onclick="backToStepThree()"> -->
            <div class="content mt-5">
                <div class="right">
                    <img src="./reources/images/img 3.png" alt="" />
                </div>
                <h1 class="finished">Finished!</h1>
                <h2 class="looking">We Looking forward to make lunch with you</h2>
                <p class="find_information">
                    We have now sent you an Email where you will find information on
                    how to login and manage your company and your orders.Companies
                    receive an invoice at the end of each month.
                </p>
                <h3 class="employees_receive">
                    Employees receive it at the end of each week
                </h3>
                <a href="" class="btn_primary mb-5">Go to the front</a>
            </div>
        </div>
    </form>
</div>
</main>





    <?php get_footer();?>
    <script type="text/javascript">
   
   jQuery(document).ready(function($) {

  
		
		
	$("#addProfile").submit(function(e) {     
        e.preventDefault();
        var username = jQuery('#username').val();
	    var email = jQuery('#email').val();
        var referral = jQuery('#referral').val();	
        var phone = jQuery('#phone').val();	
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




