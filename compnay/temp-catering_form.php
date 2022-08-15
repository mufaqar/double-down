<?php /* Template Name: Catering Form (C)  */ 
get_header();

?> 
 <?php include('navigation.php'); ?>

<div class="custom_container catering_form mt-5 mb-5">
    <div class="_info mt-5 mb-5">
        <h2>Catering Form</h2>
        <p>Here you change your regular lunch delivery from us. If you only want to cancel or change the type of lunch on certain days, do so <span>her.</span></p>
    </div>
    <hr>
    <div class="_form mt-5 p-4 pt-5 pb-5">
    <form class="addcatering" id="addcatering" action="#" > 
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Number of People</label>
                    <div class="_select">
                        <select id="people">
                            <option value="1">01</option>
                            <option value="2">02</option>
                            <option value="3">03</option>
                            <option value="4">04</option>
                            <option value="5">05</option>
                            <option value="6">06</option>
                            <option value="7">07</option>
                            <option value="8">08</option>
                            <option value="9">09</option>
                            <option value="10">10</option>
                        </select>
                        <img src="<?php bloginfo('template_directory'); ?>/reources/images/down-arrow.png" alt="">
                    </div>
                </div>

                <div class="col-md-6 mt-3 mt-md-0 mb-3">
                    <label for="">Date</label>
                    <div class="_select">
                        <input type="date" valu="" placeholder="02-05-22" id="date">
                    </div>
                </div>


                <div class="col-md-6 mt-3 mt-md-0 mb-3">
                    <label for="">Time</label>
                    <div class="_select">
                        <input type="time" valu="" placeholder="02-05-22" id="time">
                        <!-- <img src="./reources//images/date.png" alt=""> -->
                    </div>
                </div>

                <div class="col-md-6 mt-3 mt-md-0 mb-3">
                    <label for="">Address</label>
                    <div class="_select">
                        <input type="text" valu="" placeholder="Add your address" id="address">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Food Type</label>
                    <div class="_select">
                        <select id="food_type">
                            
                            <?php   
                            $types_tax = get_terms( array('taxonomy' => 'food_type','hide_empty' => false ) ); 
                            foreach( $types_tax as $type )  {
                                        $type_slug = $type->term_id ;
                                        $type_name = $type->name ; ?>                            
                                        <option value="<?php echo $type_slug; ?>" > <?php echo $type_name; ?> </option>
                                            <?php
                                }                                                    
                            ?>
                        </select>
                        <img src="./reources/images/down-arrow.png" alt="">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Food Categories</label>
                    <div class="_select">
                        <select id="food_cat">
                        <?php   
                            $food_categories = get_terms( array('taxonomy' => 'food_categories','hide_empty' => false ) ); 
                            foreach( $food_categories as $food_cat )  {
                                        $food_cat_slug = $food_cat->term_id ;
                                        $food_cat_name = $food_cat->name ; ?>                            
                                        <option value="<?php echo $food_cat_slug; ?>" > <?php echo $food_cat_name; ?> </option>
                                            <?php
                                }                                                    
                            ?>
                        </select>
                        <img src="<?php bloginfo('template_directory'); ?>/reources/images/down-arrow.png" alt="">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Product Category</label>
                    <div class="_select">
                        <select id="pro_cat">
                    <?php   
                            $product_tax = get_terms( array('taxonomy' => 'product_category','hide_empty' => false ) ); 
                            foreach( $product_tax as $product_cat )  {
                                        $product_cat_slug = $product_cat->term_id ;
                                        $product_cat_name = $product_cat->name ; ?>                            
                                        <option value="<?php echo $product_cat_slug; ?>" > <?php echo $product_cat_name; ?> </option>
                                            <?php
                                }                                                    
                            ?>
                         </select>
                        <img src="<?php bloginfo('template_directory'); ?>/reources/images/down-arrow.png" alt="">
                    </div>
                </div>


                <div class="col-md-6 mt-3 mt-md-0 mb-3">

                <label for="">Product Sub Categories</label>
                    <div class="_select">
                        <select id="pro_sub_cat">
                        <?php   
                            $product_sub_tax = get_terms( array('taxonomy' => 'product_sub_category','hide_empty' => false ) ); 
                            foreach( $product_sub_tax as $product_sub_cat )  {
                                        $product_sub_cat_slug = $product_sub_cat->term_id ;
                                        $product_sub_cat_name = $product_sub_cat->name ; ?>                            
                                        <option value="<?php echo $product_sub_cat_slug; ?>" > <?php echo $product_sub_cat_name; ?> </option>
                                            <?php
                                }                                                    
                            ?>
                         </select>
                        <img src="<?php bloginfo('template_directory'); ?>/reources/images/down-arrow.png" alt="">
                    </div>
                    
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Allergens</label>
                    <div class="_select">
                        <select id="allergens">
                        <?php   
                            $allergens_tax = get_terms( array('taxonomy' => 'allergens','hide_empty' => false ) ); 
                            foreach( $allergens_tax as $allergens_cat )  {                                
                                        $allergens_cat_slug = $allergens_cat->term_id ;
                                        $allergens_cat_name = $allergens_cat->name ; ?>                            
                                        <option value="<?php echo $allergens_cat_slug; ?>" > <?php echo $allergens_cat_name; ?> </option>
                                            <?php
                                }                                                    
                            ?>
                         </select>
                        <img src="<?php bloginfo('template_directory'); ?>/reources/images/down-arrow.png" alt="">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                <label for="">Budget Per Person</label>
                    <div class="_select">
                        <input type="text" valu="" placeholder="NOK 349" id="person">
                    </div>
                </div>
                <div class="d-flex justify-content-end savebtn">
                    <input type="submit" class="btn_primary"  value="Save"/>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</main>


<section class="hideme zindex-modal overlay">
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
                            <a href="<?php echo home_url('catering'); ?>" class="btn_primary mb-5">View Catering Orders</a>
                        </div>
                    </div>
                    
                </div>
                <img src="./reources//images/red cross.png" alt="" class="_cross">
            </div>
        </div>
    </section>


    <?php get_footer();?>

     <!-- Font Awsome -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" ></script> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script type="text/javascript">   
     jQuery(document).ready(function($) {	      	
        $("#addcatering").submit(function(e) {                     
            e.preventDefault();                     
            var people = jQuery('#people').val();	             
            var date = jQuery('#date').val();	 
            var time = jQuery('#time').val();	 
            var address = jQuery('#address').val();	             
            var food_type = jQuery('#food_type').val();	 
            var food_cat = jQuery('#food_cat').val();	 
            var pro_cat = jQuery('#pro_cat').val();	 
            var pro_sub_cat = jQuery('#pro_sub_cat').val();	
            var person = jQuery('#person').val();           
            var allergens = jQuery('#allergens').val();  
           
            $.ajax(
                {
                    type:"POST",
                    url:"<?php echo admin_url('admin-ajax.php'); ?>",
                    data: {
                        action: "addcatering",
                        people : people,
                        date : date,                  
                        time : time,
                        address : address,
                        food_type : food_type,
                        food_cat : food_cat,
                        allergens : allergens ,
                        pro_cat : pro_cat,
                        pro_sub_cat : pro_sub_cat,
                        person : person
                    },   
                    success: function(data){                      
                     
                        if(data.code==0) {
                                    alert(data.message);
                        }  
                        else {
                           $(".overlay").css("display", "flex");
                      
                        }      
            }
            
             });
         }); 
            
        
     });
	</script>












