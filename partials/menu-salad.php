<?php
$no_week =  date("Y-W");
$query_week = $_REQUEST['week'];
if($query_week == '') {
    $query_week = $no_week;
}

$week_arr = explode("-", $query_week, 2);
$week=$week_arr[1];
$year=$week_arr[0];
?>
                 

         <div class="catering_card_wrapper">
            <div class="foodlist"></div>
            <div class="oldfoodlist">
                <?php 
                        $dates = getStartAndEndDate($week,$year);
                        $FirstDay = $dates['start_date'] ;
                        $LastDay =  $dates['end_date'];       
                
                        query_posts(array(
                            'post_type' => 'menu_items',
                            'posts_per_page' => -1,
                            'order' => 'desc', 
                            'menus_type' => 'salad-lunch'   ,                                                                                                   
                            'meta_query' => array(
                                array(
                                    'key' => 'date',
                                    'value' => array($FirstDay, $LastDay ),              
                                    'compare' => 'BETWEEN',
                                    'type' => 'DATE'
                                ),
                            )
                        ) ); 

            
                if (have_posts()) :  while (have_posts()) : the_post();
                $date = get_field('date'); ?>
                        <div class="catering_card _pro_salat">
                            <h3><?php the_title() ?> ( <?php $timestamp = strtotime($date); echo  date('D', $timestamp);  ?> | <span><?php echo $date ?> ) </h3>
                            <p class="mt-3"><?php the_content() ?></p>
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="mt-2">Contains:</h6>
                                    <p><?php echo get_post_meta(get_the_ID(), 'contains', true); ?></p>
                                    <p>Nutritional content: <?php echo get_post_meta(get_the_ID(), 'nutritional_content', true); ?></p>
                                </div>                        
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_query();
                else : ?>
                    <h2><?php _e('Nothing Found', 'lbt_translate'); ?></h2>
                <?php endif; ?>
            </div>
            </div>


                    