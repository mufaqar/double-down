<?php /* Template Name: Catering (C)  */ 
get_header();


?>
 <?php include('navigation.php'); ?>
 
 <div class="custom_container catering_wrapper mt-5 mb-5">
                        <!-- <div class="catering_menu">
                            <a href="">Bread Lunch</a>
                            <a href="">Salat</a>
                            <a href="">Vegetarian</a>
                        </div> -->
                        <div class="calender_wrapper d-flex justify-content-between align-items-center mt-5">
                            <div class="catering_heading d-flex align-items-center">
                                <h2>Catering</h2>
                                <div><a href="<?php echo home_url('catering-form'); ?>"><i class="fa-solid fa-plus"></i></a></div>
                            </div>
                            <div class="calender">
                                <input type="date">
                            </div>
                        </div>
                        <div class="catering_card_wrapper">

                <?php query_posts(array(
                            'post_type' => 'catering',
                            'posts_per_page' => -1,
                            'order' => 'desc'
                            
                        )); 
                        if (have_posts()) :  while (have_posts()) : the_post(); ?>

                            <div class="catering_card">
                            <?php  $timestamp = strtotime(get_field('date'));
                                    $day = date('l', $timestamp); ?>
                                <h3><?php echo $day; ?> | <span><?php the_title()?></span></h3>
                                <div class="d-flex justify-content-between flex-wrap mt-4">
                                    <div class="">
                                        <h6>Number of people:</h6>
                                        <p><?php the_field('people'); ?> </p>
                                    </div>
                                    <div class="">
                                        <h6>Address:</h6>
                                        <p><?php the_field('address'); ?> </p>
                                    </div>
                                    <div class="">
                                        <h6>Food Type:</h6>
                                        <?php echo get_the_terms( $post->ID, 'food_type' )[0]->name;?>
                                    </div>
                                    <div class="">
                                        <h6>Budget per person:</h6>
                                        <p>NOK <?php the_field('person'); ?></p>
                                    </div>
                                    <div class="">
                                        <h6>Need allergens</h6>
                                        <p> <?php echo get_the_terms( $post->ID, 'allergens' )[0]->name;?></p>
                                    </div>
                                </div>
                            </div>

                    
                <?php endwhile; wp_reset_query(); else : ?>
                    <h2><?php _e('Nothing Found','lbt_translate'); ?></h2>
                <?php endif; ?>         

                           


                        </div>
    
                    </div>
                   
                    
                </div>
            </div>
        </div>
        
    </main>

    <?php get_footer();?>

     <!-- Font Awsome -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>




