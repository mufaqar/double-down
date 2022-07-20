<!DOCTYPE >
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
		<title>
			<?php
				/*
				 * Print the <title> tag based on what is being viewed.
				 */
				global $page, $paged, $post;
			
				wp_title( '|', true, 'right' );
			
				// Add the blog name.
				bloginfo( 'name' );
			
				// Add the blog description for the home/front page.
				$site_description = get_bloginfo( 'description', 'display' );
				if ( $site_description && ( is_home() || is_front_page() ) )
					echo " | $site_description";
			
				// Add a page number if necessary:
				if ( $paged >= 2 || $page >= 2 )
					echo ' | ' . sprintf( __( 'Page %s', 'wpv' ), max( $paged, $page ) );
            ?>
	</title>
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
	

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>
	<?php wp_head(); ?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />
	
</head>
<body <?php body_class(); ?> >
	<header class="container">
				<nav class="navbar navbar-expand-lg navbar-light mt-3 mb-3">
					<div class="container-fluid">
						<img src="<?php bloginfo('template_directory'); ?>/reources/images/logo.png" />
						<div>
							<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
								data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
								aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse nav_wrapper navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav me-auto mb-2 mb-lg-0">
									<li class="nav-item">
										<a class="nav-link active" aria-current="page" href="#">Lunsjmeny</a>
									</li>
									<li class="nav-item">
										<a class="nav-link active" aria-current="page" href="#">This is how it works</a>
									</li>
									<li class="nav-item">
										<a class="nav-link active" aria-current="page" href="#">Meeting Food</a>
									</li>
									<li class="nav-item">
										<a class="nav-link active" aria-current="page" href="#">Blog</a>
									</li>
									<li class="nav-item">
										<a class="nav-link active" aria-current="page" href="#">About Us</a>
									</li>
								</ul>
								<a class="signin">Sign In</a>
							</div>
						</div>
					</div>
				</nav>
		</header>

