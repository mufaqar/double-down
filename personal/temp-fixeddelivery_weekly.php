<?php /* Template Name: Personal-FD Weekly  */ 
get_header('');
?>
<?php include('navigation.php'); ?>


        <div class="tab_wrapper">
            <div class='toggle mb-5'>
                        <div class='tabs'>
                            <div class='tab active'>Lunch Calendar</div>           
                        </div>
                </div>
        
        <div class='panels'>
            <div class='panel launchClander Fixed_delivery'>
            
                <div class="catering_wrapper c2 mt-5 mb-5">
                    <div class="catering_menu">
                        <a href="<?php echo home_url('/profile/lunch-calendar'); ?>" class="">Lunch Calendar</a>
                        <a href="<?php echo home_url('/profile/fixed-delivery'); ?>" class="_active">Fixed Delivery</a>
                    </div>                
                </div>

                <form class="weeklyfood" id="weeklyfood" action="#" >                 
                    <h2>Fixed delivery to Personal</h2>
                    <p>Here you can easily choose between or cancel the various lunch options from day
                        to day. If you want to change a fixed subscription, do so <a href="<?php echo home_url('/contact-us'); ?>">her.</a>
                    </p>
                    <?php 
                        $ddate = "today";
                        $date = new DateTime($ddate);
                        $weeksid = $date->format("W-m-y");
                    
                    ?>
                    <h2 class="mt-4"><span style="color: #5FB227">1 -</span> Lunch Boxes</h2>
                        <div class="product_wrapper row mb-4">
                                <input type="hidden" value="<?php echo $weeksid ?>" id="weekid" >
                                <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid" >  
                                <input type="hidden" value="Personal" id="usertype" >
                                <?php get_template_part( 'partials/lunchbox', 'fixeditems' ); ?>                      
                            
                        </div>

                        <div class="d-flex justify-content-between mt-5 mb-4 accessories">
                            <h2 class="mt-4"><span style="color: #5FB227">2 -</span> Additionals</h2>
                            
                        </div>

                        <div class="product_wrapper row mb-4">
                            <?php query_posts(array(
                                        'post_type' => 'menu_items',
                                        'posts_per_page' => -1,
                                        'order' => 'desc',
                                        'menu_types' => 'additionals'                                                                     
                                        )); 
                                        if (have_posts()) :  while (have_posts()) : the_post();  $pid = get_the_ID(); ?>

                                            <div class="col-md-6 col-lg-4 mt-4">
                                                    <div class="product_card p-4">
                                                        <?php if ( has_post_thumbnail() ) {
                                                               the_post_thumbnail('product-thumbnail' , array( 'class'  => 'pro_img' ));
                                                            } else { ?>
                                                        <img src="<?php echo get_template_directory_uri(); ?>/reources/images/product1.png" alt="Featured Thumbnail" />
                                                        <?php } ?>
                                                        <h2><?php the_title(); ?> , NOK <?php the_field('menu_item_price'); ?> </h2>
                                                        <button  id="<?php echo get_the_ID()?>" class="btn_primary  select_product_btn id<?php echo get_the_ID();?>"
                                                        onmouseover="showCounter(<?php echo get_the_ID();;?>)">Select</button>
                                                        <div class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid<?php echo get_the_ID();?>">
                                                            <i class="count-down" onclick="handleCountDec(<?php echo get_the_ID(); ?>)"><img
                                                                    src="<?php echo get_template_directory_uri(); ?>/reources/images/neg.png"
                                                                    alt="" ></i>
                                                            <input type="text"  data-id="<?php echo $pid;?>" value="0" 
                                                                class="product-quantity form-control text-center incrDecrCounter" />
                                                            <i class="count-up" onclick="handleCountInc(<?php echo get_the_ID(); ?>)"><img
                                                                    src="<?php echo get_template_directory_uri(); ?>/reources/images/plus.png"
                                                                    alt="" ></i>
                                                        </div>
                                                </div>
                                            </div>

                            <?php endwhile; wp_reset_query(); else : ?>
                            <h2><?php _e('Nothing Found','lbt_translate'); ?></h2>
                            <?php endif; ?>

                        </div>

                        <div class="d-flex justify-content-between mt-1 mb-4 accessories">
                            <h2 class="mt-4"><span style="color: #5FB227"></span> Weekdays</h2>
                        </div>
                        <?php

$current_week =   date("W-m-y");                    
global $current_user;
 wp_get_current_user(); 

            $query_order = array(
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
                                                    'key'     => 'order_uid',
                                                    'value' => $current_user->ID,
                                                    'compare' => '='
                                                ),
                                                array(
                                                    'key'     => 'order_week',
                                                    'value' => $current_week,
                                                    'compare' => '='
                                                )
                )
            );



            $postData = new WP_Query($query_order);
            if ( $postData->have_posts() ): while ( $postData->have_posts() ): $postData->the_post();

            $post_id = get_the_ID();
            //  echo $post_id;
            $food_order =  get_post_meta(get_the_ID(), 'food_order', true);
            // print "<pre>";
            // print_r($food_order);

            $food_Monday = $food_order['Monday'];
            $food_Tuesday = $food_order['Tuesday'];
            $food_Wednesday = $food_order['Wednesday'];
            $food_Thursday = $food_order['Thursday'];
            $food_Friday = $food_order['Friday'];

            if (is_array($food_Monday) || is_object($food_Monday))
            {

              

            $food_Monday_arr = array();  
            foreach($food_Monday as $key_Monday => $qty_Monday){
                $price_Monday =  get_post_meta($key_Monday, 'menu_item_price', true);                     
                $food_Monday_arr[] = $price_Monday*$qty_Monday;	
            }
            $total_Monday = array_sum($food_Monday_arr);

            }

            if (is_array($food_Tuesday) || is_object($food_Tuesday))
            {

             
            $food_Tuesday_arr = array();  
            foreach($food_Tuesday as $key_Tuesday => $qty_Tuesday){
                $price_Tuesday =  get_post_meta($key_Tuesday, 'menu_item_price', true);                     
                $food_Tuesday_arr[] = $price_Tuesday*$qty_Tuesday;	
            }
            $total_Tuesday = array_sum($food_Tuesday_arr);

            }

            if (is_array($food_Wednesday) || is_object($food_Wednesday))
            {
                    $food_Wednesday_arr = array();  
            foreach($food_Wednesday as $key_Wednesday => $qty_Wednesday){
                $price_Wednesday =  get_post_meta($key_Wednesday, 'menu_item_price', true);                     
                $food_Wednesday_arr[] = $price_Wednesday*$qty_Wednesday;	
            }
            $total_Wednesday = array_sum($food_Wednesday_arr);

            }

            if (is_array($food_Thursday) || is_object($food_Thursday))
            {

            $food_Thursday_arr = array();  
            foreach($food_Thursday as $key_Thursday => $qty_Thursday){
                $price_Thursday =  get_post_meta($key_Thursday, 'menu_item_price', true);                     
                $food_Thursday_arr[] = $price_Thursday*$qty_Thursday;	
            }
            $total_Thursday = array_sum($food_Thursday_arr);
            }
            if (is_array($food_Friday) || is_object($food_Friday))
            {
            $food_Friday_arr = array();  
            foreach($food_Friday as $key_Friday => $qty_Friday){
                $price_Friday =  get_post_meta($key_Friday, 'menu_item_price', true);                     
                $food_Friday_arr[] = $price_Friday*$qty_Friday;	
            }
            $total_Friday = array_sum($food_Friday_arr);

            }


 ?>

 <?php endwhile; wp_reset_query(); else : ?>
   
     <?php endif; ?>

                        <div class="week_days">
                            <div class="d-flex justify-content-between flex-wrap">
                                <?php
                                 $dt = new DateTime();                     
                                 for ($d = 1; $d <= 5; $d++) {
                                     $dt->setISODate($dt->format('o'), $dt->format('W'), $d);
                                     $the_day = $dt->format('l') ;
                                     $the_date = $dt->format('Y-m-d');
                                     ?> 
                                      <div class="d-flex align-items-center">
                                            <input type="checkbox" id="weekday-<?php echo $d ?>" name="sport" value="<?php echo $the_date?>">
                                            <label for="weekday-<?php echo $d ?>"><?php echo $the_day?> </label>
                                        </div>

                                     <?php
                                 }

                                 ?>



                            </div>
                        </div>

                        <div class="vat">
                            <h6 class=" d-flex justify-content-end mt-4">* All prices incl. 15% VAT</h6>
                        </div>

                         <div class="mt-5 mb-5 d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <a href="<?php echo home_url('/profile/fixed-delivery-weekly'); ?>" class="btn_primary d-block" style="margin-right: 1rem;"> Weekly</a>
                                <a href="<?php echo home_url('/profile/fixed-delivery'); ?>" class="btn_primary btn_sec d-block">Daily</a>
                            </div>
                        <div>
                        <input type="submit" id="order" class="btn_primary"  value="Save"/>
                       
                    </div>
                </form>
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
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/reources/js/script.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script type="text/javascript">   
     jQuery(document).ready(function($) 
        {   
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
                    if(value >0) {
                        datas.push( [productid, $(this).val() ]);   
                        }                     
                newdata.push(datas);
                });
            // alert(newdata[0]);
                var menu_items = newdata[0];
            
                console.log(menu_items);  
                var weekdays = weekdays;

                console.log(weekdays);
              
                
            
            
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
                            order_type : "Fixed Delivery",  
                            uid : uid,                  
                        
                        },   
                        success: function(data){                      
                        
                            if(data.code==0) {
                                        alert(data.message);
                            }  
                            else {
                          $(".alertmessage").css("display", "flex");
                          $('.alertmessage').delay(1500).fadeOut();
                           location.reload();       
                            
                        
                            }      
                    }
                
                });
            }); 

           

          

            


        });


    
	</script>







