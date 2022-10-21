<?php /* Template Name: Test */
get_header('landing');


$order_days = get_dates_of_month('10',22);




$i = 0;


query_posts(array(
	'post_type' => 'orders',
	'posts_per_page' => -1,
	'order' => 'desc',
	'meta_query' => array(   
			array(
				'key'     => 'order_day',			
				'value' => $order_days,
				'compare' => 'IN'
			)
	)   
));

if (have_posts()) :  while (have_posts()) : the_post();

$pid = get_the_ID();
	$order_uid = get_post_meta(get_the_ID(), 'order_uid', true);
	$user_info = get_userdata($order_uid);                    
	$food_items =  get_post_meta( get_the_ID(), 'food_order', true );	
	$compnay_delivery_address =  get_user_meta( $order_uid, 'compnay_delivery_address', true );		                      

		$i++; ?>
		
		
			<h2><?php the_title() ?></h2>                                   
			
			
	<?php endwhile;
	wp_reset_query();
else : ?>
	<h2><?php _e('Nothing Found', 'lbt_translate'); ?></h2>
<?php endif; 

get_footer(); ?>


