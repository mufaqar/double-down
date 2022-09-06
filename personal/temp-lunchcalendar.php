<?php /* Template Name: Personal-LunchCalednar  */ 
get_header();
?>
<?php include('navigation.php'); ?>

<div class="tab_wrapper">
<?php page_title()?>
                    <div class="custom_container">
                          <form class="weeklyfood" id="weeklyfood" action="#" >   
                            <div class="row">
                                <div class="catering_wrapper mt-5 mb-5 col-md-8">
                                    <div class="catering_menu">
                                        <a href="<?php echo home_url('profile/lunch-calendar'); ?>" class="_active">Lunch Calendar</a>
                                        <a href="<?php echo home_url('profile/fixed-delivery'); ?>">Fixed Delivery</a>
                                    </div>
                                    <div class="calender_wrapper d-flex justify-content-between align-items-center mt-5">
                                        <p>A Total of 0 Boxes,<br> Additions you pay: NOK 104</p>
                                        <div class="calender">
                                            <input type="date" value="<?php echo date("Y-m-d"); ?>" id="date">
                                        </div>
                                    </div>
                                    <div class="catering_card_wrapper">
                                        <?php query_posts(array(
                                                'post_type' => 'menu_items',
                                                'posts_per_page' => -1,
                                                'order' => 'desc',
                                                'menu_types' => 'lunch-boxes'                                                                     
                                                )); 
                                            if (have_posts()) :  while (have_posts()) : the_post(); $pid = get_the_ID(); ?>
                                            
                                            <div class="catering_card _pro_salat">
                                                <h3><?php the_title()?></h3>
                                                <p class="mt-3"><?php the_content()?></p>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <h6 class="mt-2">Contains:</h6>
                                                        <p><?php echo get_post_meta( get_the_ID(), 'contains', true ); ?></p>
                                                        <p>Nutritional content: <?php echo get_post_meta( get_the_ID(), 'nutritional_content', true ); ?></p>
                                                    </div>
                                                
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between _info mb-3">
                                                    <div class="d-flex">
                                                        <div>
                                                            <strong class="title">Price:</strong> 
                                                            <p><strong>Nok <?php echo get_post_meta( get_the_ID(), 'menu_item_price', true ); ?></strong></p>
                                                        </div>
                                                        <div style="margin-left: 3rem;">
                                                            <strong class="title">VAT:</strong> 
                                                            <p>80</p>
                                                        </div>


                                                    </div>
                                                

                                                    <div class="product_card"><button href="" id="123" class="btn_primary  select_product_btn id<?php echo $pid;?>"
                                                        onmouseover="showCounter(<?php echo $pid;?>)">Select</button>
                                                        <div class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid<?php echo $pid;?>">
                                                            <i class="count-down"><img
                                                                    src="<?php echo get_template_directory_uri(); ?>/reources/images/neg.png"
                                                                    alt=""></i>
                                                            <input type="text"  data-id="<?php echo $pid;?>" value="1" 
                                                                class="product-quantity form-control text-center incrDecrCounter" />
                                                            <i class="count-up"><img
                                                                    src="<?php echo get_template_directory_uri(); ?>/reources/images/plus.png"
                                                                    alt=""></i>
                                                        </div></div>
                                                </div>
                                            </div>  
                                            
                                            <?php endwhile; wp_reset_query(); else : ?>
                                            <h2><?php _e('Nothing Found','lbt_translate'); ?></h2>
                                            <?php endif; ?>

                                        

                                    </div>        
                                </div>
                                <div class="col-md-4 mt-5">
                                    <aside class="_aside">
                                        <div class="app _calender">
                                            <div class="app__main">
                                                    <div class="calendar">
                                                    <div id="calendar"></div>
                                                </div>
                                            </div>
                                        </div>

                                    
                                    </aside>
                                </div>
                            </div>

                            <div class='panels'>
                                <div class='panel launchClander Fixed_delivery'>
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
                                                                            alt=""></i>
                                                                    <input type="text" data-id="<?php echo $pid;?>" value="1" 
                                                                        class="product-quantity form-control text-center incrDecrCounter" />
                                                                        
                                                                    <i class="count-up"><img
                                                                            src="<?php echo get_template_directory_uri(); ?>/reources/images/plus.png"
                                                                            alt=""></i>
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
                                                <a href="" class="btn_primary d-block" style="margin-right: 1rem;"> Weekly</a>
                                                <a href="" class="btn_primary btn_sec d-block">Daily</a>
                                            </div>
                                        <div>
                                        <input type="submit" id="order" class="btn_primary"  value="Save"/>
                                </div>
                        </div>
                    </div>
                                            </form>
                    
                </div>
            </div>
        </div>
    </main>


    
<section class="hideme overlay alertmessage">
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


<?php get_footer()?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/reources/js/script.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/reources/js/calender.js"></script>
  

</body>

</html>

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
                var date = jQuery('#date').val();
               
                
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
                                
                           
                var menu_items = menu_items;   

          
                
            
            
                $.ajax(
                    {
                        type:"POST",
                        url:"<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {
                            action: "dailyfood",
                            date : date,
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







