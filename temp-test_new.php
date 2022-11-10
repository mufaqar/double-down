<?php /* Template Name: New */

//get_header('landing');



get_invoice_pay_direct(42 , 2022 ,46);
get_invoice_pay_direct(43 , 2022 ,46);
get_invoice_pay_direct(44 , 2022 ,46);



function get_invoice_pay_direct($week , $year , $uid)
	{
							global $wpdb;	

							
							// $week = $_POST['week'];	
							// $year = $_POST['year'];	
							$inovice_week	= $week;	
							$inovice_year	= $year;
							$order_days = get_dates_of_week($inovice_week,$inovice_year);						
							$shipping_price = 90;
							$uid = $uid;
							$user_info = get_userdata( $uid);
							$order_week = 45;
							$args = array(
								'post_type' => 'orders',
								'posts_per_page' => -1,
								'order' => 'asc',							
								'meta_query' => array(   
									'relation' => 'AND',                                                            
										array(
											'key'      => 'user_type',
											'value'    => 'Personal',
											'compare'  => '='
										),
										array(
											'key'     => 'order_uid',
											'value'   =>  1,
											'compare' => '='
										),
										array(
											'key'     => 'order_day',			
											'value' => $order_days,
											'compare' => 'IN'
										)
								)    
							);  

							?>

				
						            
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
										<td scope="row"><strong>Name: </strong><?php echo $user_info->display_name; ?></td>
										<td scope="row"><strong>Week: </strong><?php echo $inovice_week ?></td>										
									</tr>
									<tr>
										<td scope="row"><strong>Email: </strong><?php echo $user_info->user_login ?></td>
										<td scope="row"><strong>Shipping: </strong>NOK <?php echo $shipping_price?></td>
									</tr>
									
									</tbody>
								</table>
								
								<h5 class="mt-4">Summary</h5>
								<table class="invoice_slip_table">
									<thead>
									<th scope="col">Description</th>
									
									<th scope="col">Products</th>
									<th scope="col">VAT</th>
									<th scope="col">Price</th>
									</thead>
									<tbody>
									<?php 
									
										$shipping_days_arr = array();
                                        $food_item_day_arry = array();
                                        $food_total_vat_arr = array();
                                        $food_price_day_total_arr = array();	
                                        $loop = new WP_Query($args); while ( $loop->have_posts() ) : $loop->the_post();  global $post;                                             
                                                $order_day = get_post_meta( get_the_ID(), 'order_day', true );
                                                $order_type = get_post_meta( get_the_ID(), 'order_type', true );  
												$food_items =  get_post_meta( get_the_ID(), 'food_order', true );						
												foreach($food_items as $index => $food) {												
													$shipping_days_arr[] = $order_day;
													?>
														<tr>
														<td scope="row"><strong><?php echo $order_day ?> <br/><?php echo $order_type ?> </td>
																<td>
																<?php   
																
																$food_item_arr = array();
																$food_item_vat_arr = array();
																$food_item_price_arr = array();
																foreach($food as $key => $ky_item) { 
																		$menu_item_price =  get_post_meta( $key, 'menu_item_price', true );
																		$food_item_price_arr[] = $menu_item_price*$ky_item;
																		
																	?>	<p>  <?php echo  get_the_title($key) . " [". $ky_item . "] " ; ?> 
																		 NOK <?php echo $menu_item_price ?> </p>																	
																
																	<?php 	}  ?>
																	</td>
																	<td>
																		<?php foreach($food as $key => $ky_item) { 
																			$menu_item_price =  get_post_meta( $key, 'menu_item_price', true );
																			$item_vat =  $menu_item_price*15/100;	
																			$menu_item_price_vat = ($item_vat)*$ky_item;
																			$food_total_vat_arr[] =  $menu_item_price_vat;
																			$food_item_day_price =  array_sum($food_item_price_arr);																			
																			?>
																
																			<p>NOK <?php echo $menu_item_price_vat?> </p>
																
																	<?php 	}  ?>
																	</td>

																	<td>																
																		<p>NOK <?php 
																		
																		$food_price_day_total_arr[] = $food_item_day_price;
																		echo $food_item_day_price;?> </p>	
																	</td>
																
														</tr>

												<?php }  endwhile; 

											

													$shipping_days =  count($shipping_days_arr);
													$tatal_vat = array_sum($food_total_vat_arr);
													$shipping_cost =  $shipping_days* $shipping_price;
													$days_order_price =  array_sum($food_item_day_arry); 													
													$total_menus_days_price =  array_sum($food_price_day_total_arr); 

													$shipping_vat  = $shipping_cost*25/100; 
													$total_shipping  = $shipping_vat+$shipping_cost;
													$total_shipping_vat  = $shipping_vat+$shipping_cost+$tatal_vat;
													$grand_total =  $total_shipping_vat+$total_menus_days_price; 
												 
												 ?>
												<tr>
												<td scope="row"><strong>Item Total</td>
												<td scope="row"><strong></td>
												<td scope="row"><strong>NOK <?php echo $tatal_vat ?></td>
												<td scope="row"><strong>NOK <?php echo $total_menus_days_price ?></td>
												</tr>
												<tr>
												<td scope="row"><strong>Shipping</td>
												<td scope="row"><strong>Delivery Days [<?php echo $shipping_days ?>] </td>												
												
												<td scope="row">NOK <?php echo $shipping_vat?></td>
												<td scope="row"><strong>NOK <?php echo $shipping_cost ?></td>
												</tr>											
												
												<td scope="row"><strong>Grand Total</td>
												<td scope="row"><strong></td>
												<td scope="row"><strong>NOK <?php echo $total_shipping_vat?></td>
												<td scope="row"><strong>NOK <?php echo $grand_total ?></td>
												</tr>

										
									<tbody>
								</table>
							</div>
							
                      
                     

				 
						   
	

					<?php

						
																

						// check if order already placed by week
						$query_meta = array(
							'posts_per_page' => -1,
							'post_type' => 'invoice',
							'meta_query' => array(
								'relation' => 'AND',
								
								array(
									'key' => 'inovice_week',
									'value' => $inovice_week,
									'compare' => '='
								),
								array(
									'key' => 'inovice_year',
									'value' => $inovice_year,
									'compare' => '='
								),
								array(
									'key'     => 'user_type',
									'value' => 'Personal',
									'compare' => '='
								),
								array(
									'key'     => 'invoice_uid',
									'value' => $uid,
									'compare' => '='
								),
							)
						);	

						$postinweek = new WP_Query($query_meta);
						if ( $postinweek->have_posts() ): while ( $postinweek->have_posts() ): $postinweek->the_post();

						


					endwhile; wp_reset_query(); else : 

						$user_type = 'Personal';
						$post = array(
							'post_title'    => "INVP-" . $inovice_week."-".$inovice_year,
							'post_status'   => 'publish',
							'post_type'     => 'invoice',
							'post_author' => $uid
						);
						$invoice_id = wp_insert_post($post);	
						add_post_meta($invoice_id, 'total_price', $grand_total, true);
						add_post_meta($invoice_id, 'invoice_days', $order_days, true);
						add_post_meta($invoice_id, 'order_status', 'Pending', true);
						add_post_meta($invoice_id, 'user_type', $user_type, true);
						add_post_meta($invoice_id, 'inovice_week', $inovice_week, true);
						add_post_meta($invoice_id, 'inovice_year',$inovice_year, true);
						add_post_meta($invoice_id, 'invoice_uid',$uid, true);



						include( get_template_directory() . '/stripe/init.php' );
	
						$stripe = new \Stripe\StripeClient('sk_test_51LzR9tB7gTQeC9cUuSk9M2d6UmOcDzbgZZLwW8zwQUSF4on9CIENpzRo1RtXjEWByNVj1sWxvotQbjP48LHYqXCc00HeF10taV');
						$method =  $stripe->paymentMethods->create([
							'type' => 'card',
							'card' => [
							  'number' => '4242424242424242',
							  'exp_month' => 11,
							  'exp_year' => 2023,
							  'cvc' => '314',
							],
						  ]);

												
						$customer_added = $stripe->paymentIntents->create(
							array(
								'amount' => $grand_total,
								'currency' => 'NOK',      
								'payment_method_types' => array('card'),
								'payment_method' => $method->id,
								'customer' => 'cus_MlTVknOyPYZluK',
								'description' => "INVP-" . $inovice_week."-".$inovice_year,
								
								
								)
						);
						
						$confirm_payment = $stripe->paymentIntents->confirm(
							$customer_added->id,
							['payment_method' => 'pm_card_visa']
						);
  




						


					endif;
					
					
					
					
					
					
					
					
					
					
					
					
				
	}
