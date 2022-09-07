<?php /* Template Name: Comapny-LunchCaldendar  */
get_header('company');
?>
<?php include('navigation.php'); ?>

<div class="tab_wrapper">
    <?php page_title() ?>
    <div class='panels'>
        <div class='panel launchClander'>

            <div class="catering_wrapper c2 mt-5 mb-5">
                <div class="catering_menu">
                    <a href="<?php echo home_url('/company-profile/lunch-calendar'); ?>" class="_active">Lunch Calendar</a>
                    <a href="<?php echo home_url('/company-profile/fixed-delivery'); ?>" class="">Fixed Delivery</a>
                </div>
<<<<<<< HEAD:compnay/temp-lunchcalendar.php
                    <h2>Business lunch calendar</h2>
                    <p>Here you can easily choose between or cancel the various lunch options from day
                        to day. If you want to change a fixed subscription, do so <a href="">her.</a>
                    </p>

                   <div class="calender_wrapper d-flex justify-content-between align-items-center">
                        <div class="calender week_calender">
                            <input type="text" id="weekPicker2" value="<?php echo date("Y-W"); ?>">
                            <div class="wc-icon"><i class="fa-solid fa-calendar-days"></i></div>
                        </div>
=======
            </div>
            <h2>Business lunch calendar</h2>
            <p>Here you can easily choose between or cancel the various lunch options from day
                to day. If you want to change a fixed subscription, do so <a href="">her.</a>
            </p>

            <div class="calender_wrapper d-flex justify-content-between align-items-center">
                <div class="calender week_calender">
                    <input type="text" id="weekPicker2" value="<?php echo date("Y-W"); ?>">
                    <div class="wc-icon"><i class="fa-solid fa-calendar-days"></i></div>
                </div>
                <div class="info">
                    <h6>Total this Week | <span>NOK 0, -</span></h6>
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
                            foreach (range(0, 4) as $day) {
                                $week[] = date("Y-m-d", (($day * 86400) + $saturday));
                                $today_date =  $week[$i];
                                $i++;
                                $timestamp = strtotime($today_date);
                                $today_day = date('l', $timestamp);
                                $this_day =  strtolower(date('D', $timestamp));

                                // print_r($week);
                            ?> <div class="card">
                                    <form class="dailyfood" id="dailyfood_<?php echo $this_day ?>" action="#">
                                        <div id="headingOne" class="card-header bg-white shadow-sm border-0 py-4">
                                            <input type="hidden" value="<?php echo $today_date ?>" id="day_<?php echo $this_day ?>">
                                            <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid">
                                            <div class="mb-0 d-flex align-items-center">
                                                <button type="button" data-toggle="collapse" data-target="#collapse<?php echo $this_day ?>" aria-expanded="true" aria-controls="collapse<?php echo $day ?>" class="btn text-dark font-weight-bold text-uppercase collapsible-link shadow-none">
                                                    <?php echo $today_day ?> | <span><?php echo $today_date ?></span>
                                                </button>
                                                <h6 class="text-nowrap mb-0">
                                                    <div class="message">No Booking </div>
                                                </h6>
                                            </div>
<<<<<<< HEAD
                                        </div>
                                        <div id="collapse<?php echo $this_day ?>" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse show accordion_content">
                                            <div class="card-body p-md-5">
                                                <?php get_template_part('partials/content', 'daylunch'); ?>
                                            </div>
                                        </div>
                                    </form>
=======
>>>>>>> 69d683e7657498590bb561bc4f5569ef55ab39d0:compnay/temp-calendar.php
                        <div class="info">
                            <h6>Total this Week | <span>NOK 0, -</span></h6>                 
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
                                        $i= 0;
                                        foreach (range(0, 4) as $day) {
                                            $week[] = date("Y-m-d", (($day * 86400) + $saturday));
                                            $today_date =  $week[$i];
                                            $i++;                                       
                                            $timestamp = strtotime($today_date);
                                            $today_day = date('l', $timestamp);
                                            $this_day =  strtolower(date('D', $timestamp));
                                        
                                        // print_r($week);
                                            ?>     <div class="card">
                                                            <form class="dailyfood" id="dailyfood_<?php echo $this_day ?>" action="#">
                                                                <div id="headingOne" class="card-header bg-white shadow-sm border-0 py-4">
                                                                        <input type="hidden" value="<?php echo $today_date ?>" id="date_<?php echo $this_day ?>" >
                                                                        <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid" > 
                                                                        <input type="hidden" id="week_<?php echo $this_day ?>" value="<?php echo date("W"); ?>">
                                                                        <div class="mb-0 d-flex align-items-center">
                                                                            <button type="button" data-toggle="collapse" data-target="#collapse<?php echo $this_day?>"
                                                                                aria-expanded="true" aria-controls="collapse<?php echo $day?>"
                                                                                class="btn text-dark font-weight-bold text-uppercase collapsible-link shadow-none">
                                                                                <?php echo $today_day ?> | <span><?php echo $today_date ?></span>
                                                                            </button>
                                                                            <h6 class="text-nowrap mb-0"><div class="message">No1 Booking </div> </h6>
                                                                        </div>
                                                                    </div>
                                                                    <div id="collapse<?php echo $this_day?>" aria-labelledby="heading<?php echo $this_day?>" data-parent="#accordionExample"
                                                                        class="collapse show accordion_content">
                                                                        <div class="card-body p-md-5 Fixed_delivery">
                                                                            <?php get_template_part('partials/content', 'daylunch'); ?>
                                                                        </div>
                                                                </div>
                                                            </form>
                                                    </div><!-- End -->
                                            <?php
                                        }                                
                                        ?>                              


>>>>>>> 399c76945faadaa7149f932d99d6aa11532f46c6
                                </div><!-- End -->
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
                        <h2 class="mb-5 mt-5">Your Order has beed submitted!</h2>

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

<!-- week calender  -->

<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/reources/js/weekPicker.min.js"></script>
<script>
    convertToWeekPicker($("#weekPicker2"));
</script>
<script type="text/javascript">
    jQuery(document).ready(function($) {

        $('._cross').click(function() {

            $(".hideme").css("display", "none");
        });

<<<<<<< HEAD:compnay/temp-lunchcalendar.php
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
                                alert("Day<?php echo $this_day?>");              
                                var date = jQuery('#date_<?php echo $this_day; ?>').val();
                                var weekid = jQuery('#week_<?php echo $this_day; ?>').val();
                                var usertype = jQuery('#usertype').val();
                                var uid = jQuery('#uid').val();
                                var datas = [];
                                var newdata = [];
                                var extraproducts = [];           
                                var fprod = [];
                                $("#dailyfood_<?php echo $this_day; ?> .product-quantity").each(function () {
                                    var productid =  $(this).data('id');
                                    var value = $(this).val() ;
                                    if(value >=1) {
                                        datas.push( {"id" : productid , "value" : $(this).val() });   
                                        }                     
                                    newdata.push(datas);                  
                                }); 
                                
                                $("#extrafood_<?php echo $this_day; ?> .product-extra").each(function () {
                                    var pro_id =  $(this).attr('data-id'); 
                                    extraproducts.push({"id" : pro_id});   
                                }); 

                                fprod.push({"food_item": newdata[0],  "extra_food" : extraproducts , "date" : date , "uid" : uid ,"weekid" : weekid });
                                console.log(fprod);                
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
=======
>>>>>>> 69d683e7657498590bb561bc4f5569ef55ab39d0:compnay/temp-calendar.php


        <?php

        $mweek = [];
        $saturday = strtotime('monday this week');
        $i = 0;
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
                alert("Day<?php echo $this_day ?>");
                var day = jQuery('#day_<?php echo $this_day; ?>').val();
                var uid = jQuery('#uid').val();
                var datas = [];
                var newdata = [];
                var extraproducts = [];
                var fprod = [];
                $("#dailyfood_<?php echo $this_day; ?> .product-quantity").each(function() {
                    var productid = $(this).data('id');
                    var value = $(this).val();
                    if (value >= 1) {
                        datas.push({
                            "id": productid,
                            "value": $(this).val()
                        });
                    }
                    newdata.push(datas);
                });

                $("#dailyfood_<?php echo $this_day; ?> .product-extra").each(function() {
                    var pro_id = $(this).attr('data-id');
                    extraproducts.push({
                        "id": pro_id
                    });
                });

                fprod.push({
                    "food_item": newdata[0],
                    "extra_food": extraproducts,
                    "day": day,
                    "uid": uid
                });
                console.log(fprod);
                $.ajax({
                    type: "POST",
                    url: "<?php echo admin_url('admin-ajax.php'); ?>",
                    data: {
                        action: "dailyfood",
                        day: day,
                        menu_items: fprod,
                        uid: uid

                    },
                    success: function(data) {
                        if (data.code == 0) {
                            alert(data.message);
                        } else {
                            $(".alertmessage").css("display", "flex");
                        }
                    }

                });

            });

        <?php

        }




        ?>







    });
</script>