<?php /* Template Name: Settings (P)  */
get_header();
$uid = get_current_user_id();
$user_info = get_userdata($uid);
?>
<?php include('navigation.php'); ?>
<!-- tabs -->

<div class="tab_wrapper">
    <?php page_title() ;   ?>

    <div class='panels'>
        <div class='panel launchClander setting_tab'>
            <div class="deatil_card d-flex justify-content-between align-items-center">
                <div class="info">
                    <h3>Fast Levering</h3>
                    <p><?php echo get_user_meta($uid,'Personal_days',true);?> Days</p>
                </div>

                <div class="">
                    <!-- <button id="showfast_leaving" class="btn_primary">Change</button> -->
                </div>
            </div>
            <!-- 2nd -->
            <div class="deatil_card d-flex justify-content-between align-items-center">
                <div class="info">
                    <h3>Delivery Address</h3>
                    <p><?php echo get_user_meta($uid, 'profile_delivery_address', true);  ?>
                    </p>
                </div>
                <div class="">
                    <button id="show_address" class="btn_primary">Update</button>
                </div>

            </div>
            <!-- 3rd  -->
            <div class="deatil_card d-flex justify-content-between align-items-center">
                <div class="info">
                    <h3>Corporate Agreement</h3>
                    <p><?php echo get_user_meta($uid, 'compnay_agreement',true);?></p>
                    <p>
                        <strong><span>Email : </span></strong>
                        <span class="underline"><?php echo get_user_meta($uid, 'profile_delivery_email',true);?></span>
                    </p>
                </div>

            </div>

            <!-- 4th  -->
            <div class="deatil_card d-flex justify-content-between align-items-center">
                <div class="info">
                    <h3>Profile</h3>
                    <p><?php echo get_user_meta($uid, 'compnay_agreement',true);?><br>
                    <br>
                        <strong><span>Phone: </span></strong><?php echo get_user_meta($uid, 'profile_delivery_phone',true);?>
                        | <strong><span>Email: </span></strong> <?php echo get_user_meta($uid, 'profile_delivery_email',true);?>

                </div>
                <div class="">
                   
                    <button id="show_profile" class="btn_primary">Update</button>
                </div>
            </div>

            <!-- 5th  -->
            <!-- <div class="deatil_card d-flex justify-content-between align-items-center">
                <div class="info">
                    <h3>Payment</h3>
                    <p>**** **** **** 2124</p>
                </div>
                <div class="">
                    <button id="change_payment_card_no" class="btn_primary">Change</button>
                </div>
            </div> -->

            <!-- 6th  -->
            <div class="deatil_card d-flex justify-content-between align-items-center">
                <div class="info">
                    <h3>Allergies and others</h3>

                    
                    <?php $user_allergies =  get_user_meta($uid, 'profile_alergies',true);
                    foreach($user_allergies as $key => $user_alery)
                    {

                        echo "<p>".$user_alery. "</p>";
                    }
                    
                    
                    
                    ?> 
                  
                </div>
                <div class="">
                    <button id="change_allergies" class="btn_primary">Select</button>
                </div>
            </div>

            <!-- 7th  -->
            <div class="deatil_card d-flex justify-content-between align-items-center">
                <div class="info">
                    <h3>How can we contact you?</h3>
                    <p><strong><span>Contact : </span></strong><?php echo get_user_meta($uid, 'profile_contact',true);?> </p>
                </div>
                <div class="">                 
                    <button id="show_contact" class="btn_primary">Select</button>

                    
                </div>
            </div>

            <!-- 8th  -->
            <div class="deatil_card d-flex justify-content-between align-items-center mb-5">
                <div class="info">
                    <h3>Invoice</h3>
                    <p>Overview</p>

                </div>
                <div class="">
                <button id="show_invoice" class="btn_primary">Select</button>
                </div>
            </div>

        </div>

    </div>
</div>


</div>
</div>
</div>
</div>
</main>
<section class="hideme alertmessage">
    <div class="popup">
        <div class="popup_wrapper">
            <div class="order_confirm d-flex position-relative justify-content-center flex-column align-items-center p-4">
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/logo.png" class="logo" alt="logo">

                <div class="step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
                    <div class="content mt-5">
                        <div class="right"><img src="<?php bloginfo('template_directory'); ?>/reources/images/img 3.png" alt=""></div>
                        <h1 class="finished">Finished!</h1>
                        <h2 class="mb-5 mt-5">Your Order has beed submitted!</h2>

                    </div>
                </div>

            </div>
            <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
        </div>
    </div>
</section>


<section class="hideme overlay delivery_address_popup">
    <div class="popup">
        <form class="profile_deliver_address" id="profile_deliver_address" action="#">
            <div class="popup_wrapper">
                <h3 class="ad_productss">Delivery Address</h3>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Delivery Address</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="profile_delivery_address" id="profile_delivery_address" value="<?php echo get_user_meta($uid, 'profile_delivery_address', true);  ?>">
                        <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid">
                        <!-- <img src="<?php bloginfo('template_directory'); ?>/reources/images/pin.png" alt=""> -->
                    </div>
                </div>
                <!-- <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Phone </label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="profile_delivery_phone" id="profile_delivery_phone" value="<?php echo get_user_meta($uid, 'profile_delivery_phone', true);  ?>">
                    </div>
                </div>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Email Addres</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="profile_delivery_email" id="profile_delivery_email" value="<?php echo get_user_meta($uid, 'profile_delivery_email', true);  ?>">
                    </div>
                </div> -->

                <div class="mt-5">
                    <input type="submit" class="btn_primary" value="Save" />
                </div>

                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </form>
    </div>
</section>


<section class="hideme overlay fast_leaving_popup">
    <div class="popup">
        <form class="profile_deliver_fast" id="profile_deliver_fast" action="#">
            <div class="popup_wrapper">
                <h3 class="ad_productss">Fast Levering</h3>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Days</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="profile_delivery_days" id="profile_delivery_days" placeholder="<?php echo get_user_meta($uid, 'profile_delivery_days', true);  ?>">
                        <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid">

                    </div>
                </div>


                <div class="mt-5">
                    <input type="submit" class="btn_primary" value="Save" />
                </div>

                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </form>
    </div>
</section>

<section class="hideme overlay show_profile_popup">
<div class="popup">
        <form class="profile_details" id="profile_details" action="#">
            <div class="popup_wrapper">
                <h3 class="ad_productss">Profile Details</h3>                
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Phone </label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="profile_delivery_phone" id="profile_delivery_phone" placeholder="<?php echo get_user_meta($uid, 'profile_delivery_phone', true);  ?>">
                    </div>
                </div>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Email Addres</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="profile_delivery_email" id="profile_delivery_email" placeholder="<?php echo get_user_meta($uid, 'profile_delivery_email', true);  ?>">
                    </div>
                </div>

                <div class="mt-5">
                    <input type="submit" class="btn_primary" value="Save" />
                </div>

                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </form>
    </div>
</section>

<section class="hideme overlay show_allergies_popup">
    <div class="popup">
        <form class="profile_allergies_form" id="profile_allergies_form" action="#">
            <div class="popup_wrapper">
                <h3 class="ad_productss">Change allergies & other</h3>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">

                <section class="w-100">
                    
                
               <select id="choices-alergies" placeholder="Select allergies" multiple>

               <?php   
                            $allergies_tax = get_terms( array('taxonomy' => 'allergies','hide_empty' => false ) ); 
                            foreach( $allergies_tax as $allergy )  { 
                                $type_slug = $allergy->slug ;
                                $type_name = $allergy->name ; ?>
                                        <option value="<?php echo $type_slug; ?>"><?php echo $type_name; ?> </option>
                                            <?php
                                }                                                    
                            ?>
                        </select>
                    
                        <section>
                </div>
                <div class="mt-5">
                    <input type="submit" class="btn_primary" value="Save" />
                </div>
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </form>
    </div>
</section>



<section class="hideme overlay show_contact_popup">
    <div class="popup">
        <form class="profile_contact" id="profile_contact" action="#">
            <div class="popup_wrapper">
                <h3 class="ad_productss">Contact Info</h3>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Contact Info </label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="contact_detail" id="contact_detail" placeholder="<?php echo get_user_meta($uid, 'profile_contact', true);  ?>">
                        <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid">
                    </div>
                </div>
                <div class="mt-5">
                    <input type="submit" class="btn_primary" value="Save" />
                </div>
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </form>
    </div>
</section>


<section class="hideme overlay agreement">
    <div class="popup">
        <form class="update_agreement" id="update_agreement" action="#">
            <div class="popup_wrapper">
                <h3 class="ad_productss">Details of the agreement</h3>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Agreement Name</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="compnay_agreement" id="compnay_agreement" placeholder="<?php echo get_user_meta($uid, 'compnay_agreement', true);  ?>">
                        <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid">
                    </div>
                </div>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Starting Date</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="date" name="starting_date" id="starting_date" placeholder="<?php echo get_user_meta($uid, 'starting_date', true);  ?>">
                    </div>
                </div>
                <div class="mt-5">
                    <input type="submit" class="btn_primary" value="Save" />
                </div>

                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </form>
    </div>
</section>


<section class="hideme overlay invoice">
    <div class="popup">
        <div class="popup_wrapper">
            <h3 class="ad_productss">Invoice</h3>
            <div class="invoice_table">
            <table class="_table">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Date</th>                                                                 
                                        <th scope="col">Type</th>                                    
                                        <th scope="col">Price</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Details</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                
                                        <?php 
                                            global $current_user;
                                            wp_get_current_user();
                                            query_posts(array(
                                                    'post_type' => 'orders',
                                                    'posts_per_page' => -1,
                                                    'order' => 'desc',
                                                
                                                    'meta_query' => array(                                                      
                                                        
                                                        'relation' => 'AND',
                                                           
                                                            array(
                                                                'key'     => 'user_type',
                                                                'value' => 'Personal',
                                                                'compare' => '=',
                                                             

                                                            ),
                                                            array(
                                                                'key'     => 'order_uid',
                                                                'value' => $current_user->ID,
                                                                'compare' => '='
                                                            )
                                                    )
                                                    
                                                ));              
                                        
                                                if (have_posts()) :  while (have_posts()) : the_post(); ?>
                                                                <tr>
                                                                        <td scope="row"><?php the_title()?></td>
                                                                        <td><?php  the_time('m-d') ?></td>
                                                                        <td><?php echo get_post_meta( get_the_ID(), 'order_type', true ); ?>
                                                                        <?php  if((get_post_meta(get_the_ID(), "order_day", true))) { ?>
                                                                            ( <?php echo get_post_meta( get_the_ID(), 'order_day', true ); ?> )
                                                                            <?php } ?>
                                                                    </td>                                                                    
                                                                        <td><?php echo get_post_meta( get_the_ID(), 'order_total', true ); ?></td>                                                            
                                                                        <td><button data-id="<?php echo get_the_ID() ?>" class="show_invoice_detail btn_primary">Detail</button></td>
                                                                        <!-- <td><button id="checkout-button" class="btn_primary">Checkout</button></td>  -->
                                                                        </tr>
                                            <?php endwhile; wp_reset_query(); else : ?>
                                                <tr>  <td colspan="6"><?php _e('No Invoice  Found','lbt_translate'); ?></td></tr>
                                                <?php endif; ?>  
                                        
                                        
                                    </tbody>
                                </table>
                            </div>   
                             <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross ">
            </div>
        </div>
    </div>
</section>

    <section class="hideme  overlay invoice_detail_popup">

                                                
    <div class="popup">
        <div class="popup_wrapper">
            <h3 class="ad_productss">Invoice Details</h3>                 
                 <div class="w-100 ajax_invoice"> </div>  
                 <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross ">
        </div>             

                	
                

                  
    </section>


<script type="text/javascript">
    var button = document.getElementById('checkout-button');
    button.addEventListener('click', function () {
      var request = new XMLHttpRequest();
      request.open('GET', '<?php echo get_template_directory_uri() ?>/create-payment.php', true); 
      request.onload = function () {
        const data = JSON.parse(this.response);        // If parse error, check output 
        if (!data.paymentId) {                         // from create-payment.php
          console.error('Error: Check output from create-payment.php');
          return;
        }
        console.log(this.response);
        console.log(data);
        window.location = '<?php echo home_url(); ?>/checkout/?paymentId=' + data.paymentId;
      }
      request.onerror = function () { console.error('connection error'); }
      request.send();
    });
   </script>





<?php get_footer(); ?>

<link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
<script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/reources/js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

   

    jQuery(document).ready(function($) {        
    var multipleCancelButton = new Choices('#choices-alergies', {
    removeItemButton: true,
    maxItemCount:10,
    searchResultLimit:5,
    renderChoiceLimit:5
    });

        $('#show_address').click(function() {
            $(".delivery_address_popup").css("display", "block");
        });
        $('#showfast_leaving').click(function() {
            $(".fast_leaving_popup").css("display", "block");
        });

        $('#show_profile').click(function() {
            $(".show_profile_popup").css("display", "block");
        });
        $('#show_contact').click(function() {
            $(".show_contact_popup").css("display", "block");
        });

        $('#change_allergies').click(function() {
            $(".show_allergies_popup").css("display", "block");
        });

        $('#show_invoice').click(function() {
            $(".invoice").css("display", "block");
        });

        $('.show_invoice_detail').click(function() {
            $(".invoice").hide();
            $(".invoice_detail_popup").css("display", "block");

            var orderid = $(this).attr('data-id')
            var uid = jQuery('#uid').val();        
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "get_invoice_detail",
                    orderid: orderid,
                    uid: uid
                },
                success: function(data) {

                    if (data.code == 0) {

                       // alert(data.message);
                    } else {
                        $(".ajax_invoice").html(data);   

                    }
                }

            });








        });

        $('.hidepop').click(function(){  
                
           $(".invoice_detail_popup").css("display", "none");         
       });

        $('._cross').click(function(){ 
          
           $(".hideme").css("display", "none");         
       });

        $("#profile_deliver_address").submit(function(e) {
            e.preventDefault();
            var profile_delivery_address = jQuery('#profile_delivery_address').val();
            var profile_delivery_phone = jQuery('#profile_delivery_phone').val();
            var profile_delivery_email = jQuery('#profile_delivery_email').val();
            var uid = jQuery('#uid').val();

            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "profile_deliver_address",
                    profile_delivery_address: profile_delivery_address,
                    profile_delivery_phone: profile_delivery_phone,
                    profile_delivery_email: profile_delivery_email,
                    uid: uid
                },
                success: function(data) {

                    if (data.code == 0) {

                        alert(data.message);
                    } else {
                        alert(data.message);

                    }
                }

            });

        });
        $("#profile_deliver_fast").submit(function(e) {
            e.preventDefault();
            var profile_delivery_days = jQuery('#profile_delivery_days').val();
            var uid = jQuery('#uid').val();

            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "profile_deliver_fast",
                    profile_delivery_days: profile_delivery_days,
                    uid: uid
                },
                success: function(data) {

                    if (data.code == 0) {

                        alert(data.message);
                    } else {
                        alert(data.message);

                    }
                }

            });

        });

        $("#profile_contact").submit(function(e) {
            e.preventDefault();
            var profile_contact = jQuery('#contact_detail').val();
            var uid = jQuery('#uid').val();
        
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "profile_contact",
                    profile_contact: profile_contact,
                    uid: uid
                },
                success: function(data) {

                    if (data.code == 0) {

                        alert(data.message);
                    } else {
                        alert(data.message);

                    }
                }

            });

        });

        $("#profile_allergies_form").submit(function(e) {
            e.preventDefault();
            var choices_alergies = jQuery('#choices-alergies').val();
    
            var uid = jQuery('#uid').val();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "profile_allergies_other",
                    choices_alergies: choices_alergies,
                    uid: uid
                },
                success: function(data) {

                    if (data.code == 0) {

                        alert(data.message);
                    } else {
                        alert(data.message);

                    }
                }

            });

        });


        $("#update_agreement").submit(function(e) {
            e.preventDefault();
            var compnay_agreement = jQuery('#compnay_agreement').val();
            var starting_date = jQuery('#starting_date').val();
            var uid = jQuery('#uid').val();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "update_agreement",
                    compnay_agreement: compnay_agreement,
                    starting_date: starting_date,
                    uid: uid
                },
                success: function(data) {

                    if (data.code == 0) {
                        alert(data.message);
                    } else {
                        //alert(data.message);

                    }
                }

            });

        });




    });


  
</script>