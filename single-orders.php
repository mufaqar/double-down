<?php get_header(); ?>
<?php include get_theme_file_path('/compnay/navigation.php'); ?> 

<div class='blogs_wrapper mt-4'>
            <div class='blogs'>
            
                <div class="row">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<?php 

print "<pre>";



$orders_price = get_post_meta(get_the_ID(), 'food_order' , true);
$price_arr = [];
foreach($orders_price as $index => $order_price)
{
    foreach($order_price as $key => $price )
    {   
        $price =  get_post_meta($key, 'menu_item_price', true);
        $price_arr[] = $price;
        
    }    
   
}

print_r($price_arr);

//echo array_sum($price_arr);







?>

<?php endwhile; endif; ?>

</div>
            </div>
        </div>
        
    </main>


<?php //get_sidebar('blog'); ?>
<?php get_footer(); ?>