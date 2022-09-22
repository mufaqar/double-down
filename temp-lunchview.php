<?php /* Template Name: LunchMenu-Non Login  */
get_header();


$no_week =  date("Y-W");
$query_week = $_REQUEST['week'];
if($query_week == '') {
    $query_week = $no_week;
}
$week_arr = explode("-", $query_week, 2);
$week=$week_arr[1];
$year=$week_arr[0];
?>
              
  <main class="launch_calandar">
        <div class="row d-flex">
            <div class="" style="width: 230px;">           
                <div class="sidebar p-0 align-items-start pt-5">
                    <div class="d-flex justify-content-center">
                       <a href="<?php bloginfo('url'); ?>"> <img src="<?php bloginfo('template_directory'); ?>/reources//images/logo.png" class="logo" alt=""></a>
                    </div>
                    <div class="toggle_btn bg-light mt-4 mb-4 d-flex mx-3">
                        <?php profile_user_nav()?>
                    </div>
                    <div>
                        
                        <?php 	
								  wp_nav_menu ( array(
                                    'container'       => false,	
									'theme_location'  => 'profile',	
									'menu_class'      => 'myProfileNav activeNav'
								) );
								?>

                       
                            
                        <?php 	
								  wp_nav_menu ( array(
									'theme_location'  => 'company',								
									'container'       => false,									
									'menu_class'      => 'companyProfileNav'
								) );
								?>

                    </div>
                    <div class="logout">                       	
                    <a href="<?php echo wp_logout_url( home_url() ); ?>"> <img src="<?php bloginfo('template_directory'); ?>/reources//images/logout.png" alt=""><span>Log Out</span></a>
                    </div>
                    <img src="<?php bloginfo('template_directory'); ?>/reources/images/cancel.png" class="hide_nav" alt="" onclick="HideNav()">
            </div>
        </div>    


        <div class="content">
                <div class="container_wrapper">
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <div class="hamburger">
                            <img src="<?php bloginfo('template_directory'); ?>/reources/images/hamburger.png" alt="" id="hamburgerbtn" onclick="hamburger()">
                        </div>
                        <div class="proofile_info d-flex align-items-center">
                        <div class="user">
                                <h6><?php global $current_user; wp_get_current_user();  $uid = $current_user->ID;?>
                                    <?php if ( is_user_logged_in() ) { 
                                    echo 'Hey, ' .  $current_user->display_name ; } 
                                    else {

                                       // wp_redirect( home_url('login'));                                     
                                       // exit;


                                    }
                                    ?></h6>
                                <p>Agreement: <?php echo get_user_meta( $uid, 'compnay_name', true); 	?></p>                            

                            </div>
                            <img src="<?php bloginfo('template_directory'); ?>/reources//images/profile.webp" alt="">
                        </div>                        
                    </div>
    <div class="tab_wrapper">
        <?php //page_title() ?>
    </div>

    
            <div class="row ">
                <div class="catering_wrapper mt-5 mb-5 col-md-8">
                    <div class="catering_menu buttons">
                        <a id="1" class="showSingle _active" target="1" data="bread-lunch" data-title="bread lunch"> Bread Lunch</a>
                        <a id="2" class="showSingle" target="2" data="salad-lunch" data-title="salad lunch">Salad Lunch</a>
                        <a id="3" class="showSingle" target="3" data="wrap-lunch" data-title="wrap lunch">Wrap Lunch</a>
                    </div>
                </div>
            </div>
             <div class="custom_container catering_wrapper ">                       
                       <div class="calender_wrapper d-flex justify-content-between align-items-center mt-5">
                            <h2>This week's <span id="type">bread lunch</span> menu</h2>
                            <div class="calender week_calender">
                                    <form action="" method="GET" id="weekform">
                                        <input type="hidden" name="catname" id="catname" value="bread-lunch" />
                                        <input type="text" id="weekPicker1" name="week" value="<?php echo date("Y-W"); ?>" >
                                        <div class="wc-icon"><i class="fa-solid fa-calendar-days"></i></div>
                                    </form>
                            </div> 
             </div>
    
            <section id="div1" class="targetDiv activediv">
            <?php  get_template_part( 'partials/menu', 'lunch' );  ?>          
            </section>                
            <section id="div2" class="targetDiv">   
                <div class="catering_card_wrapper">
                    <div class="ajaxload"></div>         
                    </div> 
            </section>
            <section id="div3" class="targetDiv">
            <div class="catering_card_wrapper">
                    <div class="ajaxload"></div>         
                    </div> 
            </section>

        </div>
        </div>
       </div>
      </div>
    </div>
</main>


<?php get_footer(); ?>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/reources/js/script.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>



<!-- week calender  -->

<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/reources/js/weekPicker.min.js"></script>
<script>
    convertToWeekPicker($("#weekPicker1"));
    convertToWeekPicker($("#weekPicker2"));
    convertToWeekPicker($("#weekPicker3"));
    window.addEventListener('load', function() {
            var element = document.getElementById('displayDate');
            var MutationObserver = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;
            var observer = new MutationObserver(myFunction);
            observer.observe(element, {
                childList: true
            });
            function myFunction() { 
               // document.getElementById("weekform").submit();   
               jqueryFunction();        
                }
            
        });

</script>

<script>  




jQuery(document).ready(function($) 
        {   

            jqueryFunction = function()
                    {
                        var weekid = jQuery('#weekPicker1').val(); 
                        var catname = jQuery('#catname').val();     
                       // alert(catname);                      
                        $.ajax({
                            type:"POST",
                            url: "<?php echo admin_url('admin-ajax.php'); ?>",
                            data: {
                                action: "get_type_products",
                                weekid : weekid,
                                catname : catname
                            },           
                            success: function(data) {
                                if (data.code == 0) {
                                    alert(data.message);
                                } else { 
                                  $(".ajaxload").html(data);
                                  $(".foodlist").hide();
                                    
                                }
                            }

                        });
                    }
       


        jQuery(function() {  
        jQuery('#div2').hide();
        jQuery('#div3').hide();
        jQuery('.showSingle').click(function() {
            var cat_name = $(this).attr('data');          
            var weekid = jQuery('#weekPicker1').val();  
            $(".showSingle").removeClass("_active");
            $(this).addClass("_active");
            $("#catname").val($(this).attr('data') );
            $("span#type").html($(this).attr('data-title'));            
            jQuery('.targetDiv').hide();
            jQuery('#div' + $(this).attr('target')).show();
            jQuery('#div' + $(this).attr('target')).addClass('_showdata');                             
             $.ajax({
                            type:"POST",
                            url: "<?php echo admin_url('admin-ajax.php'); ?>",
                            data: {
                                action: "get_type_products",
                                weekid : weekid,
                                catname : cat_name
                            },           
                            success: function(data) {
                                if (data.code == 0) {
                                    alert(data.message);
                                } else {   
                                  $(".ajaxload").html(data);                            
                                    
                                }
                            }

                        });
            
        });
    });

});
   
</script>