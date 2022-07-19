<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CT_Custom
 */

get_header();
?>



	<div class="page-sections pt-5 pb-5">
           <div class="container">           
                <div class="row pagebody">

						<?php
						while ( have_posts() ) : the_post();
							the_content();
						endwhile; // End of the loop.
						?>

				</div><!-- #row -->
			</div><!-- #container -->
	</div><!-- #section -->

<?php

get_footer();
