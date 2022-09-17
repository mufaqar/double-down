<?php 

global $current_user;
wp_get_current_user();
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
                    'value' => 'Personal',
                    'compare' => '=',
                ),
                array(
                    'key'     => 'order_uid',
                    'value' => $current_user->ID,
                    'compare' => '='
                )
        )
        
    )); 

    ?>

<div class="popup_wrapper">
                <h3 class="ad_productss">Invoice Detail</h3>                
                <div class="invoice_table">
                  <table class="invoice_slip_table">
                    <thead>
                      <tr>
                        <th scope="col">Cloud</th>
                        <th scope="col">Distribution</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="row"><strong>Name: </strong>Jose Olsen Barros</td>
                        <td scope="row"><strong>Lunch: </strong>NOK 459.2</td>
                        
                      </tr>
                      <tr>
                        <td scope="row"><strong>Name: </strong>admin@oranchy.com</td>
                        <td scope="row"><strong>Shipping: </strong>NOK 0</td>
                      </tr>
                    </tbody>
                  </table>

                  <h5 class="mt-4">Summary</h5>
                  <table class="invoice_slip_table">
                    <thead>
                      <tr>
                        <th scope="col">Description</th>
                        <th scope="col">Number</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <tr>
                        <td scope="row"><strong>Salad</td>
                        <td scope="row">2 <sub>stk</sub></td>
                      </tr>
                      <tr>
                        <td scope="row"><strong>Vegan</td>
                        <td scope="row">2 <sub>stk</sub></td>
                      </tr>
                      <tr>
                        <td scope="row"><strong>extraBread</td>
                        <td scope="row">2 <sub>stk</sub></td>
                      </tr>
                      <tr>
                        <td scope="row"><strong>Drink</td>
                        <td scope="row">2 <sub>stk</sub></td>
                      </tr>
                      <tr>
                        <td scope="row"><strong>Smoothie</td>
                        <td scope="row">2 <sub>stk</sub></td>
                      </tr>
                      <tr>
                        <td scope="row"><strong>greek_yoghurt_raspberry</td>
                        <td scope="row">2 <sub>stk</sub></td>
                      </tr>

                    </tbody>
                  </table>

                  <!-- <h5 class="mt-4">Invoice Lines</h5>
                  <table class="invoice_slip_table">
                    <thead>
                      <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Description</th>
                        <th scope="col">Total</th>
                        <th scope="col">Shipping</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="row">Monday, May 23, 2022</td>
                        <td scope="row">Salad x 1</td>
                        <td scope="row">kr 72.8,-	</td>
                        <td scope="row">kr 0,-</td>
                        <td scope="row">Complete</td>
                      </tr>
                      <tr>
                        <td scope="row">Tuesday, May 24, 2022</td>
                        <td scope="row">Salad x 1</td>
                        <td scope="row">kr 72.8,-	</td>
                        <td scope="row">kr 0,-</td>
                        <td scope="row">Pending</td>
                      </tr>
                      <tr>
                        <td scope="row">Tuesday, May 24, 2022</td>
                        <td scope="row">Salad x 1</td>
                        <td scope="row">kr 72.8,-	</td>
                        <td scope="row">kr 0,-</td>
                        <td scope="row">Pending</td>
                      </tr>
                     
                    </tbody>
                  </table> -->

                  <div class="mt-4 d-flex justify-content-end">
                    <p>* All prices incl. 15% VAT</p>
                  </div>

                </div>

                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>