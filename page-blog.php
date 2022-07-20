<?php
 /*  Template Name:  Blog Page */

get_header(); ?>


<div class="wrapper">
    <div id="page-wrap">
        <div id="content">

<?php global $paged;
	query_posts(array(
	'posts_per_page' => -1,
	'paged' => $paged
	)); 
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
    
<div class="archive-post">
    <h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part( 'inc/meta', 'single' ); ?>
    <?php if ( has_post_thumbnail() ) { ?>
    <div class="post-image">
    <a href="<?php the_permalink() ?>">    <?php the_post_thumbnail(); ?></a>
    </div>
    <?php } ?>
    <div class="post-content">
       <?php  echo strip_shortcodes(wp_trim_words( get_the_content(), 400 )); ?>
    </div>
    <div class="clear"></div>
</div><!--archive-post-->
        
        
        
        
    </div>
<?php endwhile; ?>

<div class="clear"></div>		
<?php else : ?>
    <p class="noposts"><?php _e('To add Blog Posts, go to Admin Panel > Posts > Add New','author_ts'); ?></p>
<?php endif; ?>
<?php get_sidebar('blog'); ?>
<?php get_footer(); ?>