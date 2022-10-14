    <?php /* Template Name: Admin-OrderHandling  */



    get_header('admin');



    ?>
    <?php include('navigation.php'); ?>
    <div class="admin_parrent">
        <div class="toggle_btn">
            <div class="row ">
                <div class="catering_wrapper mt-5 mb-2 col-md-8 p-0">
                    <div class="catering_menu buttons">
                        <a id="1" class="showSingle _active" target="1" data="">All Users</a>
                        <a id="2" class="showSingle" target="2" data="personal">Personal Profile</a>
                        <a id="2" class="showSingle" target="2" data="Company">All Companies</a>
                    </div>
                </div>
            </div>
        </div>
        <section id="div1" class="targetDiv activediv tablediv">
            <table id="allusers" class="table table-striped orders_table" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr #</th>
                        <th>Name</th>
                        <th>Type</th>                     
                        <th>Email Address</th>
                        <th>Orders</th>
                       
                    </tr>
                </thead>
                <tbody>    
                    <?php
                    $i = 0;
    
                    $members = get_users(
                        array(    
                            'role' => 'Company',                  
                            'orderby' => 'ID',
                            'order'   => 'ASC',
                            'query_id' => 'authors_with_posts',
                        
                        )
                    );
                    $users = get_users($members);               
    
                    foreach ($users as $user) {
                         $user_roles = $user->roles;    
                         $comapnay_name = get_user_meta($user->ID, 'compnay_name', true);                       
                        $i++; 
                        $user_orders = count_user_posts($user->ID ,"orders");

                        if(count_user_posts($user->ID,'orders') >= 1)
                        {
                        
                        ?>
                        <tr>
                            <td class="pt-4"><?php echo $i ?></td>
                            <td class="d-flex align-items-center"><img class="_user_profile" src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" alt="profile" />
                            <?php echo $user->display_name ;   ?></td>
                            <td><?php echo ucfirst($user_roles[0]); if($comapnay_name != '') { echo " [". $comapnay_name ." ]" ;} ?></td>
                             <td><?php echo $user->user_email ?></td>
                             <th><button  class="btn_primary show_user_orders"  data-id="<?php echo $user->ID ?>" data-type="<?php echo $user_roles[0]; ?>"   >View Orders [<?php echo $user_orders ?>]</button></th>
                          
    
                        </tr>
                    <?php  }  } ?>
    
                </tbody>
    
            </table>
    
        </section>
        
    </div>
    
    
    
    <section class="hideme alertmessage">
        <div class="popup">
            <div class="popup_wrapper">
                <div class="order_confirm d-flex position-relative justify-content-center flex-column align-items-center p-4">
                    <img src="<?php bloginfo('template_directory'); ?>/reources/images/logo.png" class="logo" alt="logo">
                    <div class="step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
                        <div class="content mt-5">
                            <div class="right"><img src="<?php bloginfo('template_directory'); ?>/reources/images/img 3.png" alt=""></div>
                            <h1 class="finished">Finished!</h1>
                            <h2 class="mb-5 mt-5"><div class="res">Load Ajax Data</div></h2>

                        </div>
                    </div>

                </div>
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </div>
    </section>


    
    <section class="hideme  overlay invoice_detail_popup">                                               
            <div class="popup">
                <div class="popup_wrapper">
                    <h3 class="ad_productss">Compnay Orders Details</h3>                 
                        <div class="w-100 ajax_invoice"> </div>  
                        <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross ">
                </div>                
    </section>


    
    
    <?php get_footer('admin') ?>

    

<script type="text/javascript">

   

    jQuery(document).ready(function($) {        
    
   

        $('#show_shipping').click(function() {
            $(".shipping_popup").css("display", "block");
        });
      

        $('.hidepop').click(function(){  
                
           $(".invoice_detail_popup").css("display", "none");         
       });

        $('._cross').click(function(){ 
          
           $(".hideme").css("display", "none");         
       });


       $('.show_user_orders').click(function() {
                $(".invoice_detail_popup").css("display", "block");
                var user_type = $(this).attr('data-type');
                var uid = $(this).attr('data-id');

           
                $.ajax({
                    type: "POST",
                    url: "<?php echo admin_url('admin-ajax.php'); ?>",
                    data: {
                        action: "get_orders_by_user",
                        user_type: user_type,
                        uid: uid
                    },
                    success: function(data) {

                        if (data.code == 0) {

                        // alert(data.message);
                        } else {
                            $(".ajax_invoice").html(data);   

                        }
                    }

                });
            }); 
    

       




    });


  
</script>