<?php /* Template Name: Personal-FD Daily  */  get_header();?>
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
                    <a href="<?php echo home_url('/profile/lunch-calendar'); ?>" >Lunch Calendar</a>
                    <a href="<?php echo home_url('/profile/fixed-delivery'); ?>" class="_active">Fixed Delivery</a>
                    </div>                
                </div>
                <form class="weeklyfood_daily" id="weeklyfood_daily" action="#" >                
                    <h2>Fixed delivery to Personal</h2>
                    <p>Here you can easily choose between or cancel the various lunch options from day
                        to day. If you want to change a fixed subscription, do so <a href="<?php echo home_url('/contact-us'); ?>">her.</a>
                    </p>

                    <?php

                       $current_week =   date("W");                    
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

                    




                                        //  $luchbox =  array();
                                        //  $add = array();

                                        //  foreach($food_order as $order)    {                                                
                                        //             foreach($order as $pro_id => $pro_qty) {                                                                                   
                                        //                     if (has_term('lunch-boxes', 'menu_types' , $pro_id )) {                                            
                                        //                         $luchbox[] = $pro_qty;
                                        //                     }
                                        //                     if (has_term('additionals', 'menu_types' , $pro_id )) {                                              
                                        //                         $add[] = $pro_qty;
                                        //                     }
                                        //                 }

                                        //     } 

                                        //   $total_boxes =  array_sum($luchbox);
                                        //   $total_add =  array_sum($add);  ?>

                        <?php endwhile; wp_reset_query(); else : ?>
                          
                            <?php endif; ?>

                    <div class="selected_day mt-3">
                            <div class="d-md-flex justify-content-md-between flex-wrap">
                                <div class="d-flex align-items-center">
                                    <input type="radio" id="weekday-1" name="sel_day" value="Monday" checked>
                                    <label for="weekday-1"  id="weekday-1" name="sport" value="Monday" >Monday <?php echo $total_Monday ?></label>
                                </div>
                                <div>
                                    <input type="radio" id="weekday-2" name="sel_day" value="Tuesday">
                                    <label for="weekday-2">Tuesday <?php echo $total_Tuesday ?></label>
                                </div>
                                <div>
                                    <input type="radio" id="weekday-3" name="sel_day" value="Wednesday">
                                    <label for="weekday-3">Wednesday <?php echo $total_Wednesday ?></label>
                                </div>
                                <div>
                                    <input type="radio" id="weekday-4" name="sel_day" value="Thursday">
                                    <label for="weekday-4">Thursday <?php echo $total_Thursday ?></label>
                                </div>
                                <div>
                                    <input type="radio" id="weekday-5" name="sel_day" value="Friday">
                                    <label for="weekday-5">Friday <?php echo $total_Friday ?></label>
                                </div>
                            </div>
                        </div>

                    <?php 
                        $ddate = "today";
                        $date = new DateTime($ddate);
                        $weeksid = $date->format("W");
                    
                    ?>
                    <h2 class="mt-4"><span style="color: #5FB227">1 -</span> Lunch Boxes</h2>
                        <div class="product_wrapper row mb-4">
                                <input type="hidden" value="<?php echo $weeksid ?>" id="weekid" >
                                <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid" >  
                                <input type="hidden" value="Personal" id="usertype" >   
                                <input type="hidden" value="<?php echo date("Y-m-d"); ?>" id="tdate" >  
                                <?php get_template_part( 'partials/lunchbox', 'fixeditems' ); ?>
                          
                        </div>

                        <div class="d-flex justify-content-between mt-5 mb-4 accessories">
                            <h2 class="mt-4"><span style="color: #5FB227">2 -</span>Additionals</h2>                           
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
                        <div class="vat">
                            <h6 class=" d-flex justify-content-end mt-4">* All prices incl. 15% VAT</h6>
                        </div>

                         <div class="mt-5 mb-5 d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <a href="<?php echo home_url('/profile/fixed-delivery-weekly'); ?>" class="btn_primary btn_sec d-block" style="margin-right: 1rem;"> Weekly</a>
                                <a href="<?php echo home_url('/profile/fixed-delivery'); ?>" class="btn_primary  d-block">Daily</a>
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
         
                    	
            $("#weeklyfood_daily").submit(function(e) { 
                e.preventDefault();    
                var weekid = jQuery('#weekid').val();
                var uid = jQuery('#uid').val();
                var sel_day = jQuery('input[name="sel_day"]:checked').val();
                var tdate = jQuery('#tdate').val();

                
                var datas = [];
                        var newdata = [];
                        $("#weeklyfood_daily .product-quantity").each(function () {
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
                
            
            
                $.ajax(
                    {
                        type:"POST",
                        url:"<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {
                            action: "weeklyfood_byday",
                            sel_day : sel_day,
                            menu_items : menu_items,   
                            weekid : weekid,
                            usertype : "Personal",  
                            uid : uid,  
                            tdate : tdate              
                        
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

           

          

            


        });


    
	</script>







