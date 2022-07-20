<?php /* Template Name: Meeting  */ 



get_header();


?>
 <main class="launch_calandar ">
        <div class="row d-flex">
            <div class="" style="width: 230px;">
            <div class="sidebar p-0 align-items-start pt-5">
                <div class="d-flex justify-content-center">
                    <img src="<?php bloginfo('template_directory'); ?>/reources/images/logo.png" class="logo" alt="">
                </div>
                <div class="toggle_btn bg-light mt-4 mb-4 d-flex mx-3">
                    <button href="" class="myprofile active" onclick="myProfile()">My <br> Profile</button>
                    <button href="" class="companyProfile" onclick="companyProfile()">Company<br> Profile</button>
                </div>

                <div>
                    <ul class="myProfileNav">
                        <li class="active"><a href="/caldendar">Business Overview</a></li>
                        <li class=""><a href="meeting">Meeting</a></li>
                        <li class=""><a href="#">Lunsjmeny</a></li>
                        <li class=""><a href="#">Blog</a></li>
                    </ul>
                    <ul class="companyProfileNav">
                        <li class="active"><a href="#">C Business Overview</a></li>
                        <li class=""><a href="#">Meeting</a></li>
                        <li class=""><a href="#">Lunsjmeny</a></li>
                        <li class=""><a href="#">Blog</a></li>
                    </ul>
                </div>

                <div class="logout">
                    <img src="<?php bloginfo('template_directory'); ?>/reources/images/logout.png" alt=""><span>Log Out</span>
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
                                <div class='tab active'>Lunch calendar</div>
                                <div class='tab'>Settings</div>
                                <div class='tab'>Fast levering</div>
                            </div>
                            <div class='panels'>
                                <div class='panel launchClander'>
                                    <h2>Meeting food</h2>
                                    <p>The lunch collective is happy to deliver food to your meeting, whether it is an employee interview with you and 1 employee or a planning day with 300 employees.<br>
                                       <a href="">Everyone deserves good food - even those you have invited to a meeting!</a>
                                    </p>

                                    <div class="orderReview d-flex justify-content-center p-5 mt-5 align-items-center flex-column ">
                                        <h2>Overview of Orders</h2>
                                        <p>No bookings</p>
                                        <a href="" class="btn_primary mt-2">New Order</a>
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




