<div class="custom_container catering_wrapper ">
                       
                        <div class="calender_wrapper d-flex justify-content-between align-items-center mt-5">
                            <h2>This week's Salad menu</h2>
                            <div class="calender week_calender">
                                <input type="text" id="weekPicker1" value="<?php echo date("Y-W"); ?>">
                                <div class="wc-icon"><i class="fa-solid fa-calendar-days"></i></div>
                            </div>
                        </div>
                        <div class="catering_card_wrapper">
                            <?php query_posts(array(
                                'post_type' => 'menu_items',
                                'posts_per_page' => 5,
                                'order' => 'desc',
                                'menu_food_type' => 'salad'
                            )); 
                            if (have_posts()) :  while (have_posts()) : the_post(); ?>
                                <div class="catering_card _pro_salat">
                                    <h3><?php the_title()?> ( Monday | <span>May 22</span> ) </h3>
                                    <p class="mt-3"><?php the_content()?></p>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h6 class="mt-2">Contains:</h6>
                                            <p><?php echo get_post_meta( get_the_ID(), 'contains', true ); ?></p>
                                            <p>Nutritional content: <?php echo get_post_meta( get_the_ID(), 'nutritional_content', true ); ?></p>
                                        </div>
                                        <div class="col-md-3 level d-flex justify-content-end" >
                                            <div class="d-flex justify-content-center align-items-center flex-column ">
                                                <img src="<?php echo get_template_directory_uri(); ?>/reources/images/level.png" alt="level">
                                                <h6 class="mt-2"><?php echo get_post_meta( get_the_ID(), 'calories', true ); ?> <sub> kg CO e</sub></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; wp_reset_query(); else : ?>
                            <h2><?php _e('Nothing Found','lbt_translate'); ?></h2>
                            <?php endif; ?> 
                        </div>
                        
                        <div class="mt-5 bottom_level d-flex justify-content-between align-items-center">
                           
                            <div class="d-flex align-items-center">
                                <img src="<?php echo get_template_directory_uri(); ?>/reources/images//level.png" alt="">
                                <div>
                                    <h6>Lav</h6>
                                    <p>0.1-0.5</p>
                                    <p>kg CO2<sub>e</sub></p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <img src="<?php echo get_template_directory_uri(); ?>/reources/images//level.png" alt="">
                                <div>
                                    <h6>Medium</h6>
                                    <p>0.1-0.5</p>
                                    <p>kg CO2<sub>e</sub></p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <img src="<?php echo get_template_directory_uri(); ?>/reources/images//level.png" alt="">
                                <div>
                                    <h6>Hight</h6>
                                    <p>0.1-0.5</p>
                                    <p>kg CO2<sub>e</sub></p>
                                </div>
                            </div>
                           
                        </div>

                    </div>