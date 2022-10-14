<?php

// Meeting Ajax


add_action('wp_ajax_addfood', 'addfood', 0);
add_action('wp_ajax_nopriv_addfood', 'addfood');

function addfood()
{
	global $wpdb;	
	$food_name = $_POST['food_name'];
	$lunch_type = $_POST['lunch_type'];
	$lunch_sub_type = $_POST['lunch_sub_type'];
	$food_price = $_POST['food_price'];
    $uid = $_POST['uid'];
	$food_date = $_POST['food_date'];

	
	$file_name = $_FILES["file"]["name"];
	$file_url        = $_FILES["file"]["tmp_name"]; 

	$post = array(
		'post_title'    => $food_name,
		'post_status'   => 'publish',
		'post_type'     => 'menu_items',
		'post_author' => $uid,
        'meta_input'   => array(
		'menu_item_price' => $food_price,
		'date' => $food_date,

		),
		'tax_input'    => array(
			'menu_types' => array($lunch_type),
			'allergies' => array($lunch_sub_type)
		),
	);
	$post_id = wp_insert_post($post);

	    $image_url        = $file_url; // Define the image URL here
		$image_name       = $file_name;
		$upload_dir       = wp_upload_dir(); // Set upload folder
		$image_data       = file_get_contents($image_url); // Get image data
		$unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); // Generate unique name
		$filename         = basename( $unique_file_name ); // Create image file name
		
		// Check folder permission and define file location
		if( wp_mkdir_p( $upload_dir['path'] ) ) {
			$file = $upload_dir['path'] . '/' . $filename;
		} else {
			$file = $upload_dir['basedir'] . '/' . $filename;
		}
		// Create the image  file on the server
		file_put_contents( $file, $image_data );
			// Check image file type
		$wp_filetype = wp_check_filetype( $filename, null );
		
		// Set attachment data
		$attachment = array(
			'post_mime_type' => $wp_filetype['type'],
			'post_title'     => sanitize_file_name( $filename ),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);


		if (!is_wp_error($post_id)) {
			
			
			// Create the attachment
		  $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
		  
		  // Include image.php
		  require_once(ABSPATH . 'wp-admin/includes/image.php');
		  
		  // Define attachment metadata
		  $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
		  
		  // Assign metadata to attachment
		  wp_update_attachment_metadata( $attach_id, $attach_data );
		  
		  // And finally assign featured image to post
		  set_post_thumbnail( $post_id, $attach_id );

		  echo wp_send_json(array('code' => 200, 'message' => __('Food Created Sucessfully')));
		  
			  } else {	    	
				echo wp_send_json(array('code' => 0, 'message' => __('Error Occured please fill up form carefully.')));  
			}	

	die;
}
		
add_action('wp_ajax_get_orders_by_user', 'get_orders_by_user', 0);
add_action('wp_ajax_nopriv_get_orders_by_user', 'get_orders_by_user');

	function get_orders_by_user()
	{
							global $wpdb;
							$weeks = get_weeks('01-09-2022');	
							$user_type = $_POST['user_type'];				
							$uid = $_POST['uid'];	
							$user_info = get_userdata( $uid);
							

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

						    $total_emp =   count($available_active_employee);
							$order_total =  get_post_meta( $orderid, 'order_total', true );
							$company_days =  get_user_meta($uid ,'Company_days',true);   						   
							$order_week  =   get_post_meta( $orderid, 'order_week', true );	
							$lunch_benefit =  get_user_meta($uid ,'lunch_benefit',true);
							$lunch_benfit_type =  get_user_meta($uid ,'lunch_benfit_type',true);                                               
							$fixed_total = $order_total-$lunch_benefit;
							$order_total_price =  $order_total * $company_days  * $total_emp ;

							$method =  get_user_meta($uid, 'compnay_shipping_method', true );
							$shipping_cost = get_option('shipping_price');
							$vat_cost = get_option('vat_price');

							if($method == 'method_one')
								{  $shipping_cost = get_option('shipping_price'); }
							elseif($method == 'method_two')
							{ $shipping_cost = get_option('shipping_price'); }
							else {
								{ $shipping_cost = 0; }
							}




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
										),
										array(
											'key'     => 'order_week',
											'value' => $weeks,
											'compare' => 'IN'
										)
								)    
							);   
							
							
							$order_price_arr = array();
							$order_type_arr = array();
							$query = new WP_Query( $args );
							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) {   $query->the_post();															
									$order_total = get_post_meta( get_the_ID(), 'order_total', true );
									$order_type = get_post_meta( get_the_ID(), 'order_type', true );
									$order_price_arr[] = $order_total;
									$order_type_arr[] = $order_type;
									}  									
								}  														
								$total_order_price = array_sum($order_price_arr);
								$total_company_lunch = count($order_price_arr);            
								$total_order_type = array_count_values($order_type_arr);       
								$meeting_orders =  $total_order_type['Meeting'];
								$weekly_orders =  $total_order_type['Weekly'];
								$daily_orders = $total_order_type['Day'];   

								
								
								

														


							
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
												<td scope="row"><strong>Company : </strong><?php echo $compnay_name ?></td>
												<td scope="row"><strong>Email: </strong><?php echo $user_info->user_login ?></td>                        
											</tr>
											<tr>
												<td scope="row"><strong>Total Compnay Lunch: </strong><?php echo $daily_orders ?></td>
												<td scope="row"><strong>Total Lunch Fixed: </strong> <?php echo $weekly_orders?></td>                        
											</tr>
											<tr>									
												<td scope="row"><strong>Total Meeting Food: </strong><?php echo $meeting_orders; ?></td>
												<td scope="row"><strong>Total Employee: </strong><?php echo $total_emp; ?></td>                       
											</tr>
											<tr>									
												<td scope="row"><strong>Shipping Method: </strong></td>
												<td scope="row">
													<?php  if($method == 'method_one')
															{ echo "Method 1"; echo " [Company Pay ". get_option('shipping_price') . "]";  }
															elseif($method == 'method_two')
															{ echo "Method 2"; echo " [Divided on all Employees]";  }
															else {
																{ echo "Method 3"; echo " [Pickup]";  }
															}?>
												</td>                       
										</tr>
										</tbody>
									</table>
								<h5 class="mt-4">Summary for 01-09-2022 to 30-09-2022 </h5>
								<table class="invoice_slip_table">
									<thead>
										<th scope="col">Description</th>
										<th scope="col">Products</th>
										<th scope="col">Price</th>
									</thead>
									<tbody>
										<?php   
										
											$shipping_days_arr = array();
											$total_price_arr = array();
											$order_price_arr = array();
											$query = new WP_Query( $args );
											if ( $query->have_posts() ) {
												while ( $query->have_posts() ) {   $query->the_post();															
													$order_total = get_post_meta( get_the_ID(), 'order_total', true );
													$order_type = get_post_meta( get_the_ID(), 'order_type', true );
													$weekid = get_post_meta( get_the_ID(), 'order_week', true );                                            
													$order_price_arr[] = $order_total;

												?> 
														<tr>
																<td scope="row"><strong><?php the_title() ?> <br/> <?php echo $order_type?><br/> [ <?php echo $weekid?>]</td>
																	<td> 
																		<table>
																			<?php   $food_items =  get_post_meta( get_the_ID(), 'food_order', true );						
																					foreach($food_items as $index => $food) { 
																						
																						$food_days =  count($food_items);
																						$shipping_days_arr[] = $food_days;
																						
																						?>
																															<tr>
																																	<td scope="row"><strong><?php echo $index ?></td>
																																	<td>
																																	<?php   foreach($food as $key => $ky_item) { 	?>
																																			<p>  <?php echo  get_the_title($key) . " [". $ky_item . "] " ; ?> </p>                                                                                                                        
																																		<?php 	}  ?>
																																		</td>
																																		<td>
																																			<?php   foreach($food as $key => $ky_item) { 
																																				?>
																																					<p> NOK <?php $price = get_post_meta( $key, 'menu_item_price', true ); 
																																					echo $price*$ky_item;    ?> </p>                                                                                                                                          
																																																																
																																				<?php 	}  ?>
																																		</td>

																																	
																																	
																															</tr>
																														

																							<?php }  ?>

																							<tr>
																																	<td scope="row"><strong>Total</td>
																																	<td>Days : <?php echo $food_days ?>  </td>
																																	
																																		<td colspan="2">
																																	<?php echo $order_total ?>
																																		</td>

																																	
																																	
																															</tr>

																		</table>

																	</td>
																	<td><?php   $total_price_f =  $order_total * $food_days; 
																	echo $total_price_f;
																	
																	$total_price_arr[] = $total_price_f;
																	?>
																</td>																
														</tr>

										<?php   }   }  

												$shipping_days =  count($shipping_days_arr);
												$total_order_price = array_sum($order_price_arr);
												$final_order_price = array_sum($total_price_arr);


												$final_shipping = $shipping_days*$shipping_cost;
												$vat_final = $final_order_price*$vat_cost/100;
												$ship_vat_total = $final_shipping+$vat_final;
												$invoice_price = $ship_vat_total+$final_order_price;

												$invoice_price_with_emp = $invoice_price*$total_emp;
												
												
												?>  

										<tr>										
											<td scope="row"><strong>Shipping & VAT : </strong> </td>
											<td><strong>Shipping: </strong><?php echo $final_shipping; ?> <strong>VAT:<strong> <?php echo $vat_final ?> </td>
											<td><strong></strong>NOK <?php echo $ship_vat_total; ?> </td>
											
										</tr>
										<tr>
											<td scope="row"><strong>Total Grand : </strong></td>
											<td></td>                            
											<td scope="row"> NOK <?php echo  $invoice_price_with_emp ?></td>
										
										</tr>
									<tbody>
               					 </table>
							</div>
							
							
                      
                     

				 
						   
	

					<?php	die;
	}



	







