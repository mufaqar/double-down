<?php get_header(); ?>
<?php include get_theme_file_path('/compnay/navigation.php'); ?> 

<div class='blogs_wrapper mt-4'>
            <div class='blogs'>
            
                <div class="row">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<?php 



$food_orders = get_post_meta(get_the_ID(), 'food_order' , true);

 print "<pre>";
print_r($food_orders);


 $a = array("Volvo"=>"XC90","BMW"=>"X5","Toyota"=>"Highlander");


if(array_key_exists('Monday', $food_orders))
{

    unset($food_orders['Monday']);
    $food_orders['Monday'] = $a;

    //array_push($myArray, $food_orders);


}


print "<pre>";
//print_r($food_orders);






	foreach($food_orders as $key => $forder)
	{

       // print "<pre>";
		//print_r($key);

        add_post_meta( get_the_ID(), 'foodorder'.$key, "This is my Value");


	}










?>

<?php endwhile; endif; ?>

</div>
            </div>
        </div>
        
    </main>


<?php //get_sidebar('blog'); ?>
<?php get_footer(); ?>