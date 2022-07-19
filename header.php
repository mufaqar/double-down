<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11"> 
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/style.css">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"  />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />	
	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<header>
        <nav>
            <div class="top_nav">
                <div class="container mx-auto d-flex justify-content-between align-items-center">
                    <div class="left">                     

                        <?php 

                            wp_nav_menu( array(                              
                                'menu_class'        => "d-flex", 
                                'menu_id'           => "", 
                                'container'         => "false", 
                              'theme_location'    => "top"
                              ) );

                            ?>




                    </div>
                    <div class="right d-flex">
                        <ul class="d-flex align-items-center">
                            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-twitch"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                            <li class="login">
                                <a href="#" class="d-flex align-items-center">
                                    <i class="fa-regular fa-user"></i>
                                    <h6 class="" style="margin-left: .4rem;">Login</h6>
                                </a>
                            </li>
                        </ul>
                        <a href="" href="#" class="btn greenbtn topbtn">Join with us</a>
                    </div>
                </div>
            </div>

            <div class="main_nav">
                <div class="container mx-auto d-flex align-items-center justify-content-between">
                    <div class="w-100 position-relative d-flex justify-content-between align-items-center">

                        <div class="logo "><img src="<?php bloginfo('template_directory'); ?>/resources/img/logo.png" alt=""></div>
                        <div class="menu w-100 d-flex flex-column flex-md-row justify-content-between align-items-center">

                        
                        <?php 

                            wp_nav_menu( array(  
                                'menu'              => "",                             
                                'menu_class'        => "d-flex flex-column flex-md-row align-items-center",                       
                                'container'         => false, 
                                 'theme_location'    => "primary"
                              ) );

                            ?>

                            
                           
                            
                            <div class="search_side d-flex align-items-center">
                                <div class="search">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                                <a href="#" class="btn whitebtn"> contact us </a>
                            </div>
                        </div>
                        <div class="hamburgur">
                            <i class="fa-solid fa-bars opennav" onclick="openMobileMenu()"></i>
                            <i class="fa-solid fa-xmark closenav" onclick="closeMobileMenu()"></i>
                        </div>
                    </div>
                    
                </div>
            </div>
        </nav>

        

        <?php 

        if ( is_front_page() ) :
            ?><main>
            <div class="container">
                <div class="row">
                    <div class="content col-md-6">
                        <h1>Alahlifc Sports <br> Football Club</h1>
                        <h6>Worrldwide realese</h6>
                        <div class="time_wrapper d-flex">
                            <div class="time d-flex flex-column align-items-center">
                                <h4>12</h4>
                                <h5>Day</h5>
                            </div>
                            <div class="time d-flex flex-column align-items-center">
                                <h4>14</h4>
                                <h5>Hours</h5>
                            </div>
                            <div class="time d-flex flex-column align-items-center">
                                <h4>33</h4>
                                <h5>Mins</h5>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="hero-slider">
                            <div class="slider_wrapper">
                                <img src="<?php bloginfo('template_directory'); ?>/resources/img/main-sli.png" alt="">
                            </div>
                            <div class="slider_wrapper">
                                <img src="<?php bloginfo('template_directory'); ?>/resources/img/main-slide-2.png" alt="">
                            </div>
                            <div class="slider_wrapper">
                                <img src="<?php bloginfo('template_directory'); ?>/resources/img/main-slide-3.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main> <?php
        else :
            ?><main>
            <div class="container">
                <div class="row">
                    <div class="content col-md-6">
                        <h1><?php the_title()?></h1>                      
                        
                    </div>
                    
                </div>

            </div>
        </main>  <?php
        endif;

        ?>

    </header>