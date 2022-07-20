<?php /* Template Name: Catering  */ 



get_header();


?>
 <main class="launch_calandar">
        <div class="row d-flex">
            <div class="" style="width: 230px;">
            <div class="sidebar p-0 align-items-start pt-5">
                <div class="d-flex justify-content-center">
                    <img src="<?php bloginfo('template_directory'); ?>/reources//images/logo.png" class="logo" alt="">
                </div>
                <div class="toggle_btn bg-light mt-4 mb-4 d-flex mx-3">
                    <button href="" class="myprofile active" onclick="myProfile()">My <br> Profile</button>
                    <button href="" class="companyProfile" onclick="companyProfile()">Company<br> Profile</button>
                </div>

                <div>
                    <ul class="myProfileNav">
                        <li class="active"><a>Business Overview</a></li>
                        <li class=""><a>Meeting</a></li>
                        <li class=""><a>Lunsjmeny</a></li>
                        <li class=""><a>Blog</a></li>
                    </ul>
                    <ul class="companyProfileNav">
                        <li class=""><a>C Business Overview</a></li>
                        <li class=""><a>Meeting</a></li>
                        <li class=""><a>Lunsjmeny</a></li>
                        <li class="active"><a>Catering</a></li>
                        <li class=""><a>Blog</a></li>
                    </ul>
                </div>

                <div class="logout">
                    <img src="<?php bloginfo('template_directory'); ?>/reources//images/logout.png" alt=""><span>Log Out</span>
                </div>

                <img src="<?php bloginfo('template_directory'); ?>/reources/images/cancel.png" class="hide_nav" alt="" onclick="HideNav()">
            </div>
            </div>
            <div class="content">
                <div class="container_wrapper">
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <div class="hamburger">
                            <img src="<?php bloginfo('template_directory'); ?>/reources/images/hamburger.png" alt="" id="hamburgerbtn" onclick="hamburger()">
                        </div>

                        <div class="proofile_info d-flex align-items-center">
                            <div class="user">
                                <h6>Hey, Jose!</h6>
                                <p>Agreement: Oranchy AS</p>
                            </div>
                            <img src="<?php bloginfo('template_directory'); ?>/reources//images/profile.webp" alt="">
                        </div>
                        
                    </div>

                    <!-- tabs -->

                    <div class="tab_wrapper">
                        <div class='toggle'>
                            <div class='tabs'>
                                <div class='tab'>Lunch calendar</div>
                                <div class='tab'>Settings</div>
                                <div class='tab'>Fast levering</div>
                            </div>
                        </div>
                    </div>

                    <div class="custom_container catering_wrapper mt-5 mb-5">
                        <div class="catering_menu">
                            <a href="">Bread Lunch</a>
                            <a href="">Salat</a>
                            <a href="">Vegetarian</a>
                        </div>
                        <div class="calender_wrapper d-flex justify-content-between align-items-center mt-5">
                            <h2>Catering</h2>
                            <div class="calender">
                                <input type="date">
                            </div>
                        </div>
                        <div class="catering_card_wrapper">

                            <div class="catering_card">
                                <h3>Monday | <span>May 22</span></h3>
                                <div class="d-flex justify-content-between flex-wrap mt-4">
                                    <div class="">
                                        <h6>Number of people:</h6>
                                        <p>6</p>
                                    </div>
                                    <div class="">
                                        <h6>Address:</h6>
                                        <p>B-15471-New Jersy</p>
                                    </div>
                                    <div class="">
                                        <h6>Food Type:</h6>
                                        <p>Wraps</p>
                                    </div>
                                    <div class="">
                                        <h6>Budget per person:</h6>
                                        <p>NOK 349</p>
                                    </div>
                                    <div class="">
                                        <h6>Need allergens</h6>
                                        <p>NOK 349</p>
                                    </div>
                                </div>
                            </div>

                            <div class="catering_card">
                                <h3>Monday | <span>May 22</span></h3>
                                <div class="d-flex justify-content-between flex-wrap mt-4">
                                    <div class="">
                                        <h6>Number of people:</h6>
                                        <p>6</p>
                                    </div>
                                    <div class="">
                                        <h6>Address:</h6>
                                        <p>B-15471-New Jersy</p>
                                    </div>
                                    <div class="">
                                        <h6>Food Type:</h6>
                                        <p>Wraps</p>
                                    </div>
                                    <div class="">
                                        <h6>Budget per person:</h6>
                                        <p>NOK 349</p>
                                    </div>
                                    <div class="">
                                        <h6>Need allergens</h6>
                                        <p>NOK 349</p>
                                    </div>
                                </div>
                            </div>

                            <div class="catering_card">
                                <h3>Monday | <span>May 22</span></h3>
                                <div class="d-flex justify-content-between flex-wrap mt-4">
                                    <div class="">
                                        <h6>Number of people:</h6>
                                        <p>6</p>
                                    </div>
                                    <div class="">
                                        <h6>Address:</h6>
                                        <p>B-15471-New Jersy</p>
                                    </div>
                                    <div class="">
                                        <h6>Food Type:</h6>
                                        <p>Wraps</p>
                                    </div>
                                    <div class="">
                                        <h6>Budget per person:</h6>
                                        <p>NOK 349</p>
                                    </div>
                                    <div class="">
                                        <h6>Need allergens</h6>
                                        <p>NOK 349</p>
                                    </div>
                                </div>
                            </div>

                            <div class="catering_card">
                                <h3>Monday | <span>May 22</span></h3>
                                <div class="d-flex justify-content-between flex-wrap mt-4">
                                    <div class="">
                                        <h6>Number of people:</h6>
                                        <p>6</p>
                                    </div>
                                    <div class="">
                                        <h6>Address:</h6>
                                        <p>B-15471-New Jersy</p>
                                    </div>
                                    <div class="">
                                        <h6>Food Type:</h6>
                                        <p>Wraps</p>
                                    </div>
                                    <div class="">
                                        <h6>Budget per person:</h6>
                                        <p>NOK 349</p>
                                    </div>
                                    <div class="">
                                        <h6>Need allergens</h6>
                                        <p>NOK 349</p>
                                    </div>
                                </div>
                            </div>


                        </div>
    
                    </div>
                   
                    
                </div>
            </div>
        </div>
        
    </main>







    <?php get_footer();?>


