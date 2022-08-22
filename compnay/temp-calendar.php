<?php /* Template Name: Lunch (C)  */ 
get_header('company');
?>
<?php include('navigation.php'); ?>

<!-- tabs -->

<div class="tab_wrapper">
    <div class='toggle'>
        <div class='tabs'>
            <div class='tab active'>Lunch calendar</div>
            <div class='tab'>Settings</div>
            <div class='tab'>Fast levering</div>
        </div>
        <div class='panels'>
            <div class='panel launchClander'>
                <h2>Business lunch calendar</h2>
                <p>Here you can easily choose between or cancel the various lunch options from day
                    to day. If you want to change a fixed subscription, do so <a href="">her.</a>
                </p>

          <div class="calender_wrapper d-flex justify-content-between align-items-center">
                    <div class="calender">
                        <input type="date">
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
                                <!-- Accordion item 1 -->

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
                                       
                                     // print_r($week);
                                        ?>

                                            <div class="card">
                                                        <form class="dailyfood" id="dailyfood<?php echo $day ?>" action="#">
                                                            <div id="headingOne" class="card-header bg-white shadow-sm border-0 py-4">
                                                            <input type="hidden" value="<?php echo $today_date ?>" id="day" >
                                                            <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid" >                                                            
                                                                            <div class="mb-0 d-flex align-items-center">
                                                                                <button type="button" data-toggle="collapse" data-target="#collapse<?php echo $day?>"
                                                                                    aria-expanded="true" aria-controls="collapse<?php echo $day?>"
                                                                                    class="btn text-dark font-weight-bold text-uppercase collapsible-link shadow-none">
                                                                                    <?php echo $today_day ?> | <span><?php echo $today_date ?></span>
                                                                                </button>
                                                                                <h6 class="text-nowrap mb-0"><div class="message">No Booking </div> </h6>
                                                                            </div>
                                                                </div>
                                                                <div id="collapse<?php echo $day?>" aria-labelledby="headingOne" data-parent="#accordionExample"
                                                                    class="collapse show accordion_content">
                                                                    <div class="card-body p-md-5">
                                                                        <?php get_template_part('partials/content', 'daylunch'); ?>
                                                                    </div>
                                                            </div>
                                                        </form>
                                                </div><!-- End -->
                                        <?php
                                    }

                                
                                    ?>




                              


                            </div><!-- End -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- setting tab content  -->

            <div class='panel launchClander setting_tab'>
                <h2>Corporate agreement settings</h2>
                <p>As a company administrator, you can get an overview of and make changes
                    to
                    the
                    company agreement here. Using the menu above, you can also see the
                    company's
                    lunch calendar, or change the regular deliveries.</p>
                <div class="deatil_card d-flex justify-content-between align-items-center">
                    <div class="info">
                        <h3>Details of the agreement</h3>
                        <p>The company pays 20% or Nok of each luch</p>
                        <p class="mt-1">Start date: Friday, May 20, 2022</p>
                        <ul class="mt-2">
                            <li><span>Location 1:</span> Pilestredet 75C | 0354 | OSLO</li>
                            <li><span>Location 2:</span> Pilestredet 75C | 0354 | OSLO</li>
                        </ul>
                    </div>

                    <div >
                        <button id="agreement" class="btn_primary">Change</button>
                    </div>
                </div>
                <!-- 2nd -->
                <div class="deatil_card d-flex justify-content-between align-items-center">
                    <div class="info">
                        <h3>Employees in the agreement</h3>
                        <p>1 employee : Sumit</p>
                    </div>
                    <div>
                        <button id="emp_agreement" class="btn_primary">See or Overrid</button>
                        
                    </div>

                    
  




                </div>
                <!-- 3rd  -->
                <div class="deatil_card d-flex justify-content-between align-items-center">
                    <div class="info">
                        <h3>Meeting Food</h3>
                        <p>Everyone deserves good food - even those you
                            have invited to a meeting!</p>
                    </div>
                    <div >
                        <a href="<?php echo home_url('meeting'); ?>" class="btn_primary">Order Meeting Food</a>
                    </div>
                </div>

                <!-- 4th  -->
                <div class="deatil_card d-flex justify-content-between align-items-center">
                    <div class="info">
                        <h3>Delivery Address</h3>
                        <p>Pilestredet 75C | 0354 | OSLO <br>
                            The company pays NOK 69 in shipping. * price ex. 15% VAT</p>
                        <ul class="mt-2">
                            <li><span>Extra Info:</span> Pilestredet</li>
                        </ul>
                    </div>
                    <div class="">
                        <button id="delivery_address" class="btn_primary">Change</button>
                    </div>
                </div>

                <!-- 5th  -->
                <div class="deatil_card d-flex justify-content-between align-items-center">
                    <div class="info">
                        <h3>Daily Overview</h3>
                        <p>Daily overview of orders</p>
                    </div>
                    <div class="">
                    <button id="orders" class="btn_primary">See</button>
                    </div>
                </div>

                <!-- 6th  -->
                <div class="deatil_card d-flex justify-content-between align-items-center">
                    <div class="info">
                        <h3>Invoice</h3>
                        <p>Overview</p>
                    </div>
                    <div class="">
                    <button href="" id="invoice" class="btn_primary">See</button>
                    </div>
                </div>

            </div>

            <!-- Fast levering tab content  -->

            <div class='panel launchClander Fixed_delivery'>
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
                                                <button href="" id="123" class="btn_primary  select_product_btn id<?php echo $pid;?>"
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
                                <a href="" class="btn_primary d-block" style="margin-right: 1rem;"> Weekly</a>
                                <a href="" class="btn_primary btn_sec d-block">Daily</a>
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




    <section class="hideme overlay delivery_address">
        <div class="popup">
            <div class="popup_wrapper">
                <h3 class="ad_productss">Delivery Address</h3>               
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Delivery Address</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="" id="" placeholder="Pilestredet 75C ">
                        <img src="<?php bloginfo('template_directory'); ?>/reources/images/pin.png" alt="">
                    </div>
                </div>
                <div class="add_address d-flex align-items-center justify-content-end mt-3">
                    <p><span>Add more address!</span></p>
                    <img src="<?php bloginfo('template_directory'); ?>/reources/images/plus-thin.png" alt="">
                </div>
                <div class="mt-5">
                    <a href="" class="btn_primary">Save</a>
                </div>
                
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </div>
    </section> 

    
    <section class="hideme overlay emp_agreement">
        <div class="popup">
            <div class="popup_wrapper">
                <h3>Employees in the Agreement</h3>
                <h6>Total number of employees: 1</h6>
                <hr>
                <div>
                    <div class="btn_toggle">
                        <div class="btn_wrapper d-flex justify-content-center">
                            <button href="" class="activeEmp " onclick="activeEmp()">Active employees | 01</button>
                            <button href="" class="inactiveEmp active" onclick="inactiveEmp()">Inactive Employees | 0</button>
                        </div>
                    </div>

                    <!-- active content  -->
                    <div class="activeEmp_content ">
                        <div>

                        </div>
                    </div>

                    <!-- inactive content  -->
                    <div class="inactiveEmp_content active">
                        <div>
                            <section>
                                <form>
                                    <div class="__inner d-flex align-items-center justify-content-between mt-5">
                                        <div class="d-flex align-items-center">
                                            <input type="checkbox" id="emp" name="emp" value="Employee" checked>
                                            <label for="emp" class="label"></label>
                                            <p>Employee</p>
                                        </div>
                                        <p>No fixed delivery</p>
                                    </div>

                                    <div class="__inner d-flex align-items-center justify-content-between mt-3">
                                        <div class="d-flex align-items-center">
                                            <input type="checkbox" id="days" name="days" value="days" >
                                            <label for="days" class="label"></label>
                                            <p>Jose Olsen Barros</p>
                                        </div>
                                        <p>Number of delivery days</p>
                                    </div>

                                    <hr class="mt-4 mb-4">
                                    <h3>+ Invite new employees</h3>

                                    <div class="__inner add  d-flex align-items-center justify-content-between mt-3">
                                        <div class="d-flex align-items-center w-100">
                                            <input type="email" id="days" name="days" value="days" class="w-100">
                                            <button class="d-flex align-items-center">
                                                <img src="<?php bloginfo('template_directory'); ?>/reources/images/plus-thin.png" alt="">
                                                <span>Add</span>
                                            </button>
                                        </div>
                                        
                                    </div>

                                </form>
                            </section>
                        </div>
                    </div>
                </div>

                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </div>
    </section>

    <section class="hideme overlay agreement">
        <div class="popup">
            <div class="popup_wrapper">
                <h3>Employees in the Agreement</h3>
                <h6>Total number of employees: 1</h6>
                <hr>
                <div>
                    <div class="btn_toggle">
                        <div class="btn_wrapper d-flex justify-content-center">
                            <button href="" class="activeEmp " onclick="activeEmp()">Active employees | 01</button>
                            <button href="" class="inactiveEmp active" onclick="inactiveEmp()">Inactive Employees | 0</button>
                        </div>
                    </div>

                    <!-- active content  -->
                    <div class="activeEmp_content ">
                        <div>

                        </div>
                    </div>

                    <!-- inactive content  -->
                    <div class="inactiveEmp_content active">
                        <div>
                            <section>
                                <form>
                                    <div class="__inner d-flex align-items-center justify-content-between mt-5">
                                        <div class="d-flex align-items-center">
                                            <input type="checkbox" id="emp" name="emp" value="Employee" checked>
                                            <label for="emp" class="label"></label>
                                            <p>Employee</p>
                                        </div>
                                        <p>No fixed delivery</p>
                                    </div>

                                    <div class="__inner d-flex align-items-center justify-content-between mt-3">
                                        <div class="d-flex align-items-center">
                                            <input type="checkbox" id="days" name="days" value="days" >
                                            <label for="days" class="label"></label>
                                            <p>Jose Olsen Barros</p>
                                        </div>
                                        <p>Number of delivery days</p>
                                    </div>

                                    <hr class="mt-4 mb-4">
                                    <h3>+ Invite new employees</h3>

                                    <div class="__inner add  d-flex align-items-center justify-content-between mt-3">
                                        <div class="d-flex align-items-center w-100">
                                            <input type="email" id="days" name="days" value="days" class="w-100">
                                            <button class="d-flex align-items-center">
                                                <img src="<?php bloginfo('template_directory'); ?>/reources/images/plus-thin.png" alt="">
                                                <span>Add</span>
                                            </button>
                                        </div>
                                        
                                    </div>

                                </form>
                            </section>
                        </div>
                    </div>
                </div>

                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
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
                <th scope="col">Invoice Date</th>
                <th scope="col">Total</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row">Sunday, May 29, 2022</td>
                <td>80</td>
                <td>459.2</td>
                <td>Complete <i class="fa-solid fa-down-to-line"></i></td>
              </tr>
              <tr>
                <td scope="row">Sunday, June 5, 2022</td>
                <td>80</td>
                <td>459.2</td>
                <td>Pending <i class="fa-solid fa-down-to-line"></i></td>
              </tr>
              <tr>
                <td scope="row">Sunday, June 6, 2022</td>
                <td>80</td>
                <td>459.2</td>
                <td>Pending <i class="fa-solid fa-down-to-line"></i></td>
              </tr>
            </tbody>
          </table>
        </div>

        <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
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







