<?php
 /*  Template Name:  Blog  */

get_header(); ?>




<?php include('navigation.php'); ?>




            <div class="tab_wrapper">
                <div class='toggle'>
                    <div class='tabs'>
                        <div class='tab'>Lunch calendar</div>
                        <div class='tab'>Settings</div>
                        <div class='tab'>Fast levering</div>
                    </div>
                </div>
            </div>


        <div class='blogs_wrapper mt-4'>
            <div class='blogs'>
                <h2><?php the_title()?></h2>
                <div class="row">
                    <?php global $paged;
                        query_posts(array(
                        'posts_per_page' => -1,
                        'paged' => $paged
                        ));   ?>
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <div <?php post_class() ?> id="post-<?php the_ID(); ?>"> 
                                    <div class="blog_wrapper col-md-6 col-lg-4 col-xl-3">
                                            <div class="blog p-2 bg-body">                       
                                                <?php if ( has_post_thumbnail() ) { ?>
                                                <div class="post-image">
                                                <a href="<?php the_permalink() ?>">    <?php the_post_thumbnail(); ?></a>
                                                </div>
                                                <?php } ?>
                                                <h3 class="heading mt-2"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                                                <p class="short_info"> <?php  echo strip_shortcodes(wp_trim_words( get_the_content(), 400 )); ?></p>
                                                <h6 class="author mt-2">Written by Maria Mørseth</h6>
                                            </div>
                                    </div>                      
                                </div>
                        <?php endwhile; ?>        
                    <?php else : ?>
                        <p class="noposts"><?php _e('To add Blog Posts, go to Admin Panel > Posts > Add New','author_ts'); ?></p>
                    <?php endif; ?>
                </div>
                <div class="load_more d-flex justify-content-center mt-5 mb-5">
                    <a href="" class="d-flex align-items-center">
                        <p>Load More</p>
                        <img src="<?php echo get_template_directory_uri(); ?>/reources/images/right-arrow.png" alt="">
                    </a>
                </div>



   
                </div>
            </div>
        </div>
        
    </main>


<?php //get_sidebar('blog'); ?>
<?php get_footer(); ?>