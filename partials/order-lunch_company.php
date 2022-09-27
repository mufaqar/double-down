
    <div class="custom_container catering_wrapper mt-5 mb-5">
                         <div class="calender_wrapper d-flex justify-content-between align-items-center mt-5">
                                <div class="catering_heading d-flex align-items-center">
                                    <h2>Lunch  Orders</h2>                                
                                </div>                       
                        </div>
                        <div class="catering_card_wrapper">
                            <div class="invoice_table">
                                <table class="_table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Order Type</th>
                                        <th scope="col">Week Id</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Emplyees</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                
                                        <?php 
                                            global $current_user;
                                            wp_get_current_user();
                                           $uid =  $current_user->ID;
                                            query_posts(array(
                                                    'post_type' => 'orders',
                                                    'posts_per_page' => -1,
                                                    'order' => 'desc',                                               
                                                    'meta_query' => array(                                                      
                                                        
                                                        'relation' => 'AND',
                                                            array(
                                                                'key'   => 'order_type',
                                                                'value' => 'Meeting',
                                                                'compare' => '!='
                                                            ),
                                                            array(
                                                                'key'     => 'user_type',
                                                                'value' => 'Company',
                                                                'compare' => '=',
                                                            ),
                                                            array(
                                                                'key'     => 'order_uid',
                                                                'value' => $current_user->ID,
                                                                'compare' => '='
                                                            )
                                                    )
                                                    
                                                ));              
                                        
                                                if (have_posts()) :  while (have_posts()) : the_post(); 

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

                                                //print_r($available_active_employee);
                        
                                                
                                                
                                                
                                                
                                                ?>
                                                               
                                                                <tr>
                                                                        <td scope="row"><?php the_title()?></td>
                                                                        <td><?php  the_time('M j, Y') ?></td>
                                                                        <td><?php echo get_post_meta( get_the_ID(), 'order_type', true ); ?></td>
                                                                        <td><?php echo get_post_meta( get_the_ID(), 'order_week', true ); ?></td>
                                                                        <td>NOK <?php echo get_post_meta( get_the_ID(), 'order_total', true ); ?></td>
                                                                        <td><?php echo get_post_meta( get_the_ID(), 'user_type', true ); ?></td>
                                                                        <td><?php echo get_post_meta( get_the_ID(), 'order_status', true ); ?> <i class="fa-solid fa-down-to-line"></i></td>
                                                                        </tr>
                                            <?php endwhile; wp_reset_query(); else : ?>
                                                    <h2><?php _e('Nothing Found','lbt_translate'); ?></h2>
                                                <?php endif; ?>  
                                        
                                        
                                    </tbody>
                                </table>
                            </div>                

                        </div>
                
   </div>

                        

