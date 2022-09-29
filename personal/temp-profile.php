    <?php /* Template Name: Perosnal-Profile  */ 
    get_header();   
    include('navigation.php'); ?>
      <div class="tab_wrapper">
                     <?php page_title()?>
                            <div class='panels'>
                                <div class='panel launchClander'>
                                    <div class="calender_wrapper d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center __btn">
                                            <a href="<?php echo home_url('/profile/lunch-calendar'); ?>" class="btn_primary d-flex align-items-center">
                                                <i class="fa-solid fa-fork-knife"></i>
                                                <p style="margin-left: .5rem; color:white">My Lunch</p></a>
                                            <a  href="<?php echo home_url('/profile/orders'); ?>"  class="btn_primary btn_sec d-flex align-items-center">
                                                <i class="fa-solid fa-newspaper"></i>
                                                <p style="margin-left: .5rem; color:#5FB227">My Orders</p></a>
                                        </div>
                                        <div class="info d-flex align-items-center">
                                            <h6><?php 
                                            echo get_user_meta($uid ,'compnay_delivery_address',true);?> | <span> Fixed <?php echo get_user_meta($uid,'Personal_days',true);?>  days a week </span></h6>
                                            <!-- <div class="calender week_calender">
                                                <form action="" method="GET" id="weekform">
                                                    <input type="text" id="weekPicker2" name="week" value="<?php echo date("Y-W"); ?>" >
                                                    <div class="wc-icon"><i class="fa-solid fa-calendar-days"></i></div>
                                                </form>
                                            </div> -->
                                       
                                        </div>
                                    </div>
                                    <div class="accordion_wrapper">
                                        <div class="row">
                                            <div class="col-lg-12 mx-auto mb-5">
                                              <?php 


                                        // #default array
                                        // $daysOfWeek = array('Monday','Tuesday','Wednesday','Thursday','Friday');
                                        // #your array
                                        // $days = array('Tuesday','Thursday','Friday','Monday');
                                        // #create a new array with key association property
                                        // $daysAux = array();
                                        // foreach($days as $k=>$v) {
                                        //     $key = array_search($v, $daysOfWeek);
                                        //     if($key !== FALSE) {
                                        //         $daysAux[$key] = $v;
                                               
                                        //     }
                                        // }
                                        // # array before sort
                                        // echo '<pre/>';
                                        // ksort($daysAux);
                                        // $days = $daysAux;
                                        // #final result
                                        // echo '<pre/>';print_r($days);exit;

                                                    $current_week =  date("W"); 
                                                    $current_year =  date("Y");                                                   
                                                    $query_meta = array(
                                                            'post_type' => 'orders',
                                                            'posts_per_page' => -1,
                                                            'order' => 'desc',                                                         
                                                            'meta_query' => array(                                                      
                                                                   'relation' => 'AND',
                                                                    array(
                                                                        'key'   => 'order_type',
                                                                        'value' => 'Weekly',
                                                                        'compare' => '='
                                                                    ),
                                                                    array(
                                                                        'key'     => 'user_type',
                                                                        'value' => 'Personal',
                                                                        'compare' => '=',   
                                                                    ),
                                                                    array(
                                                                        'key'     => 'order_week',
                                                                        'value' => $current_week,
                                                                        'compare' => '='
                                                                    ),
                                                                    array(
                                                                        'key'     => 'order_uid',
                                                                        'value' => $current_user->ID,
                                                                        'compare' => '='
                                                                    )
                                                                    ),
                                                            
                                                        ); 

                                                    //    print_r($query_meta);

                                                   
                                               
                                                
                                                    $postinweek = new WP_Query($query_meta);
                                                    if ( $postinweek->have_posts() ): while ( $postinweek->have_posts() ): $postinweek->the_post();
                                                      $pid =  get_the_ID();                                                    
                                                    $food_orderd_data = get_post_meta( $pid, 'food_order' , true); 
                                                    
                                                    uksort($food_orderd_data, "weekdaySort");
                                               
                                              
                                               

                                                    foreach($food_orderd_data as $key => $order_data ) 
                                                      {   ?>

                                                        
                                                            <div class="_pro_card">
                                                                <h3><?php echo  $key ?>  <span><?php //echo "key Date "?> </span></h3>
                                                                <p> <?php   foreach($order_data as $product_id => $product_qty)
                                                                            { 
                                                                                
                                                                              
                                                                                
                                                                                //echo $product_id . " : " . $product_qty . "<br/>";

                                                                            echo  "Product  : " .get_the_title( $product_id) . "  <span>(" .$product_qty .") </span><br/>";
                                                                        
                                                                            } 

                                                                          
                                                                            
                                                                            
                                                                            
                                                                            
                                                                            ?>
                                                                </p>
                                                            </div>

                                                        <?php   } endwhile; wp_reset_query(); else : ?>

                                                            <div class="_pro_card">
                                                                <h3>No lunch menu for this week</h3>
                                                                <p> Please choose your menu </p>
                                                            </div>
                                                  
                                                <?php endif; ?> 
                                            </div>
                                        </div>
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
                <div
                    class="order_confirm d-flex position-relative justify-content-center flex-column align-items-center p-4">
                    <img src="<?php bloginfo('template_directory'); ?>/reources/images/logo.png" class="logo" alt="logo">

                    <div
                        class="step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
                        <div class="content mt-5">
                            <div class="right"><img src="<?php bloginfo('template_directory'); ?>/reources/images/img 3.png" alt=""></div>
                            <h1 class="finished">Finished!</h1>
                            <h2 class="mb-5 mt-5">Your order has beed submitted!</h2>                       
                         
                        </div>
                    </div>
                    
                </div>
                <img src="<?php  bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </div>
    </section>


    <?php get_footer();?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/reources/js/script.js"></script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <!-- week calender  -->

<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/reources/js/weekPicker.min.js"></script>
<script>
    convertToWeekPicker($("#weekPicker2"));    
   
</script>
 <script type="text/javascript">   
     jQuery(document).ready(function($) 
        {   
            
            $('#delivery_address').click(function(){            
                $(".delivery_address").css("display", "block");
            });
            $('#agreement').click(function(){
                $(".agreement").css("display", "block");
            });

            $('#emp_agreement').click(function(){
                $(".emp_agreement").css("display", "block");
            });


            
            $('#invoice').click(function(){
                $(".invoice").css("display", "block");
            });

            $('._cross').click(function(){
           
                $(".hideme").css("display", "none");
            });
            
         
                    	
            $("#weeklyfood").submit(function(e) { 
                e.preventDefault();  
                var weekid = jQuery('#weekid').val();
                var usertype = jQuery('#usertype').val();
               
                
                var uid = jQuery('#uid').val();
                var weekdays = [];
                $.each($("input[name='sport']:checked"), function(){            
                    weekdays.push($(this).val());
                });
                
                var datas = [];
                        var newdata = [];
                        $("#weeklyfood .product-quantity").each(function () {
                        var productid =  $(this).data('id');
                        var value = $(this).val() ;
                            if(value >1) {
                                datas.push( [productid, $(this).val() ]);   
                                }                     
                        newdata.push(datas);
                        });
                    // alert(newdata[0]);
                        var menu_items = newdata[0];
                  
                        console.log(menu_items);
                    //  alert(postid);          
                                
                var weekdays = weekdays;	             
                var menu_items = menu_items;     
            
                $.ajax(
                    {
                        type:"POST",
                        url:"<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {
                            action: "weeklyfood",
                            weekdays : weekdays,
                            menu_items : menu_items,   
                            weekid : weekid,
                            usertype : usertype,                            
                            uid : uid,                  
                        
                        },   
                        success: function(data){                      
                        
                            if(data.code==0) {
                                        alert(data.message);
                            }  
                            else {
                            $(".alertmessage").css("display", "flex");
                        
                            }      
                    }
                
                });
            }); 

            $("#dailyfood0").submit(function(e) { 
                
                e.preventDefault(); 
                submitTwoForms();
                
            }); 

            $("#dailyfood1").submit(function(e) { 

               
                e.preventDefault(); 
                submitTwoForms(this);
                
            }); 
            $("#dailyfood2").submit(function(e) { 
                e.preventDefault(); 
                submitTwoForms();
                
            }); 
            $("#dailyfood3").submit(function(e) { 
                e.preventDefault(); 
                submitTwoForms();
                
            }); 


        });


        function submitTwoForms() { 

            var day = jQuery('#day').val();
            var uid = jQuery('#uid').val();
                var datas = [];
                var newdata = [];
                $(".dailyfood .product-quantity").each(function () {
                    var productid =  $(this).data('id');
                    var value = $(this).val() ;
                    if(value >1) {
                        datas.push( [productid, $(this).val() ]);   
                        }                     
                    newdata.push(datas);
                });                
                var menu_items = newdata[0];                
                console.log(menu_items);   
                $.ajax(
                    {   
                        type:"POST",
                        url:"<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {
                            action: "dailyfood",
                            day : day,
                            menu_items : menu_items,  
                            uid : uid                
                        
                        },   
                        success: function(data){  
                            if(data.code==0) {
                                alert(data.message);
                            }  
                            else {
                           $(".alertmessage").css("display", "flex");  
                            }      
                         }
            
                     });
        
}
            
        
    
	</script>


