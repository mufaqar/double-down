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
                                <a href="<?php echo home_url('/company-profile/fixed-delivery-weekly'); ?>" class="btn_primary d-block" style="margin-right: 1rem;"> Weekly</a>
                                <a href="<?php echo home_url('/company-profile/fixed-delivery'); ?>" class="btn_primary btn_sec d-block">Daily</a>
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




    <section class="hideme overlay delivery_address">
        <div class="popup">
        <form class="update_deliver_address" id="update_deliver_address" action="#" > 
            <div class="popup_wrapper">
                <h3 class="ad_productss">Delivery Address</h3>               
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Delivery Address</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="address" id="address" placeholder="Pilestredet 75C " >
                        <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid" >    
                        <img src="<?php bloginfo('template_directory'); ?>/reources/images/pin.png" alt="">
                    </div>
                </div>
                <div class="add_address d-flex align-items-center justify-content-end mt-3">
                    <p><span>Add more address!</span></p>
                    <img src="<?php bloginfo('template_directory'); ?>/reources/images/plus-thin.png" alt="">
                </div>
                <div class="mt-5">
                   
                    <input type="submit" class="btn_primary"  value="Save"/>
                </div>
                
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
                            </form>
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







