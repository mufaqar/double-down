<?php
/**
 * Template Name: Training 
 */

get_header();


?>
  <!-- player section  -->
  <section class="tranning mb-5">
        
        <div class="">
            <div class="right-side-slider _playerwrapper mt-4">

            <?php      
                                    
                                    query_posts(array(
                                        'post_type' => 'trainings',
                                        'posts_per_page' => 8,                        
                                        'order' => 'desc'
                                        
                                    ));
                                                if (have_posts()) :  while (have_posts()) : the_post(); ?>
                <div class="p-2">
                    <div class="card-item p-4 d-flex flex-column justify-content-end"
                        style="background: linear-gradient(to bottom, rgba(0, 0, 0, .2), rgba(0, 0, 0, 0.9)), url('<?php bloginfo('template_directory'); ?>/resources/img/c1.png');">
                        <a href="#">
                            <h4>Under 18</h4>
                            <p>Deffender Saudia Arabia</p>
                        </a>
                    </div>
                </div>

                <?php endwhile; wp_reset_query(); else : ?>
                                                    <h2><?php _e('Nothing Found','lbt_translate'); ?></h2>
                                        <?php endif;   ?>       
                



            </div>
        </div>
    </section>

<?php

get_footer();
