<?php /* Template Name: Compnay-Settings  */ 
get_header('company');
$uid = get_current_user_id();
?>
<?php include('navigation.php'); 
                        $available_in_active_employee = get_users(
                            array(
                                'role' => 'personal',
                                'meta_query' => array(
                                    array(
                                        'key' => 'employee',
                                        'value' => $uid,
                                        'compare' => '=='
                                    ),
                                     array(
                                        'key' => 'status',
                                        'value' => 'inactive',
                                        'compare' => '=='
                                    )
                                )
                            )
                        );

                        $available_active_employee = get_users(
                            array(
                                'role' => 'personal',
                                'meta_query' => array(
                                    array(
                                        'key' => 'employee',
                                        'value' => $uid,
                                        'compare' => '=='
                                    ),
                                    array(
                                        'key' => 'status',
                                        'value' => 'active',
                                        'compare' => '=='
                                    )
                                )
                            )
                        );

                      



                        //print "<pre>";
                        //print_r($available_drivers);
                        ?>

<div class="tab_wrapper">
    <?php page_title()?>
        
        <div class='panels'>

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
                        <p>The company pays <?php echo get_user_meta($uid, 'lunch_benefit', true );  ?><?php echo get_user_meta($uid, 'lunch_benfit_type', true );  ?> Nok of each luch</p>
                      
                        <ul class="mt-2">
                            <li><span>Location:</span> <?php echo get_user_meta($uid, 'compnay_delivery_address', true );  ?> </li>
                     
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
                        <p><?php echo  count($available_active_employee); ?> Employee : Submit</p>
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
                        <p> <?php echo get_user_meta($uid, 'compnay_delivery_address', true );  ?> <br> </p>
                            <!-- The company pays NOK 69 in shipping. * price ex. 15% VAT</p> -->
                        <!-- <ul class="mt-2">
                            <li><span>Extra Info:</span> Pilestredet</li>
                        </ul> -->
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
                    <button id="invoice" class="btn_primary">See</button>
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
                    <h3 class="ad_productss">Compnay Delivery Address</h3>               
                    <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                        <label>Delivery Address</label>
                        <div class="_field d-flex justify-content-between align-items-center">
                            <input type="text" name="address" id="address" placeholder="<?php echo get_user_meta($uid, 'compnay_delivery_address', true );  ?>" >
                            <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid" >    
                            <img src="<?php bloginfo('template_directory'); ?>/reources/images/pin.png" alt="">
                        </div>
                    </div>
                    <!-- <div class="add_address d-flex align-items-center justify-content-end mt-3">
                        <p><span>Add more address!</span></p>
                        <img src="<?php bloginfo('template_directory'); ?>/reources/images/plus-thin.png" alt="">
                    </div> -->
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
                <h6>Total number of employees: <?php echo  count($available_active_employee); ?> </h6>
                <hr>
                <div>
                    <div class="btn_toggle">
                        <div class="btn_wrapper d-flex justify-content-center">
                            <button href="" class="activeEmp " onclick="activeEmp()">Active employees | <?php echo  count($available_active_employee); ?></button>
                            <button href="" class="inactiveEmp active" onclick="inactiveEmp()">Inactive Employees | <?php echo  count($available_in_active_employee); ?></button>
                        </div>
                    </div>

                    <!-- active content  -->
                    <div class="activeEmp_content ">
                        <div>

                        <div>
                            <section>
                               <form>
                                <?php foreach($available_active_employee as $emp)
                                {

                                //  print "<pre>";
                                    //print_r($emp);
                                    
                                    ?>
                                    <div class="__inner d-flex align-items-center justify-content-between mt-2">
                                        <div class="d-flex align-items-center">
                                            <input type="checkbox" id="emp" name="emp" value="Employee">
                                            <label for="emp" class="label"></label>
                                            <p><?php echo $emp->user_login ?></p>
                                        </div>
                                        <!-- <p>No fixed delivery</p> -->
                                    </div>

                                    <?php


                                }
                                ?>



                                    

                                    
                                    </form>
                                
                            </section>
                        </div>
                            

                        </div>
                    </div>

                    <!-- inactive content  -->
                    <div class="inactiveEmp_content active">
                    <div class="p-4 _action" id="_action">
                        <h3 class="mt-3">Select Action</h3>
                        <div class="d-flex justify-content-between mt-3">
                            <button id="" class="btn_primary">Cancel interval</button>
                            <button id="" class="btn_primary">Order interval</button>
                            <button id="" class="btn_primary">Stop delivery</button>
                        </div>
                    </div>
                        <div>
                            <section>
                                <form>

                                <?php foreach($available_in_active_employee as $emp)
                                {

                                  //  print "<pre>";
                                    //print_r($emp);
                                    
                                    ?>
                                    <div class="__inner d-flex align-items-center justify-content-between mt-2">
                                        <div class="d-flex align-items-center">
                                            <input type="checkbox" id="emp" name="emp" value="Employee">
                                            <label for="emp" class="label"></label>
                                            <p><?php echo $emp->user_login ?></p>
                                        </div>
                                        <!-- <p>No fixed delivery</p> -->
                                    </div>

                                    <?php


                                }
                                ?>



                                    

                                    
                                    </form>
                                    <form class="add_employes" id="add_employes" action="#">
                                    <hr class="mt-4 mb-4">
                                    <h3>+ Invite new employees</h3>
                                    <div class="__inner add  d-flex align-items-center justify-content-between mt-3">
                                       
                                            <div class="d-flex align-items-center w-100">
                                                <input type="email" id="email" name="email" value="" class="w-100">
                                                <input type="hidden" id="uid" name="uid" value="<?php echo $uid?>" class="w-100">
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
        <form class="update_agreement" id="update_agreement" action="#" > 
                <div class="popup_wrapper">
                    <h3 class="ad_productss">Details of the agreement</h3>               
                    <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                        <label>Agreement Name</label>
                        <div class="_field d-flex justify-content-between align-items-center">
                            <input type="text" name="compnay_agreement" id="compnay_agreement" placeholder="<?php echo get_user_meta($uid, 'compnay_agreement', true );  ?>" >
                            <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid" >                               
                        </div>
                    </div>
                    <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label class="mt-4 ">Company Pay</label>
                    <div class="_field _pay mb-4 form-group w-100 d-flex align-items-center">
                        <input type="text" class="form-control" id="lunch_benefit"  placeholder="<?php echo get_user_meta($uid, 'lunch_benefit', true );  ?>">
                        <select name="business_setting_type" id="business_setting_type" >
                            <option value="%">%</option>
                            <option value="$">$</option>
                        </select>
                    </div>
                    </div>                    
                    <div class="mt-5">                    
                        <input type="submit" class="btn_primary"  value="Save"/>
                    </div>
                    
                    <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
                </div>
            </form>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
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


            
            $("#add_employes").submit(function(e) { 
                e.preventDefault(); 
                var email = jQuery('#email').val();
                var uid = jQuery('#uid').val();
              
                $.ajax(
                    {
                        type:"POST",
                        url:"<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {
                            action: "add_employes",
                            email : email,                           
                            uid : uid
                        },   
                        success: function(data){                      
                        
                            if(data.code==0) {
                                        alert(data.message);
                            }  
                            else {
                                alert("Ajax Working");
                               // alert(data.message);
                        
                            }      
                    }
                
                });


            });

            
            $("#update_deliver_address").submit(function(e) { 
                e.preventDefault(); 
                var address = jQuery('#address').val();
                var uid = jQuery('#uid').val();
               
                $.ajax(
                    {
                        type:"POST",
                        url:"<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {
                            action: "company_deliver_address",
                            address : address,                           
                            uid : uid
                        },   
                        success: function(data){                      
                        
                            if(data.code==0) {
                                        alert(data.message);
                            }  
                            else {
                                alert(data.message);
                        
                            }      
                    }
                
                });
                
            }); 


            $("#update_agreement").submit(function(e) { 
                e.preventDefault(); 
                var compnay_agreement = jQuery('#compnay_agreement').val();
                var lunch_benefit = jQuery('#lunch_benefit').val();  
                var benefit_type = jQuery('#business_setting_type').val();  
                
                var uid = jQuery('#uid').val();
                $.ajax(
                    {
                        type:"POST",
                        url:"<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {
                            action: "update_agreement",
                            compnay_agreement : compnay_agreement,  
                            lunch_benefit : lunch_benefit,  
                            benefit_type : benefit_type,                           
                            uid : uid
                        },   
                        success: function(data){                      
                        
                            if(data.code==0) {
                                        alert(data.message);
                            }  
                            else {
                               alert(data.message);
                        
                            }      
                    }
                
                });
                
            }); 


            

        $('#emp').click(function() {
            $("#_action").toggle(this.checked);
        });
  

            


        });

  
        
    
	</script>







