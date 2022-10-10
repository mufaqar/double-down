    <?php /* Template Name: Admin-OrderHandling  */



    get_header('admin');


    ?>
        <?php include('navigation.php'); ?>
        <div class="admin_parrent">
            <div class="toggle_btn">
                <div class="row ">
                    <div class="catering_wrapper mt-5 mb-2  p-0 w-100">
                        <div class="catering_menu buttons">
                        <a id="1" class="showSingle _active" target="1" data="">All</a>
                        <a id="2" class="showSingle" target="2" data="Complete">Complete</a>
                        <a id="3" class="showSingle" target="3" data="Pending">Pending</a>
                        <a id="4" class="showSingle" target="4" data="Cancel">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            <section id="div1" class="targetDiv activediv tablediv">
                <table id="all" class="table table-striped orders_table" style="width:100%">
                <thead>
                        <tr>
                            <th>Sr #</th>
                            <th>Order ID</th>
                            <th>Company Name</th>
                            <th>Address</th>                          
                            <th>Price</th>
                           
                            <th>Status</th>
                            <th>PDF</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                        $i = 0;
                        query_posts(array(
                            'post_type' => 'orders',
                            'posts_per_page' => -1,
                            'order' => 'desc',
                        ));

                        if (have_posts()) :  while (have_posts()) : the_post();

                        $order_uid = get_post_meta(get_the_ID(), 'order_uid', true);
                        $user_info = get_userdata($order_uid);
                 
                        $food_items =  get_post_meta( get_the_ID(), 'food_order', true );	
                        $address =  get_user_meta( $order_uid, 'compnay_delivery_address', true );	
                        $company_name =  get_user_meta( $order_uid, 'compnay_name', true );	
                        
                       
                      
                                $i++; ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php the_title() ?></td>
                                    <td><?php echo $company_name ?></td>    
                                    <td><?php echo $address?></td>  
                                    
                                    
                                                         
                                    <td>NOK <?php echo get_post_meta(get_the_ID(), 'order_total', true); ?></td>
                                  
                                    <td><span class="status <?php echo get_post_meta(get_the_ID(), 'order_status', true); ?>"><?php echo get_post_meta(get_the_ID(), 'order_status', true); ?> </span> </td>
                                    <td> </td>   
                               
                                </tr>
                            <?php endwhile;
                            wp_reset_query();
                        else : ?>
                            <h2><?php _e('Nothing Found', 'lbt_translate'); ?></h2>
                        <?php endif; ?>

                    </tbody>

                </table>

            </section>

        </div>



   
<?php get_footer('admin') ?>