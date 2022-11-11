<?php /* Template Name: New */

//get_header('landing');






$week_start = date('Y-m-d', strtotime("-14 days"));
$wdate = $week_start;
$week_date = new DateTime($wdate);
$week = $week_date->format("W");
$month = $week_date->format("m");
$year = $week_date->format("y");



$order_week = $week."-".$month."-".$year;   

echo $order_week;

$order_args = array(
	'numberposts' => -1,
	'post_type'   => 'orders',
	'meta_query' => array(   
		'relation' => 'AND',                                                            
			array(
				'key'      => 'user_type',
				'value'    => 'Personal',
				'compare'  => '='
			),
			
			array(
				'key'     => 'order_week',
				'value' => $order_week,
				'compare' => 'IN'
			)
	)   
);      
$latest_orders = get_posts( $order_args );    
$author_arr = array();    
foreach($latest_orders as $order)
{
	$pid =  $order->ID;    
	$order_uid =  get_post_meta( $pid, 'order_uid', true );
	$author_arr[]  = $order_uid;
}
$authorlist = array_unique($author_arr);

foreach($authorlist as $author){   

	//echo $author;
	//get_invoice_pay_direct($week,$year,$author);
}


/*
						
					include(get_template_directory() . '/stripe/init.php');	
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
							 'amount' => intval(4953.6),
							 'currency' => 'NOK',      
							'payment_method_types' => array('card'),
							'payment_method' => $method->id,
							'customer' => 'cus_MlTVknOyPYZluK',
							'description' => "Order Week : ".$inovice_week." Order Year :".$inovice_year
							
							
							)
					  );
					  $confirm_payment = $stripe->paymentIntents->confirm(
						$customer_added->id,
						['payment_method' => 'pm_card_visa']
					  );						  
					
					  $status = $confirm_payment->status;


					add_post_meta($invoice_id, 'invoice_status',$status, true);

					print_r($confirm_payment);


						
