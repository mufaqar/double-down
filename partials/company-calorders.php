<?php 

global $current_user; wp_get_current_user();  $uid = $current_user->ID;

?>

<div class="accordion_wrapper">
                                        <div class="row">
                                            <div class="col-lg-12 mx-auto mb-5">                                           
                                              <?php                                        

                                                    $current_week =  date("W"); 
                                                    $current_year =  date("Y");
                                                                                                
                                                    $query_meta = array(
                                                            'post_type' => 'orders',
                                                            'posts_per_page' => -1,
                                                            'order' => 'desc',                                                         
                                                            'meta_query' => array(                                                      
                                                                   'relation' => 'AND',
                                                                    array(
                                                                        'key'   => 'order_type',
                                                                        'value' => 'Day',
                                                                        'compare' => '='
                                                                    ),
                                                                    array(
                                                                        'key'     => 'user_type',
                                                                        'value' => 'Company',
                                                                        'compare' => '=',   
                                                                    ),
                                                                    array(
                                                                        'key'     => 'order_week',
                                                                        'value' => $current_week,
                                                                        'compare' => '='
                                                                    ),
                                                                    array(
                                                                        'key'     => 'order_uid',
                                                                        'value' => $current_user->ID,
                                                                        'compare' => '='
                                                                    )
                                                                    ),
                                                            
                                                        ); 

                                                    //    print_r($query_meta);
                                                    $postinweek = new WP_Query($query_meta);
                                                    if ( $postinweek->have_posts() ): while ( $postinweek->have_posts() ): $postinweek->the_post();
                                                      $pid =  get_the_ID();                                                    
                                                    $food_orderd_data = get_post_meta( $pid, 'food_order' , true);                                                     
                                                    uksort($food_orderd_data, "weekdaySort");
                                                    foreach($food_orderd_data as $key => $order_data ) 
                                                      {   ?>

                                                        
                                                            <div class="_pro_card">
                                                                <h3><?php  echo date('l', strtotime($key));  ?>  <span><?php echo $key?> </span></h3>
                                                                <p> <?php   foreach($order_data as $product_id => $product_qty)
                                                                            { 
                                                                                
                                                                              
                                                                                
                                                                                //echo $product_id . " : " . $product_qty . "<br/>";

                                                                            echo  "Product  : " .get_the_title( $product_id) . "  <span>(" .$product_qty .") </span><br/>";
                                                                        
                                                                            } 

                                                                          
                                                                            
                                                                            
                                                                            
                                                                            
                                                                            ?>
                                                                </p>
                                                            </div>

                                                        <?php   } endwhile; wp_reset_query(); else : ?>

                                                            <div class="_pro_card">
                                                                <h3>No lunch menu for this week</h3>
                                                                <p> Please choose your menu </p>
                                                            </div>
                                                  
                                                <?php endif; ?> 
                                            </div>
                                        </div>
                                    </div>