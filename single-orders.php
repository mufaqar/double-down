<?php get_header(); ?>
<?php include get_theme_file_path('/compnay/navigation.php'); ?> 

<div class='blogs_wrapper mt-4'>
            <div class='blogs'>
            
                <div class="row">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<?php 

print "<pre>";



$orders_price = get_post_meta(get_the_ID(), 'food_order' , true);

print_r($orders_price);
$price_arr = [];

foreach($orders_price['2022-09-12'] as $index => $order_price)
{

   
   $price =  get_post_meta($index, 'menu_item_price', true);
   $price_arr[] = $price;
   
}

echo array_sum($price_arr);







?>

<?php endwhile; endif; ?>

</div>
            </div>
        </div>
        
    </main>


<?php //get_sidebar('blog'); ?>
<?php get_footer(); ?>