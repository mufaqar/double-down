<?php

/**
 * Template Name: Home 
 */
get_header();

?>
    <!-- blogs  -->
    <section class="container mb-5">
        <div class="news text-center d-flex justify-content-between flex-column flex-md-row align-items-center">
            <h2>Alahlifc News</h2>
            <div class="d-flex align-items-center flex-column flex-md-row">
                <ul class="d-flex flex-wrap justify-content-center">
                    <li><a href="">Football News</a></li>
                    

                    <?php                                
                                     $category_tax = get_terms( array('taxonomy' => 'category','hide_empty' => false ) ); 
                                          foreach( $category_tax as $cate ) 
                                                    { ?>
                                                    <li><a href="<?php echo $cate->slug ?>"><?php echo $cate->name ?> <?php
                                                     }
                                             
                                           ?>




                </ul>
                <a href="#" class="btn bluebtn view mt-3 mt-md-0">View All</a>
            </div>
        </div>
        <div class="blogwrapper row">
            <div class="col-md-6 d-flex flex flex-column">
                <div class="feature f1">
                    <div class="info d-flex flex-column h-100 justify-content-end">
                        <h3>Lorem ipsum dolor, sit amet consectetur.</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae sit alias corporis
                            aliquid,</p>
                        <p>By <span>Williom</span> and <span>Wilson</span></p>
                        <p class="badgh">Main Story</p>
                    </div>
                </div>
                <div class="subfeature row mt-4">
                    <div class="col-md-6">
                        <img src="<?php bloginfo('template_directory'); ?>/resources/img/feature.jpg" alt="">
                        <p class="date mt-3 mb-2">10 oct 2022</p>
                        <h4 class="mb-3"><a href="">Lorem ipsum dolor sit amet, consectetur vitae..</a></h4>
                        <div class="d-flex justify-content-between auth-info">
                            <p>By <span>Williom</span> and <span>Willson</span> </p>
                            <p>23 mint ago</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="<?php bloginfo('template_directory'); ?>/resources/img/feature.jpg" alt="">
                        <p class="date mt-3 mb-2">10 oct 2022</p>
                        <h4 class="mb-3"><a href="">Lorem ipsum dolor sit amet, consectetur vitae..</a></h4>
                        <div class="d-flex justify-content-between auth-info">
                            <p>By <span>Williom</span> and <span>Willson</span> </p>
                            <p>23 mint ago</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">


                <div class="subfeature row">
                    <div class="col-md-6">
                        <img src="<?php bloginfo('template_directory'); ?>/resources/img/feature.jpg" alt="">
                        <p class="date mt-3 mb-2">10 oct 2022</p>
                        <h4 class="mb-3"><a href="">Lorem ipsum dolor sit amet, consectetur vitae..</a></h4>
                        <div class="d-flex justify-content-between auth-info">
                            <p>By <span>Williom</span> and <span>Willson</span> </p>
                            <p>23 mint ago</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="<?php bloginfo('template_directory'); ?>/resources/img/p1.png" alt="">
                        <p class="date mt-3 mb-2">10 oct 2022</p>
                        <h4 class="mb-3"><a href="">Lorem ipsum dolor sit amet, consectetur vitae..</a></h4>
                        <div class="d-flex justify-content-between auth-info">
                            <p>By <span>Williom</span> and <span>Willson</span> </p>
                            <p>23 mint ago</p>
                        </div>
                    </div>
                </div>

                <div class="feature f2">
                    <div class="info d-flex flex-column h-100 justify-content-end">
                        <h3>Lorem ipsum dolor, sit amet consectetur.</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae sit alias corporis
                            aliquid,</p>
                        <p>By <span>Williom</span> and <span>Wilson</span></p>
                        <p class="badgh">Main Story</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- matches record -->
    <section class="record container mb-5">

        <div class="record-wrapper p-4 d-flex flex-column align-items-center justify-content-center">
            <h2>Matches</h2>
            <div class="row w-100 outer">
                <div class="col-md-4">
                    <h4>Prince Mohammed bin Salman Professional League</h4>
                    <h6>Stamford Bridge - 22 May 2022, 08:00 PM</h6>
                    <div class="score_wrapper">
                        <div class="score d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="<?php bloginfo('template_directory'); ?>/resources/img/team (1).png" alt="Team Logo">
                                <p>alahlifc</p>
                            </div>
                            <h6>4</h6>
                        </div>
                        <!-- 2nd -->
                        <div class="score d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="<?php bloginfo('template_directory'); ?>/resources/img/team (2).png" alt="Team Logo">
                                <p>alahlifc</p>
                            </div>
                            <h6>1</h6>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4 pt-2">
                        <a href="" class="btn small greenbtn ">Match center</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4>Next Match</h4>
                    <h6>30 May 2022, 08:00 PM</h6>
                    <div class="score_wrapper">
                        <div class="score d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="<?php bloginfo('template_directory'); ?>/resources/img/team (1).png" alt="Team Logo">
                                <p>alahlifc</p>
                            </div>
                            <h6>3</h6>
                        </div>
                        <!-- 2nd -->
                        <div class="score d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="<?php bloginfo('template_directory'); ?>/resources/img/team (2).png" alt="Team Logo">
                                <p>Al Nassr</p>
                            </div>
                            <h6>2</h6>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4 pt-2">
                        <a href="" class="btn small greenbtn ">Match center</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4>Premier League 2021/2022</h4>
                    <h6>Stamford Bridge - 22 May 2022, 08:00 PM</h6>
                    <div class="preamium-league-table mt-3">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Team</th>
                                    <th scope="col">P</th>
                                    <th scope="col">GD</th>
                                    <th scope="col">Pts</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <img class="p-league-logo" src="<?php bloginfo('template_directory'); ?>/resources/img/team (1).png"
                                                alt="Team Logo">
                                            <h6>lorem</h6>
                                        </div>
                                    </th>
                                    <td>23</td>
                                    <td>16</td>
                                    <td>34</td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <img class="p-league-logo" src="<?php bloginfo('template_directory'); ?>/resources/img/team (1).png"
                                                alt="Team Logo">
                                            <h6>lorem</h6>
                                        </div>
                                    </th>
                                    <td>23</td>
                                    <td>16</td>
                                    <td>34</td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <img class="p-league-logo" src="<?php bloginfo('template_directory'); ?>/resources/img/team (1).png"
                                                alt="Team Logo">
                                            <h6>lorem</h6>
                                        </div>
                                    </th>
                                    <td>23</td>
                                    <td>16</td>
                                    <td>34</td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end mt-4">
                            <a href="" class="btn small greenbtn ">Match center</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- tranning section  -->
    <section class="tranning mb-5">
        <div class="container d-flex justify-content-between align-items-center">
            <h2>Tranning</h2>
            <a href="#" class="btn bluebtn">View All</a>
        </div>
        <div class="">
            <div class="right-side-slider mt-4">

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
                                            <h4><?php the_title()?></h4>
                                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel minima tempora corporis!
                                            </p>
                                        </a>
                                    </div>
                                </div>

                <?php endwhile; wp_reset_query(); else : ?>
                                                    <h2><?php _e('Nothing Found','lbt_translate'); ?></h2>
                                        <?php endif;   ?>         
                                    
               


            </div>
        </div>
    </section>

    <!-- player section  -->
    <section class="tranning player">
        <div class="container d-flex justify-content-between align-items-center">
            <h2>Tranning</h2>
            <a href="#" class="btn bluebtn">View All</a>
        </div>
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


    <!-- Team Slider  -->
    <section class="team_slider">
        <div class="container">
            <h2>First Team</h2>
            <div class="slider_wrapper">
                <div class="center-slider">
                    <div>
                        <div class="player_info">
                            <img src="<?php echo get_template_directory_uri(); ?>/resources/img//player1.png" alt="Player">
                            <div class="player_data">
                                <h4 class="number">20</h4>
                                <h3 class="player_name">Mohammed El Shenawy</h3>
                                <h6 class="player_position">Goalkeeper</h6>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="player_info">
                            <img src="<?php echo get_template_directory_uri(); ?>/resources/img/t2.png" alt="Player">
                            <div class="player_data">
                                <h4 class="number">22</h4>
                                <h3 class="player_name">El Shenawy</h3>
                                <h6 class="player_position">Goalkeeper</h6>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="player_info">
                            <img src="<?php echo get_template_directory_uri(); ?>/resources/img/t3.png" alt="Player">
                            <div class="player_data">
                                <h4 class="number">5</h4>
                                <h3 class="player_name">Shenawy</h3>
                                <h6 class="player_position">Goalkeeper</h6>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="player_info">
                            <img src="<?php echo get_template_directory_uri(); ?>/resources/img/t4.png" alt="Player">
                            <div class="player_data">
                                <h4 class="number">7</h4>
                                <h3 class="player_name">Mohammed El</h3>
                                <h6 class="player_position">Goalkeeper</h6>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="player_info">
                            <img src="<?php echo get_template_directory_uri(); ?>/resources/img/t5.png" alt="Player">
                            <div class="player_data">
                                <h4 class="number">26</h4>
                                <h3 class="player_name">Mohammed Shenawy</h3>
                                <h6 class="player_position">Goalkeeper</h6>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="player_info">
                            <img src="<?php echo get_template_directory_uri(); ?>/resources/img//player1.png" alt="Player">
                            <div class="player_data">
                                <h4 class="number">20</h4>
                                <h3 class="player_name">Mohammed El Shenawy</h3>
                                <h6 class="player_position">Goalkeeper</h6>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="player_info">
                            <img src="<?php echo get_template_directory_uri(); ?>/resources/img/t6.png" alt="Player">
                            <div class="player_data">
                                <h4 class="number">40</h4>
                                <h3 class="player_name">El Shenawy</h3>
                                <h6 class="player_position">Goalkeeper</h6>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="nav">
                <div class="next_team">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="previous_team">
                    <i class="fa-solid fa-angle-left"></i>
                </div>
            </div>
        </div>
        <div class="_overlay"></div>
    </section>

     <!-- Next Matches section  -->
     <section class="tranning mt-5 mb-5">
        <div class="container d-flex justify-content-between align-items-center">
            <h2>Next Matches</h2>
            <a href="#" class="btn bluebtn">View All</a>
        </div>
        <div class="nextmatch_slider">
            <div class="right-side-slider mt-4">
                <div class="record m-2">
                    <div class="record-wrapper">
                        <div class="p-4">
                            <h4>Next Match</h4>
                            <h6>30 May 2022, 08:00 PM</h6>
                            <div class="score_wrapper">
                                <div class="score d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo get_template_directory_uri(); ?>/resources/img/team (1).png" alt="Team Logo">
                                        <p>alahlifc</p>
                                    </div>
                                    <h6>3</h6>
                                </div>
                                <!-- 2nd -->
                                <div class="score d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo get_template_directory_uri(); ?>/resources/img/team (2).png" alt="Team Logo">
                                        <p>Al Nassr</p>
                                    </div>
                                    <h6>2</h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4 pt-2">
                                <a href="" class="btn small greenbtn ">Match center</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="record m-2">
                    <div class="record-wrapper">
                        <div class="p-4">
                            <h4>Next Match</h4>
                            <h6>30 May 2022, 08:00 PM</h6>
                            <div class="score_wrapper">
                                <div class="score d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo get_template_directory_uri(); ?>/resources/img/team (1).png" alt="Team Logo">
                                        <p>alahlifc</p>
                                    </div>
                                    <h6>3</h6>
                                </div>
                                <!-- 2nd -->
                                <div class="score d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo get_template_directory_uri(); ?>/resources/img/team (2).png" alt="Team Logo">
                                        <p>Al Nassr</p>
                                    </div>
                                    <h6>2</h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4 pt-2">
                                <a href="" class="btn small greenbtn ">Match center</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="record m-2">
                    <div class="record-wrapper">
                        <div class="p-4">
                            <h4>Next Match</h4>
                            <h6>30 May 2022, 08:00 PM</h6>
                            <div class="score_wrapper">
                                <div class="score d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo get_template_directory_uri(); ?>/resources/img/team (1).png" alt="Team Logo">
                                        <p>alahlifc</p>
                                    </div>
                                    <h6>3</h6>
                                </div>
                                <!-- 2nd -->
                                <div class="score d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo get_template_directory_uri(); ?>/resources/img/team (2).png" alt="Team Logo">
                                        <p>Al Nassr</p>
                                    </div>
                                    <h6>2</h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4 pt-2">
                                <a href="" class="btn small greenbtn ">Match center</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="record m-2">
                    <div class="record-wrapper">
                        <div class="p-4">
                            <h4>Next Match</h4>
                            <h6>30 May 2022, 08:00 PM</h6>
                            <div class="score_wrapper">
                                <div class="score d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo get_template_directory_uri(); ?>/resources/img/team (1).png" alt="Team Logo">
                                        <p>alahlifc</p>
                                    </div>
                                    <h6>3</h6>
                                </div>
                                <!-- 2nd -->
                                <div class="score d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo get_template_directory_uri(); ?>/resources/img/team (2).png" alt="Team Logo">
                                        <p>Al Nassr</p>
                                    </div>
                                    <h6>2</h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4 pt-2">
                                <a href="" class="btn small greenbtn ">Match center</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="record m-2">
                    <div class="record-wrapper">
                        <div class="p-4">
                            <h4>Next Match</h4>
                            <h6>30 May 2022, 08:00 PM</h6>
                            <div class="score_wrapper">
                                <div class="score d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo get_template_directory_uri(); ?>/resources/img/team (1).png" alt="Team Logo">
                                        <p>alahlifc</p>
                                    </div>
                                    <h6>3</h6>
                                </div>
                                <!-- 2nd -->
                                <div class="score d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo get_template_directory_uri(); ?>/resources/img/team (2).png" alt="Team Logo">
                                        <p>Al Nassr</p>
                                    </div>
                                    <h6>2</h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4 pt-2">
                                <a href="" class="btn small greenbtn ">Match center</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="record m-2">
                    <div class="record-wrapper">
                        <div class="p-4">
                            <h4>Next Match</h4>
                            <h6>30 May 2022, 08:00 PM</h6>
                            <div class="score_wrapper">
                                <div class="score d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo get_template_directory_uri(); ?>/resources/img/team (1).png" alt="Team Logo">
                                        <p>alahlifc</p>
                                    </div>
                                    <h6>3</h6>
                                </div>
                                <!-- 2nd -->
                                <div class="score d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo get_template_directory_uri(); ?>/resources/img/team (2).png" alt="Team Logo">
                                        <p>Al Nassr</p>
                                    </div>
                                    <h6>2</h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4 pt-2">
                                <a href="" class="btn small greenbtn ">Match center</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php get_footer()?>

  