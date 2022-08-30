<?php /* Template Name: Fix Delivery (P)  */  get_header();?>
<?php include('navigation.php'); ?>
                    <!-- tabs -->
                    <div class="tab_wrapper">
                    <?php page_title()?>
                    <div class="custom_container c2">
                        <div class="row">
                            <div class="catering_wrapper c2 mt-5 mb-5">
                                <div class="catering_menu">
                                    <a href="<?php echo home_url('profile'); ?>" class="">Lunch Calendar</a>
                                    <a href="" class="_active">Fixed Delivery</a>
                                </div>
                                <div class="calender_wrapper mt-5">
                                    <h3>Fast levering</h3>
                                    <p>Here you change your regular lunch delivery from us. If you only want to cancel
                                        or change the type of lunch on certain days, do so <span>her.</span></p>
                                    <br>
                                    <hr>

                                   

                                </div>
                                <section class="fixed_delivery mt-4">
                                     <form id="delivery_food" method="POST">   
                                            <div class="row">                                    
                                                <?php get_template_part('partials/content', 'fixdelivery'); ?>
                                                <div class="col-lg-6 mt-5"> <input type="submit" id="order" class="btn_primary" value="Save Fixed Delivery" /> </div>                                   
                                            </div>
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php get_footer();?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/reources/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript"> 


        var items = [];     
    
    //console.log(foodlist);
    function openfooditems() {
        var getBtn = document.querySelector('.add_roll')
        var food_list = document.querySelector('.food_list')
        food_list.classList.add('_open')
    }

      
        var mon  = [];
        var tue  = [];
        var wed  = [];
        var thu  = [];
        var fri  = [];



        var fl_mon  = [];
        var fl_tue  = [];
        var fl_wed  = [];
        var fl_thu  = [];
        var fl_fri  = [];



    
        function reply_click(clicked_id, day) {
            var getAddBtn = document.querySelector('#add_food_'.concat(day));
            var getType = document.querySelector('#lunch_type').value;  
            var getFoodInnerHtml = document.getElementById(clicked_id).innerHTML
            var getFoodId = document.getElementById(clicked_id).getAttribute('product-id')
            var fooditem = document.getElementById(clicked_id)
            const html = `<input type="text" name="abcd"  class="mt-3 d-block p-2 w-100" disabled product-id="${getFoodId}" value="${getFoodInnerHtml}" />`
            getAddBtn.insertAdjacentHTML('beforebegin', html);
            
        

            if(day == 'Monday')
            {
                fl_mon.push(getFoodId);
                mon.push({"day": day, "type": getType , items : fl_mon });
                console.log(mon);
            }
            else if(day == 'Tuesday')
            {
                fl_tue.push(getFoodId);
                tue.push({"day": day, "type": getType , items : fl_tue });
                console.log(tue);
                        
            }
            else if(day == 'Wedenday')
            {
                fl_wed.push(getFoodId);
                wed.push({"day": day, "type": getType , items : fl_wed });
            }
            else if(day == 'Thursday')
            {
                
                fl_thu.push(getFoodId);
                thu.push({"day": day, "type": getType , items : fl_thu });
            }
            else if(day == 'Friday')
            {
                fl_fri.push(getFoodId);
                fri.push({"day": day, "type": getType , items : fl_fri });
                console.log(fri); 
            }    
                
            fooditem.remove();      
            //console.log(foodlist);
        }


      

                   
    
    



        jQuery(document).ready(function($) 
            {                
                
                $('._cross').click(function(){
                    $(".hideme").css("display", "none");
                });
                
                $("#delivery_food").submit(function(e) { 
                    e.preventDefault(); 
                    gl_mon = mon.length;
                    gl_tue = tue.length;
                    gl_wed = wed.length;
                    gl_thu = thu.length;
                    gl_fri = fri.length;               
                    var f_mon = JSON.stringify(mon[gl_mon-1]);  
                    var f_tue = JSON.stringify(tue[gl_tue-1]);  
                    var f_wed = JSON.stringify(wed[gl_wed-1]);  
                    var f_thu = JSON.stringify(thu[gl_thu-1]);  
                    var f_fri = JSON.stringify(fri[gl_fri-1]);

                                      
                    $.ajax(
                        {   
                            type:"POST",
                            url:"<?php echo admin_url('admin-ajax.php'); ?>",                                                  
                            data: {
                                action: "fixdelivery",
                                mon : f_mon,
                                tue : f_tue,
                                wed : f_wed, 
                                thu : f_thu,  
                                fri : f_fri
                            }, 
                            dataType: 'json',  
                            success: function(data){  
                                if(data.code==0) {
                                   // alert(data.message);
                                }  
                                else {
                                 //   alert(data.message);
                          
                                }      
                            }
                
                        });

                    

                 
                



                 

                });


                            
                $("#fixdelivery0").submit(function(e) { 

                    alert("asdfasdf")
                    var day = jQuery('#day').val();
                    var uid = jQuery('#uid').val();
                    alert(day);                
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
                                action: "fixdelivery",
                                day : day,
                                menu_items : menu_items,  
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

            });
        
        </script>


