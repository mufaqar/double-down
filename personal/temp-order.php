<?php /* Template Name: Order ( Personal )  */ 
get_header();
?>
 <main class="launch_calandar">
        <div class="row d-flex">
            <div class="" style="width: 230px;">
                <div class="sidebar p-0 align-items-start pt-5">
                    <div class="d-flex justify-content-center">
                        <img src="<?php echo get_template_directory_uri(); ?>/reources/images/logo.png" class="logo" alt="">
                    </div>
                    <div class="toggle_btn bg-light mt-4 mb-4 d-flex mx-3">
                        <button href="" class="myprofile active" onclick="myProfile()">My <br> Profile</button>
                        <button href="" class="companyProfile" onclick="companyProfile()">Company<br> Profile</button>
                    </div>

                    <div>
                        <ul class="myProfileNav">
                            <li class=""><a>My Profile</a></li>
                            <li class="active"><a>My Orders</a></li>
                            <li class=""><a>Settings</a></li>
                            <li class=""><a>Lunsjmeny</a></li>
                            <li class=""><a>Catering</a></li>
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
                        <img src="<?php echo get_template_directory_uri(); ?>/reources/images/logout.png" alt=""><span>Log Out</span>
                    </div>

                    <img src="<?php echo get_template_directory_uri(); ?>/reources/images/cancel.png" class="hide_nav" alt="" onclick="HideNav()">
                </div>
            </div>
            <div class="content">
                <div class="container_wrapper">
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <div class="hamburger">
                            <img src="<?php echo get_template_directory_uri(); ?>/reources/images/hamburger.png" alt="" id="hamburgerbtn" onclick="hamburger()">
                        </div>

                        <div class="proofile_info d-flex align-items-center">
                            <div class="user">
                                <h6>Hey, Jose!</h6>
                                <p>Agreement: Oranchy AS</p>
                            </div>
                            <img src="<?php echo get_template_directory_uri(); ?>/reources/images/profile.webp" alt="">
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


                    <div class="custom_container c2">
                        <div class="row">
                            <div class="catering_wrapper mt-5 mb-5 col-md-8">
                                <div class="catering_menu">
                                    <a href="" class="_active">Lunch Calendar</a>
                                    <a href="">Fixed Delivery</a>
                                </div>
                                <div class="calender_wrapper d-flex justify-content-between align-items-center mt-5">
                                    <p>A Total of 0 Boxes,<br> Additions you pay: NOK 104</p>
                                    <div class="calender">
                                        <input type="date">
                                    </div>
                                </div>
                                <div class="catering_card_wrapper">
                                    <div class="catering_card _pro_salat">
                                        <h3>Bread Lunch</h3>
                                        <p class="mt-3">Red lentils with hot spices, salt-baked celery root, baked tomatoes, sugar peas, spinach, tahini dressing and pumpkin seeds.</p>
                                        <div class="row">
                                            <div class="col-md-9">
                                                <h6 class="mt-2">Contains:</h6>
                                                <p>Sesame seeds, Celery</p>
                                                <p>Nutritional content: 520 kcal, 31g carbohydrate, 31g fat, 21g protein</p>
                                            </div>
                                            <div class="col-md-3 level d-flex justify-content-end">
                                                <div class="d-flex justify-content-center align-items-center flex-column ">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/reources/images/level.png" alt="level">
                                                    <h6 class="mt-2">0.4 <sub>kg CO e</sub></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center _info mb-3">
                                            <div>
                                                <strong class="title">Price:</strong> 
                                                <p><strong>Kr 72.8</strong></p>
                                            </div>
                                            <div style="margin-left: 3rem;">
                                                <strong class="title">VAT:</strong> 
                                                <p>80</p>
                                            </div>
                                        </div>
                                    </div>   

                                    <div class="catering_card _pro_salat">
                                        <h3>Bread Lunch</h3>
                                        <p class="mt-3">Red lentils with hot spices, salt-baked celery root, baked tomatoes, sugar peas, spinach, tahini dressing and pumpkin seeds.</p>
                                        <div class="row">
                                            <div class="col-md-9">
                                                <h6 class="mt-2">Contains:</h6>
                                                <p>Sesame seeds, Celery</p>
                                                <p>Nutritional content: 520 kcal, 31g carbohydrate, 31g fat, 21g protein</p>
                                            </div>
                                            <div class="col-md-3 level d-flex justify-content-end">
                                                <div class="d-flex justify-content-center align-items-center flex-column ">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/reources/images/level.png" alt="level">
                                                    <h6 class="mt-2">0.4 <sub>kg CO e</sub></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center _info mb-3">
                                            <div>
                                                <strong class="title">Price:</strong> 
                                                <p><strong>Kr 72.8</strong></p>
                                            </div>
                                            <div style="margin-left: 3rem;">
                                                <strong class="title">VAT:</strong> 
                                                <p>80</p>
                                            </div>
                                        </div>
                                    </div>   

                                </div>
        
                            </div>
                            <div class="col-md-4 mb-5">
                                <aside class="_aside">
                                    <div class="app _calender">
                                        <div class="app__main">
                                                <div class="calendar">
                                                <div id="calendar"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='Fixed_delivery'>
                                        <div class="product_wrapper mb-4">
                                            <div class="mt-4">
                                                <div class="product_card p-4">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/reources/images/product1.png" alt="">
                                                    <h2>Bread Lunch 91, - </h2>
                                                    <button href="" class="btn_primary  select_product_btn id1"
                                                        onclick="showCounter(1)">Select</button>
                                                    <div
                                                        class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid1">
                                                        <i class="count-down"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/neg.png"
                                                                alt=""></i>
                                                        <input type="text" value="1"
                                                            class="product-quantity form-control text-center incrDecrCounter" />
                                                        <i class="count-up"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/plus.png"
                                                                alt=""></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- 2nd  -->
                                            <div class="mt-4">
                                                <div class="product_card p-4">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/reources/images/product1.png" alt="">
                                                    <h2>Bread Lunch 92, - </h2>
                                                    <button href="" class="btn_primary  select_product_btn id2"
                                                        onclick="showCounter(2)">Select</button>
                                                    <div
                                                        class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid2">
                                                        <i class="count-down"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/neg.png"
                                                                alt=""></i>
                                                        <input type="text" value="2"
                                                            class="product-quantity form-control text-center incrDecrCounter" />
                                                        <i class="count-up"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/plus.png"
                                                                alt=""></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- 3nd  -->
                                            <div class="mt-4">
                                                <div class="product_card p-4">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/reources/images/product1.png" alt="">
                                                    <h2>Bread Lunch 92, - </h2>
                                                    <button href="" class="btn_primary  select_product_btn id3"
                                                        onclick="showCounter(3)">Select</button>
                                                    <div
                                                        class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid3">
                                                        <i class="count-down"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/neg.png"
                                                                alt=""></i>
                                                        <input type="text" value="3"
                                                            class="product-quantity form-control text-center incrDecrCounter" />
                                                        <i class="count-up"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/plus.png"
                                                                alt=""></i>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>

    </main>

    <?php get_footer();?>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/reources/js/script.js"></script>

