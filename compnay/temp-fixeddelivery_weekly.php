<?php /* Template Name: Company-FD Weekly  */ 
get_header('company');
?>
<?php include('navigation.php'); ?>

<!-- tabs -->

<div class="tab_wrapper">
<?php page_title()?>
        
        <div class='panels'>
            <div class='panel launchClander Fixed_delivery'>
            
                <div class="catering_wrapper c2 mt-5 mb-5">
                    <div class="catering_menu">
                        <a href="<?php echo home_url('/company-profile/lunch-calendar'); ?>" class="">Lunch Calendar</a>
                        <a href="<?php echo home_url('/company-profile/fixed-delivery'); ?>" class="_active">Fixed Delivery</a>
                    </div>                
                </div>

                <form class="weeklyfood" id="weeklyfood" action="#" >                 
                    <h2>Fixed delivery to company</h2>
                    <p>Here you can easily choose between or cancel the various lunch options from day
                        to day. If you want to change a fixed subscription, do so <a href="">her.</a>
                    </p>
                    <?php 
                        $ddate = "today";
                        $date = new DateTime($ddate);
                        $weeksid = $date->format("W");
                    
                    ?>
                    <h2 class="mt-4"><span style="color: #5FB227">1 -</span> Lunch Boxes</h2>
                        <div class="product_wrapper row mb-4">
                                <input type="hidden" value="<?php echo $weeksid ?>" id="weekid" >
                                <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid" >  
                                <input type="hidden" value="Company" id="usertype" >      

                        
                            <?php query_posts(array(
                                        'post_type' => 'menu_items',
                                        'posts_per_page' => -1,
                                        'order' => 'desc',
                                        'menu_types' => 'lunch-boxes'                                                                     
                                        )); 
                                    if (have_posts()) :  while (have_posts()) : the_post(); $pid = get_the_ID(); ?>
                                        <div class="col-md-6 col-lg-4 mt-4">
                                            <div class="product_card p-4">
                                                <img src="<?php echo get_template_directory_uri(); ?>/reources/images/product1.png" alt="">
                                                <h2><?php the_title(); ?> , NOK <?php the_field('menu_item_price'); ?> </h2>
                                                <button  id="123" class="btn_primary  select_product_btn id<?php echo $pid;?>"
                                                onmouseover="showCounter(<?php echo $pid;?>)">Select</button>
                                                <div class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid<?php echo $pid;?>">
                                                    <i class="count-down"><img
                                                            src="<?php echo get_template_directory_uri(); ?>/reources/images/neg.png"
                                                            alt="" onclick="handleCountDec(<?php echo $pid ?>)"></i>
                                                    <input type="text"  data-id="<?php echo $pid;?>" value="1" 
                                                        class="product-quantity form-control text-center incrDecrCounter" />
                                                    <i class="count-up"><img
                                                            src="<?php echo get_template_directory_uri(); ?>/reources/images/plus.png"
                                                            alt="" onclick="handleCountInc(<?php echo $pid ?>)"></i>
                                                </div>
                                            </div>
                                        </div>
                            <?php endwhile; wp_reset_query(); else : ?>
                            <h2><?php _e('Nothing Found','lbt_translate'); ?></h2>
                            <?php endif; ?>
                        </div>

                        <div class="d-flex justify-content-between mt-5 mb-4 accessories">
                            <h2 class="mt-4"><span style="color: #5FB227">2 -</span> Accessories</h2>
                            <a href="" class="btn_primary d-flex align-items-center">
                                <img src="<?php bloginfo('template_directory'); ?>/reources/images//positive.png" alt="">
                                <p>Allergy Pass</p>
                            </a>
                        </div>

                        <div class="product_wrapper row mb-4">
                            <?php query_posts(array(
                                        'post_type' => 'menu_items',
                                        'posts_per_page' => -1,
                                        'order' => 'desc',
                                        'menu_types' => 'accessories'                                                                     
                                        )); 
                                        if (have_posts()) :  while (have_posts()) : the_post();  $pid = get_the_ID(); ?>

                                    <div class="col-md-6 col-lg-4 mt-4">
                                        <div class="product_card p-4">
                                            <img src="<?php echo get_template_directory_uri(); ?>/reources/images/product1.png" alt="">
                                            <h2><?php the_title(); ?> , NOK <?php the_field('menu_item_price'); ?> </h2>
                                            <button href="" class="btn_primary  select_product_btn id<?php echo $pid;?>"
                                            onmouseover="showCounter(<?php echo $pid;?>)">Select</button>
                                                <div class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid<?php echo $pid;?>">
                                                    <i class="count-down"><img
                                                            src="<?php echo get_template_directory_uri(); ?>/reources/images/neg.png"
                                                            alt="" onclick="handleCountDec(<?php echo $pid ?>)"></i>
                                                    <input type="text" data-id="<?php echo $pid;?>" value="1" 
                                                        class="product-quantity form-control text-center incrDecrCounter" />
                                                        
                                                    <i class="count-up"><img
                                                            src="<?php echo get_template_directory_uri(); ?>/reources/images/plus.png"
                                                            alt="" onclick="handleCountInc(<?php echo $pid ?>)"></i>
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

                        <div class="week_days">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="d-flex align-items-center">
                                    <input type="checkbox" id="weekday-1" name="sport" value="Monday" checked>
                                    <label for="weekday-1">Monday</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="weekday-2" name="sport" value="Tuesday">
                                    <label for="weekday-2">Tuesday</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="weekday-3" name="sport" value="Wednesday">
                                    <label for="weekday-3">Wednesday</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="weekday-4" name="sport" value="Thursday">
                                    <label for="weekday-4">Thursday</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="weekday-5" name="sport" value="Friday">
                                    <label for="weekday-5">Friday</label>
                                </div>
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
                            <h2 class="mb-5 mt-5">Your Order has beed submitted!</h2>                       
                         
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

           

          

            


        });


    
	</script>







