<?php /* Template Name: Test */
get_header();


        $orderid = 750;				
        $uid = 1;	
        $user_info = get_userdata( $uid);
        $args = array('p' => $orderid, 'post_type' => 'orders');

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

        // print_r($available_active_employee);
        $total_emp =   count($available_active_employee);
        $order_total =  get_post_meta( $orderid, 'order_total', true );
        $company_days =  get_user_meta($uid ,'Company_days',true);   						   
        $order_week  =   get_post_meta( $orderid, 'order_week', true );				   

        $lunch_benefit =  get_user_meta($uid ,'lunch_benefit',true);
        $lunch_benfit_type =  get_user_meta($uid ,'lunch_benfit_type',true);                                               
        $fixed_total = $order_total-$lunch_benefit;
        $order_total_price =  $order_total * $company_days  * $total_emp ;
        $fix_remaing =  $fixed_total * $company_days  * $total_emp ;
        if($lunch_benfit_type == '%')
        {
            $company_pay = $lunch_benefit /100 * $order_total_price;
        }
        else{
            $company_pay = $order_total_price - $fix_remaing;
        }
        $order_total = get_post_meta( $orderid, 'order_total', true ); 

        $compnay_name =  get_user_meta($uid ,'compnay_name',true);   



?>


<div class="content" style="margin-top:80px">
                <div class="container_wrapper">
              
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
										<td scope="row"><strong>Company Name: </strong><?php echo $compnay_name ?></td>
										<td scope="row"><strong>Email: </strong><?php echo $user_info->user_login ?></td>
										
									</tr>
									<tr>
										<td scope="row"><strong>Total Compnay Lunch: </strong><?php echo $user_info->user_login ?></td>
										<td scope="row"><strong>Total Meeting Food: </strong><?php echo $total_emp; ?></td>
									</tr>
									<tr>
										<td scope="row"><strong>Total Compnay Lunch: </strong><?php echo "123456"?></td>
										<td scope="row"><strong>Total Employee Lunch: </strong> <?php echo "123456"?></td>
									</tr>
									<tr>
										
										<td scope="row"><strong>Total Shipping: </strong>NOK <?php echo "123456" ?></td>
										<td scope="row"><strong>Total VAT : </strong>NOK <?php echo "123456" ?> </td>
									</tr>
									<tr>
									
										<td scope="row"><strong>Total Grand: </strong></td>
										<td scope="row"><?php echo $order_week; ?></td>
									
									</tr>
									</tbody>
								</table>
								<?php
                                
                                          $uid =  1;
                                              
                                                $args = array(
                                                        'post_type' => 'orders',
                                                        'posts_per_page' => -1,
                                                        'order' => 'desc',
                                                    
                                                        'meta_query' => array(   
                                                            'relation' => 'AND',                                                            
                                                                array(
                                                                    'key'      => 'user_type',
                                                                    'value'    => 'Company',
                                                                    'compare'  => '='
                                                                ),
                                                                array(
                                                                    'key'     => 'order_uid',
                                                                    'value'   =>  $uid,
                                                                    'compare' => '='
                                                                )
                                                        )    
                                                    );    
                                
                            
                                

                                  ?>




								    <h5 class="mt-4">Summary</h5>
                                    <table class="invoice_slip_table">
                                                <thead>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Number</th>
                                                    <th scope="col">Price</th>
                                                </thead>
                                                <tbody>
                                                    <?php                                        
                                                        $query = new WP_Query( $args );
                                                        if ( $query->have_posts() ) {
                                                            while ( $query->have_posts() ) {   $query->the_post(); ?> 
                                                                    <tr>
                                                                            <td scope="row"><strong><?php the_title() ?></td>
                                                                            <td> Products</td>
                                                                            <td>Price</td>																
                                                                        </tr>
                
                                                    <?php   }   }   ?>                                            
                                                <tbody>
                                    </table>
							</div>
							



                                                                </div>
                                                                </div>

                            <?php get_footer(); ?>


