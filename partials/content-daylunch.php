    <div class="food_info row">
        <?php query_posts(array(
        'post_type' => 'menu_items',
        'posts_per_page' => 2,
        'order' => 'desc',
        'menu_types' => 'lunch-boxes'  )); 
    if (have_posts()) :  while (have_posts()) : the_post(); ?>
        <div class="col-md-6 first border-end">
            <h3><?php the_title()?> | <span> NOK <?php the_field('menu_item_price'); ?></span></h3>
            <p>Here you can easily choose between or cancel
                the various lunch options from day to day.
                If you want to change a fixed subscription,
                do so <a href="#">her.</a></p>
            <div class="mt-4 mb-4 mb-md-0 mt-md-5">
                <a href="" class="btn_primary">Select</a>
            </div>
        </div>
        <?php endwhile; wp_reset_query(); else : ?>
        <h2><?php _e('Nothing Found','lbt_translate'); ?></h2>
        <?php endif; ?>
    </div>

    </div>
    <div class="food_card_wrapper row">
        <?php query_posts(array(
                    'post_type' => 'menu_items',
                    'posts_per_page' => 4,
                    'order' => 'desc',
                    'menu_types' => 'accessories'                                                                        
                )); 
                if (have_posts()) :  while (have_posts()) : the_post(); ?>
        <div class="food_card col-lg-3 col-md-6 ">
            <img src="<?php echo get_template_directory_uri(); ?>/reources/images//food1.png" alt="">
            <h4 class="mt-2"><?php the_title()?></h4>
            <p>Nok <?php the_field('menu_item_price'); ?></p>
        </div>
        <?php endwhile; wp_reset_query(); else : ?>
        <h2><?php _e('Nothing Found','lbt_translate'); ?></h2>
        <?php endif; ?>

    </div>

    <div class="accordion_btns d-flex justify-content-end mb-5 mr-3">
        <a class="btn_primary btn_sec" href="">Choose Location</a>
        <a class="btn_primary btn_sec" href="">Add allergy-friendly</a>
        <a class="btn_primary" href="">Save</a>
    </div>