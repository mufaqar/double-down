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
                             <th>    <button id="show_user_orders" class="btn_primary">View Orders [<?php echo $user_orders ?>]</button></th>
                          
    
                        </tr>
                    <?php  }  } ?>
    
                </tbody>
    
            </table>
    
        </section>
        
    </div>
    
    
    
    
    
    <?php get_footer('admin') ?>