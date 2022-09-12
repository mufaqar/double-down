<?php /* Template Name: Personal-LunchCalednar  */ 
get_header();

$query_date = $_GET['date']; 

?>
<?php include('navigation.php'); ?>

<div class="tab_wrapper">
<?php page_title() ;  //echo $query_date;?>
                    <div class="custom_container">
                          
                            <div class="row">
                                <div class="catering_wrapper mt-5 mb-5 col-md-8">
                                    <div class="catering_menu">
                                        <a href="<?php echo home_url('profile/lunch-calendar'); ?>" class="_active">Lunch Calendar</a>
                                        <a href="<?php echo home_url('profile/fixed-delivery'); ?>">Fixed Delivery</a>
                                    </div>
                                    <div class="calender_wrapper d-flex justify-content-between align-items-center mt-5">
                                        <p>A Total of  Boxes,<br> Additions you pay: NOK </p>
                                       
                                            <div class="calender">
                                                <form action="" method="GET" id="dateform">
                                                     <input type="date" name="date" value="<?php if($query_date == '') { echo date("Y-m-d"); } else echo $query_date; ?>" id="date">
                                                </form>
                                            </div>


                                         
                                       
                                    </div>
                                    <form class="weeklyfood" id="weeklyfood" action="#" >   
                                    <div class="catering_card_wrapper">
                                        <?php 

                                    if($query_date != '') {
                                        query_posts(array(
                                            'post_type' => 'menu_items',
                                            'posts_per_page' => -1,
                                            'order' => 'desc',                                                                                                       
                                            'meta_query' => array(
                                                array(
                                                    'key' => 'date',
                                                    'value' => $query_date,
                                                    'compare' => 'LIKE'
                                                ),
                                            )
                                        ));
                                        
                                        
                                        
                                            }
                                            else {

                                                $current_date =   date("Y-m-d");                                                                                           

                                                query_posts(array(
                                                    'post_type' => 'menu_items',
                                                    'posts_per_page' => -1,
                                                    'order' => 'desc',
                                                    'menu_types' => 'lunch-boxes' ,                                                                    
                                                    'meta_query' => array(
                                                        array(
                                                            'key' => 'date',
                                                            'value' => $current_date,
                                                            'compare' => 'LIKE'
                                                        ),
                                                    )
                                                ));


                                            }
                                            if (have_posts()) :  while (have_posts()) : the_post(); $pid = get_the_ID(); ?>
                                            
                                            <div class="catering_card _pro_salat ">
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

                                                    <div class="product_card ">
                                                        
                                                        <button href="" class="btn_primary  select_product_btn id<?php echo $pid;?>"
                                                                        onmouseover="showCounter(<?php echo $pid;?>)">Select</button>
                                                                            <div class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid<?php echo $pid;?>">
                                                                                <i class="count-down" onclick="handleCountDec(<?php echo $pid ?>)"><img
                                                                                        src="<?php echo get_template_directory_uri(); ?>/reources/images/neg.png"
                                                                                        alt="" ></i>
                                                                                <input type="text" data-id="<?php echo $pid;?>" value="1" 
                                                                                    class="product-quantity form-control text-center incrDecrCounter" />
                                                                                    
                                                                                <i class="count-up" onclick="handleCountInc(<?php echo $pid ?>)"><img
                                                                                        src="<?php echo get_template_directory_uri(); ?>/reources/images/plus.png"
                                                                                        alt="" ></i>
                                                                            </div>
                                                    
                                                    </div>
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
                                               
                                            </div>
                                        </div>

                                    
                                    </aside>
                                </div>
                            </div>

                            <div class='panels'>
                                <div class='panel launchClander Fixed_delivery' id="weeklyfood">
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
                                                            <img src="<?php echo get_template_directory_uri(); ?>/reources/images/product1.png" alt="">
                                                            <h2><?php the_title(); ?> , NOK <?php the_field('menu_item_price'); ?> </h2>
                                                            <button href="" class="btn_primary  select_product_btn id<?php echo $pid;?>"
                                                                    onmouseover="showCounter(<?php echo $pid;?>)">Select</button>
                                                                        <div class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid<?php echo $pid;?>">
                                                                            <i class="count-down" onclick="handleCountDec(<?php echo $pid ?>)"><img
                                                                                    src="<?php echo get_template_directory_uri(); ?>/reources/images/neg.png"
                                                                                    alt="" ></i>
                                                                            <input type="text" data-id="<?php echo $pid;?>" value="1" 
                                                                                class="product-quantity form-control text-center incrDecrCounter" />
                                                                                
                                                                            <i class="count-up" onclick="handleCountInc(<?php echo $pid ?>)"><img
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
    <script type="text/javascript">  



jQuery(document).ready(function($) 
   {   

       $('#date').change(function() {             

           $(this).closest('form').submit();

       });
     

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
            alert(menu_items);          
                        
                      
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
                      // $(".alertmessage").css("display", "flex");
                   
                       }      
               }
           
           });
       }); 

      

     

       


   });



</script>


  
   
</body>

</html>
