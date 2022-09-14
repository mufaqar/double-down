<div class="custom_container catering_wrapper ">
    <div class="calender_wrapper d-flex justify-content-between align-items-center mt-5">
        <h2>This week's lunch menu</h2>
        <div class="calender week_calender">
            <input type="text" id="weekpicker" value="<?php echo date("Y-W"); ?>">
            <div class="wc-icon"><i class="fa-solid fa-calendar-days"></i></div>
        </div>

        
    </div>
    <div class="catering_card_wrapper">
        <?php 

      
        echo date("Y-W");

        echo "<hr/>";

        $current_date =   date("Y-m-d");     
        echo $current_date;

        $Date = "2015-06-01"; #Your Own Date
        $Date = date('Y-m-d'); #Or Current Date Fixed here
        $FirstDay = date("Y-m-d", strtotime('sunday last week'));  
        $LastDay = date("Y-m-d", strtotime('sunday this week'));  
        if($Date > $FirstDay && $Date < $LastDay) {
        echo "It is Between";
        } else {
            echo "No Not !!!";  
        }  
                
        
        
        
        query_posts(array(
            'post_type' => 'menu_items',
            'posts_per_page' => -1,
            'order' => 'desc',
            'menus_type' => 'bread-lunch',
            'meta_query' => array(
                array(
                    'key' => 'date',
                    'value' => $current_date,
                    'compare' => 'LIKE'
                ),
            )
           
            
        ));
        if (have_posts()) :  while (have_posts()) : the_post();
        $date = get_field('date'); ?>
                <div class="catering_card _pro_salat">
                    <h3><?php the_title() ?> ( <?php //$timestamp = strtotime($date); echo  date('D', $timestamp);  ?> | <span><?php //echo $date ?> ) </h3>
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


