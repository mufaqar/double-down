<?php /* Template Name: Comapny-LunchCaldendar  */
get_header('company');
global $current_user; wp_get_current_user();  $uid = $current_user->ID;
?>
<?php include('navigation.php'); ?>

<div class="tab_wrapper">
    <?php page_title() ?>
    <div class='panels'>
        <div class='panel launchClander'>

            <div class="catering_wrapper c2 mt-5 mb-5">
                <div class="catering_menu">
                    <a href="<?php echo home_url('/company-profile/lunch-calendar'); ?>" class="_active">Lunch Calendar</a>
                    <a href="<?php echo home_url('/company-profile/lunch-calendar/fixed-delivery'); ?>" class="">Fixed Delivery</a>
                </div>
             </div>

            <h2>Business lunch calendar</h2>
            <p>Here you can easily choose between or cancel the various lunch options from day
                to day. If you want to change a fixed subscription, do so <a href="<?php echo home_url('/contact-us'); ?>">her.</a>
            </p>

                             <?php                                              
                                                    $this_week =  date("W"); 
                                                    $query_order = array(
                                                        'post_type' => 'orders',
                                                        'posts_per_page' => -1,
                                                        'order' => 'desc',                                                                                                       
                                                        'meta_query' => array(
                                                            array(
                                                                'key' => 'order_week',
                                                                'value' => $this_week,
                                                                'compare' => '='
                                                            ),
                                                            array(
                                                                'key' => 'order_type',
                                                                'value' => 'Day',
                                                                'compare' => '='
                                                            ),
                                                            array(
                                                                'key' => 'order_uid',
                                                                'value' => $uid,
                                                                'compare' => '='
                                                            ),
                                                            array(
                                                                'key' => 'user_type',
                                                                'value' => 'Company',
                                                                'compare' => '='
                                                            ),

                                                            
                                                        )
                                                    );
                                                    ?>





            <div class="calender_wrapper d-flex justify-content-between align-items-center">
                <div class="calender week_calender">
                    <input type="text" id="weekPicker2" value="<?php echo date("Y-W"); ?>">
                    <div class="wc-icon"><i class="fa-solid fa-calendar-days"></i></div>
                </div>
                <div class="info">
                 <?php $postData = new WP_Query($query_order);

                                                $total_week_price = array();
                                             if ( $postData->have_posts() ): while ( $postData->have_posts() ): $postData->the_post();
                                                 $post_id = get_the_ID();

                                                 //echo $post_id;
                                                 //echo get_post_meta(get_the_ID(), 'order_day', true);

                                                 $total_week_price[] = get_post_meta(get_the_ID(), 'order_total', true);

                                                 
                                                 
                                                 
                                                 ?>                                            
                                              

<?php endwhile;   ?>
<h6>Total this Week | <span>NOK <?php  echo array_sum($total_week_price); ?></span></h6>
<?php wp_reset_query(); else : ?>
    <p>Total this Week,<br>:  NOK </p>
    <?php endif; ?>
                    
                </div>
            </div>
            <div class="accordion_wrapper">
                <div class="row">
                    <div class="col-lg-12 mx-auto">
                        <!-- Accordion -->
                        <div id="accordionExample" class="accordion">
                            <?php
                            $week = [];
                            $saturday = strtotime('monday this week');
                            $i = 0;
                            $k = 6;
                            foreach (range(0, 4) as $day) {
                                $week[] = date("Y-m-d", (($day * 86400) + $saturday));
                                $today_date =  $week[$i];
                                $i++;
                                $timestamp = strtotime($today_date);
                                $today_day = date('l', $timestamp);
                                $this_day =  strtolower(date('D', $timestamp));                             
                                $weeksid =  date("W"); 

                                // print_r($week);
                            ?> <div class="card">
                                    <form class="dailyfood" id="dailyfood_<?php echo $this_day ?>" action="#">
                                        <div id="headingOne" class="card-header bg-white shadow-sm border-0 py-4">
                                            <input type="hidden" value="<?php echo $today_date ?>" id="day_<?php echo $this_day ?>">
                                            <input type="hidden" value="<?php echo $weeksid ?>" id="weekid_<?php echo $this_day ?>">
                                            <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid">
                                            <div class="mb-0 d-flex align-items-center">
                                                <button type="button" data-toggle="collapse" data-target="#collapse<?php echo $this_day ?>" aria-expanded="true" aria-controls="collapse<?php echo $day ?>" class="btn text-dark font-weight-bold text-uppercase collapsible-link shadow-none">
                                                    <?php echo $today_day ?> | <span><?php echo $today_date ?></span>
                                                </button>
                                                <!-- <h6 class="text-nowrap mb-0">
                                                    <div class="message">No Booking </div>
                                                </h6> -->
                                            </div>
                                        </div>
                                        <div id="collapse<?php echo $this_day ?>" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse show accordion_content">
                                            <div class="card-body p-md-5 Fixed_delivery">
                                            <div class="food_info day__food row">
                    <?php 
                   
                    //echo $today_date;
                    query_posts(array(
                        'post_type' => 'menu_items',
                        'posts_per_page' => -1,
                        'order' => 'desc',
                        'menu_types' => 'lunch-boxes',
                        'meta_query' => array(
                            array(
                                'key' => 'date',
                                'value' => $today_date,
                                'compare' => 'LIKE',
                                 'type' => 'DATE'
                            ),
                        )

                    ));
                    if (have_posts()) :  while (have_posts()) : the_post(); $new_id = get_the_ID().$i;   $data_id = get_the_ID(); ?>
                            <div class="col-md-6 first border-end mb-5">
                                <h3><?php the_title() ?> | <span> NOK <?php the_field('menu_item_price'); ?></span></h3>
                                <p class="mt-3"><?php the_content() ?></p>
                                <h6 class="mt-2">Allergenes:</h6>
                                <p>
                                    <?php $allergense =  get_the_terms( $post->ID, 'menu_sub_types' );                                     
                                    foreach($allergense as $allergy) {
                                        $allergens[] = $allergy->name;
                                                         echo implode( ', ', $allergens );    
                                    } ?> 
                                    </p>
                                <div class="order_wrapper mt-3">                                 
                                    <button class="btn_primary _id<?php echo $new_id ?>" onmouseover="showOrderCounter(<?php echo $new_id?>)">Select</button>
                                    <div class="d-none product_counter  d-flex justify-content-center align-items-center _cid<?php echo $new_id; ?>">
                                        <i class="count-down"><img src="<?php bloginfo('template_directory'); ?>/reources/images/minus-thin.png" alt="" onclick="handleCountDec(<?php echo $new_id ?>)"></i>
                                        <input type="text" data-id="<?php echo $new_id ?>" data-pro="<?php echo $data_id;?>"  value="0" class="product-quantity form-control text-center incrDecrCounter" />
                                        <i class="count-up"><img src="<?php bloginfo('template_directory'); ?>/reources/images/plus-thin.png" alt="" onclick="handleCountInc(<?php echo $new_id ?>)"></i>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_query();  else : ?>
                        <h2><?php _e('Nothing Found', 'lbt_translate'); ?></h2>
                    <?php endif; ?>
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
                 
                    if (have_posts()) :  while (have_posts()) : the_post(); $k++;  $add_id = get_the_ID().$k; $data_id = get_the_ID();?>
                            <div class="col-md-6 col-lg-4 mt-4">
                                <div class="product_card p-4">
                              
                                    <img src="<?php echo get_template_directory_uri(); ?>/reources/images/product1.png" alt="">
                                    <h2><?php the_title(); ?> , NOK <?php the_field('menu_item_price');  ?> </h2>
                                    <button  id="<?php echo $add_id?>" class="btn_primary  select_product_btn id<?php echo $add_id;?>"
                                                        onmouseover="showCounter(<?php echo $add_id;?>)">Select</button>
                                                        <div class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid<?php echo $add_id;?>">
                                                            <i class="count-down" onclick="handleCountDec(<?php echo $add_id; ?>)"><img
                                                                    src="<?php echo get_template_directory_uri(); ?>/reources/images/neg.png"
                                                                    alt="" ></i>
                                                            <input type="text"  data-id="<?php echo $add_id;?>"  data-pro="<?php echo $data_id;?>"  value="0" 
                                                                class="product-quantity form-control text-center incrDecrCounter" />
                                                            <i class="count-up" onclick="handleCountInc(<?php echo $add_id; ?>)"><img
                                                                    src="<?php echo get_template_directory_uri(); ?>/reources/images/plus.png"
                                                                    alt="" ></i>
                                                        </div>
                                </div>
                            </div>

                        <?php endwhile;
                        wp_reset_query();  else : ?>
                        <h2><?php _e('Nothing Found', 'lbt_translate'); ?></h2>
                    <?php endif; ?>

                </div>

  
 

    <div class="accordion_btns d-flex justify-content-end mb-5 mr-3">
      
        <input type="submit" class="btn_primary" value="Save" />
    </div>
                                            </div>
                                        </div>
                                    </form>

                      
                    </div>
                   
                            <?php
                            }
                            ?>
                        </div><!-- End -->
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
            <div class="order_confirm d-flex position-relative justify-content-center flex-column align-items-center p-4">
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/logo.png" class="logo" alt="logo">

                <div class="step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
                    <div class="content mt-5">
                        <div class="right"><img src="<?php bloginfo('template_directory'); ?>/reources/images/img 3.png" alt=""></div>
                        <h1 class="finished">Finished!</h1>
                        <h2 class="mb-5 mt-5">Your order has beed submitted!</h2>

                    </div>
                </div>

            </div>
            <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
        </div>
    </div>
</section>


<?php get_footer(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/reources/js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/reources/js/weekPicker.min.js"></script>
<script>
    convertToWeekPicker($("#weekPicker2"));
</script>
<script type="text/javascript">
    jQuery(document).ready(function($) {

      

             $('._cross').click(function(){
           
                $(".hideme").css("display", "none");
            });
            
           

            <?php
           
            $mweek = [];
            $saturday = strtotime('monday this week');
            $i= 0;
            foreach (range(0, 4) as $day) {
                $mweek[] = date("Y-m-d", (($day * 86400) + $saturday));
                $today_date =  $mweek[$i];
                $i++;                                       
                $timestamp = strtotime($today_date);
                $today_day = date('l', $timestamp);
                $this_day =  strtolower(date('D', $timestamp));


            ?>

                             $("#dailyfood_<?php echo $this_day; ?>").submit(function(e) {                
                                e.preventDefault();                                            
                                var date = jQuery('#day_<?php echo $this_day; ?>').val();
                                var weekid = jQuery('#weekid_<?php echo $this_day; ?>').val();                              
                                var uid = jQuery('#uid').val();  
                                var datas = [];
                                    var newdata = [];
                                $("#dailyfood_<?php echo $this_day; ?> .product-quantity").each(function () {
                                var productid =  $(this).data('pro');
                                var value = $(this).val() ;
                                    if(value >1) {
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
                                            action: "dailyfood",
                                            date : date,
                                            menu_items : menu_items,   
                                            weekid : weekid,
                                            usertype : "Company",  
                                            uid : uid           
                                        
                                        },   
                                        success: function(data){  
                                            if(data.code==0) {
                                                alert(data.message);
                                            }  
                                            else {                                              
                                             $(".alertmessage").css("display", "flex");  
                                             location.reload();  
                                            }      
                                        }
                            
                                });
                                
                            }); 




                                <?php  }  ?>




    });
</script>