<?php /* Template Name: Menu ( Personal )  */ 
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
                        <li class="active"><a>My Profile</a></li>
                        <li class=""><a>My Orders</a></li>
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

                    <div class="custom_container catering_wrapper mt-5 mb-5">
                        <div class="catering_menu">
                            <a href="">Bread Lunch</a>
                            <a href="" class="_active">Salat</a>
                            <a href="">Vegetarian</a>
                        </div>
                        <div class="calender_wrapper d-flex justify-content-between align-items-center mt-5">
                            <h2>This week's lunch menu</h2>
                            <div class="calender">
                                <input type="date">
                            </div>
                        </div>
                        <div class="catering_card_wrapper">

                            <div class="catering_card _pro_salat">
                                <h3>Monday | <span>May 22</span></h3>
                                <p class="mt-3">Red lentils with hot spices, salt-baked celery root, baked tomatoes, sugar peas, spinach, tahini dressing and pumpkin seeds.</p>
                                <div class="row">
                                    <div class="col-md-9">
                                        <h6 class="mt-2">Contains:</h6>
                                        <p>Sesame seeds, Celery</p>
                                        <p>Nutritional content: 520 kcal, 31g carbohydrate, 31g fat, 21g protein</p>
                                    </div>
                                    <div class="col-md-3 level d-flex justify-content-end" >
                                        <div class="d-flex justify-content-center align-items-center flex-column ">
                                            <img src="<?php echo get_template_directory_uri(); ?>/reources/images/level.png" alt="level">
                                            <h6 class="mt-2">0.4 <sub>kg CO e</sub></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="catering_card _pro_salat">
                                <h3>Tuesday | <span>May 23</span></h3>
                                <p class="mt-3">Lightly smoked chicken breast with bulgur and roasted chickpeas. Salad with mango, pomegranate, coriander and spring onion. Topped with curry and coconut dressing and puffed wild rice with nori.</p>
                                <div class="row">
                                    <div class="col-md-9">
                                        <h6 class="mt-2">Contains:</h6>
                                        <p>Gluten (oats, wheat, rye, spelled, barley)</p>
                                        <p> Nutritional content: 590 kcal, 75g carbohydrate, 16g fat, 32g protein</p>
                                    </div>
                                    <div class="col-md-3 level d-flex justify-content-end" >
                                        <div class="d-flex justify-content-center align-items-center flex-column ">
                                            <img src="<?php echo get_template_directory_uri(); ?>/reources/images/level.png" alt="level">
                                            <h6 class="mt-2">0.4 <sub>kg CO e</sub></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="catering_card _pro_salat">
                                <h3>Wednesday |  <span>May 24</span></h3>
                                <p class="mt-3">Grated pork, beetroot hummus, coarse broccoli salsa, crudite salad and sunflower seeds.</p>
                                <div class="row">
                                    <div class="col-md-9">
                                        <h6 class="mt-2">Contains:</h6>
                                        <p>Sesame seeds, Sulfite</p>
                                        <p>Nutritional content: 600 kcal, 40g carbohydrate, 29g fat, 35g protein</p>
                                    </div>
                                    <div class="col-md-3 level d-flex justify-content-end" >
                                        <div class="d-flex justify-content-center align-items-center flex-column ">
                                            <img src="<?php echo get_template_directory_uri(); ?>/reources/images/level.png" alt="level">
                                            <h6 class="mt-2">0.4 <sub>kg CO e</sub></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="catering_card _pro_salat">
                                <h3>Thursday | <span>May 25</span></h3>
                                <p class="mt-3">Christ's Ascension</p>   
                            </div>

                            <div class="catering_card _pro_salat">
                                <h3>Friday | <span>May 26</span></h3>
                                <p class="mt-3">Wholemeal pasta with smoked salmon, spring onions, grilled cauliflower, kale and peas. Topped with crispy quinoa and kesam and citrus dressing.</p>
                                <div class="row">
                                    <div class="col-md-9">
                                        <h6 class="mt-2">Contains:</h6>
                                        <p>s: Gluten (oats, wheat, rye, spelled, barley), Milk, Fish</p>
                                        <p> Nutritional content: 655 kcal, 67g carbohydrate, 27g fat, 30g protein</p>
                                    </div>
                                    <div class="col-md-3 level d-flex justify-content-end" >
                                        <div class="d-flex justify-content-center align-items-center flex-column ">
                                            <img src="<?php echo get_template_directory_uri(); ?>/reources/images/level.png" alt="level">
                                            <h6 class="mt-2">0.4 <sub>kg CO e</sub></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <div class="mt-5 bottom_level d-flex justify-content-between align-items-center">
                           
                            <div class="d-flex align-items-center">
                                <img src="<?php echo get_template_directory_uri(); ?>/reources/images//level.png" alt="">
                                <div>
                                    <h6>Lav</h6>
                                    <p>0.1-0.5</p>
                                    <p>kg CO2<sub>e</sub></p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <img src="<?php echo get_template_directory_uri(); ?>/reources/images//level.png" alt="">
                                <div>
                                    <h6>Medium</h6>
                                    <p>0.1-0.5</p>
                                    <p>kg CO2<sub>e</sub></p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <img src="<?php echo get_template_directory_uri(); ?>/reources/images//level.png" alt="">
                                <div>
                                    <h6>Hight</h6>
                                    <p>0.1-0.5</p>
                                    <p>kg CO2<sub>e</sub></p>
                                </div>
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

