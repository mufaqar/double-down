<?php /* Template Name: Admin-Users  */ 



get_header('admin');


?>  
    <?php include('navigation.php'); ?>
        <div class="custom_container c2 ">
            <div class="row ">
                <div class="catering_wrapper mt-5 mb-2 col-md-8">
                    <div class="catering_menu buttons">
                        <a id="1" class="showSingle _active" target="1">All Users</a>
                        <a id="2" class="showSingle" target="2">All Companites</a>
                    </div>
                </div>
            </div>
        </div>
        <section id="div1" class="targetDiv activediv tablediv">
            <table id="all" class="table table-striped orders_table" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>                     
                        <th>Compnay</th>
                        <th>Phone Number</th>
                        <th>Email Address</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                $i = 0;
                    
                $members = get_users(
                    array(
                        //'role'    => 'company',
                        'orderby' => 'ID',
                        'order'   => 'ASC'
                    )
                );    
                $users = get_users( $members );   
              //  print "<pre>";
              //  print_r($users); 
                
             
                
                foreach ( $users as $user ) { $i++;  ?>
                            <tr>                            
                                <td><?php echo $i ?></td>  
                                <td><?php echo $user->display_name ?></td>
                                <td><?php echo get_user_meta($user->ID , 'compnay_name' , true);?></td>
                                <td><?php echo get_user_meta($user->ID , 'profile_delivery_phone' , true);?></td>                             
                                <td><?php echo $user->user_email ?></td>
                    
                            </tr>
                        <?php } ?>  

                    </tbody>

                </table>
                
            </section>



</div>
</div>
</div>
</div>

</main>

<?php get_footer('admin') ?>




