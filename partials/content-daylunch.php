    <div class="food_info day__food row">
        <?php query_posts(array(
            'post_type' => 'menu_items',
            'posts_per_page' => 2,
            'order' => 'desc',
            'menu_types' => 'lunch-boxes'
        ));
        if (have_posts()) :  while (have_posts()) : the_post();
                $pid = get_the_ID(); ?>
                <div class="col-md-6 first border-end">
                    <h3><?php the_title() ?> | <span> NOK <?php the_field('menu_item_price'); ?></span></h3>
                    <p>Here you can easily choose between or cancel
                        the various lunch options from day to day.
                        If you want to change a fixed subscription,
                        do so <a href="#">her.</a></p>

                    <div class="order_wrapper mt-3 ">
                        <button href="" class="btn_primary  _id<?php echo $pid ?>" onmouseover="showOrderCounter(<?php echo $pid ?>)">Select</button>
                        <div class="d-none product_counter  d-flex justify-content-center align-items-center _cid<?php echo $pid ?>" >
                            <i class="count-down"><img src="<?php bloginfo('template_directory'); ?>/reources/images/minus-thin.png" alt="" onclick="handleCountDec(<?php echo $pid ?>)"></i>
                            <input type="text" data-id="<?php echo $pid; ?>" value="1" class="product-quantity form-control text-center incrDecrCounter" />
                            <i class="count-up"><img src="<?php bloginfo('template_directory'); ?>/reources/images/plus-thin.png" alt="" onclick="handleCountInc(<?php echo $pid ?>)"></i>
                        </div>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_query();
        else : ?>
            <h2><?php _e('Nothing Found', 'lbt_translate'); ?></h2>
        <?php endif; ?>
    </div>


    <div class="food_card_wrapper row day_<?php echo $day ?>">
        <?php query_posts(array(
            'post_type' => 'menu_items',
            'posts_per_page' => 4,
            'order' => 'desc',
            'menu_types' => 'accessories'
        ));
        if (have_posts()) :  while (have_posts()) : the_post();
                $pid = get_the_ID();  ?>
                <div class="food_card col-lg-3 col-md-6">
                    <img src="<?php echo get_template_directory_uri(); ?>/reources/images/food1.png" alt="">
                    <h4 class="mt-2"><?php the_title() ?></h4>
                    <p>Nok <?php the_field('menu_item_price'); ?></p>
                    <input type="hidden" data-id="<?php echo $pid; ?>" value="1" class="product-extra" />
                </div>
            <?php endwhile;
            wp_reset_query();
        else : ?>
            <h2><?php _e('Nothing Found', 'lbt_translate'); ?></h2>
        <?php endif; ?>

    </div>

    <div class="accordion_btns d-flex justify-content-end mb-5 mr-3">
        <a id="" class="btn_primary btn_sec">Choose Location</a>
        <a class="btn_primary btn_sec" href="">Add allergy-friendly</a>
        <input type="submit" class="btn_primary" value="Save" />
    </div>