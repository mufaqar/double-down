<?php /* Template Name: Profile ( Personal )  */ 
get_header();
?>

<main class="launch_calandar ">
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
                            <li class="active"><a>C Business Overview</a></li>
                            <li class=""><a>Meeting</a></li>
                            <li class=""><a>Lunsjmeny</a></li>
                            <li class=""><a>Blog</a></li>
                        </ul>
                    </div>

                    <div class="logout">
                        <img src="<?php echo get_template_directory_uri(); ?>/reources/images/logout.png" alt=""><span>Log Out</span>
                    </div>

                    <img src="../reources/images/cancel.png" class="hide_nav" alt="" onclick="HideNav()">
                </div>
            </div>
            <div class="content">
                <div class="container_wrapper">
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <div class="hamburger">
                            <img src="../reources/images/hamburger.png" alt="" id="hamburgerbtn" onclick="hamburger()">
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
                                <div class='tab active'>Lunch calendar</div>
                                <div class='tab'>Settings</div>
                                <div class='tab'>Fast levering</div>
                            </div>
                            <div class='panels'>
                                <div class='panel launchClander'>

                                    <div class="calender_wrapper d-flex justify-content-between align-items-center">

                                        <div class="d-flex align-items-center __btn">
                                            <button class="btn_primary d-flex align-items-center">
                                                <i class="fa-solid fa-fork-knife"></i>
                                                <p style="margin-left: .5rem; color:white">My Lunch</p>
                                            </button>
                                            <button class="btn_primary btn_sec d-flex align-items-center">
                                                <i class="fa-solid fa-newspaper"></i>
                                                <p style="margin-left: .5rem; color:#5FB227">My Orders</p>
                                            </button>
                                        </div>

                                        <div class="info d-flex align-items-center">
                                            <h6>Pilestredet 75C | <span>Fixed 5 days a week</span></h6>

                                            <div class="calender myProfile_cal">
                                                <input type="date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion_wrapper">

                                        <div class="row">
                                            <div class="col-lg-12 mx-auto mb-5">

                                                <div class="_pro_card">
                                                    <h3>Lunch Wednesday 25.05</h3>
                                                    <p>Color party with beetroot hummus! We love hummus. Hummus is a
                                                        puree made from chickpeas, a legume we should eat a lot of for
                                                        both the body and the globe 🌱 Hummus is great both on the slice
                                                        of bread and as an accompaniment to most things. You can easily
                                                        make hummus yourself by mixing a box of chickpeas, a little
                                                        garlic, 1 tablespoon tahini, a little cumin, dried peppers, a
                                                        squeeze of lemon and a little olive oil....</p>
                                                </div>
                                                <div class="_pro_card">
                                                    <h3>Wednesday | <span>May 25</span></h3>
                                                    <p>Smoked chickpeas, beetroot hummus, coarse broccoli salsa, crudite salad and sunflower seeds.</p>
                                                </div>
                                                <div class="_pro_card">
                                                    <h3>Thursday | <span>May 26</span></h3>
                                                    <p>Vegan</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ===================================================================================
                                ===================================================================================
                                =================================================================================== -->
                                <!-- setting tab content  -->
                                <!-- ===================================================================================
                                ===================================================================================
                                =================================================================================== -->
                                <div class='panel launchClander setting_tab'>
                                    
                                    <div class="deatil_card d-flex justify-content-between align-items-center">
                                        <div class="info">
                                            <h3>Fast Levering</h3>
                                            <p>5 Days</p>
                                        </div>

                                        <div class="">
                                            <a href="" class="btn_primary">Change</a>
                                        </div>
                                    </div>
                                    <!-- 2nd -->
                                    <div class="deatil_card d-flex justify-content-between align-items-center">
                                        <div class="info">
                                            <h3>Delivery Address</h3>
                                            <p>Pilestredet 75C | 0354 | OSLO<br>
                                                You pay NOK 0, - in shipping. * price ex. 15% VAT<br>
                                                <strong><span>Phone:</span></strong> 9297418517 | <strong><span>Email:</span></strong> abc@email.com
                                                </p>
                                        </div>
                                        <div class="">
                                            <a href="" class="btn_primary">See or Overrid</a>
                                        </div>
                                    </div>
                                    <!-- 3rd  -->
                                    <div class="deatil_card d-flex justify-content-between align-items-center">
                                        <div class="info">
                                            <h3>Corporate Agreement</h3>
                                            <p>Oranchy AS Sponge 20%</p>
                                                <p>
                                                    <strong><span>Admin 1: </span></strong> 
                                                    <span class="underline">admin@oranchy.com</span>
                                                </p>
                                        </div>
                                        
                                    </div>

                                    <!-- 4th  -->
                                    <div class="deatil_card d-flex justify-content-between align-items-center">
                                        <div class="info">
                                            <h3>Profile</h3>
                                            <p>Oranchy AS<br>
                                                admin@email.com <br>
                                                <span>94974967</span></p>
                                            
                                        </div>
                                        <div class="">
                                            <a href="" class="btn_primary">Change</a>
                                        </div>
                                    </div>

                                    <!-- 5th  -->
                                    <div class="deatil_card d-flex justify-content-between align-items-center">
                                        <div class="info">
                                            <h3>Payment</h3>
                                            <p>**** **** **** 2124</p>
                                        </div>
                                        <div class="">
                                            <a href="" class="btn_primary">Change</a>
                                        </div>
                                    </div>

                                    <!-- 6th  -->
                                    <div class="deatil_card d-flex justify-content-between align-items-center">
                                        <div class="info">
                                            <h3>Allergies and Others</h3>
                                            <p>Vegan</p>
                                        </div>
                                        <div class="">
                                            <a href="" class="btn_primary">Select</a>
                                        </div>
                                    </div>

                                     <!-- 7th  -->
                                     <div class="deatil_card d-flex justify-content-between align-items-center">
                                        <div class="info">
                                            <h3>How can we contact you?</h3>
                                            <p>How can we contact you?</p>
                                        </div>
                                        <div class="">
                                            <a href="" class="btn_primary">Select</a>
                                        </div>
                                    </div>

                                     <!-- 8th  -->
                                     <div class="deatil_card d-flex justify-content-between align-items-center mb-5">
                                        <div class="info">
                                            <h3>Invoice</h3>
                                            <p>Overview</p>
                                        </div>
                                        <div class="">
                                            <a href="" class="btn_primary">Select</a>
                                        </div>
                                    </div>

                                </div>


                                <!-- ===================================================================================
                                ===================================================================================
                                =================================================================================== -->
                                <!-- Fast levering tab content  -->
                                <!-- ===================================================================================
                                ===================================================================================
                                =================================================================================== -->
                                <div class='panel launchClander Fixed_delivery'>
                                    <h2>Fixed delivery to company</h2>
                                    <p>Here you can easily choose between or cancel the various lunch options from day
                                        to day. If you want to change a fixed subscription, do so <a href="">her.</a>
                                    </p>
                                    <h2 class="mt-4"><span style="color: #5FB227">1 -</span> Lunch Boxes</h2>
                                    <div class="product_wrapper row mb-4">
                                        <div class="col-md-6 col-lg-4 mt-4">
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
                                        <div class="col-md-6 col-lg-4 mt-4">
                                            <div class="product_card p-4">
                                                <img src="<?php echo get_template_directory_uri(); ?>/reources/images/product1.png" alt="">
                                                <h2>Bread Lunch 91, - </h2>
                                                <button href="" class="btn_primary  select_product_btn id2"
                                                    onclick="showCounter(2)">Select</button>

                                                <div
                                                    class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid2">
                                                    <i class="count-down"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/neg.png"
                                                            alt=""></i>
                                                    <input type="text" value="1"
                                                        class="product-quantity form-control text-center incrDecrCounter" />
                                                    <i class="count-up"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/plus.png"
                                                            alt=""></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 3rd  -->
                                        <div class="col-md-6 col-lg-4 mt-4">
                                            <div class="product_card p-4">
                                                <img src="<?php echo get_template_directory_uri(); ?>/reources/images/product1.png" alt="">
                                                <h2>Bread Lunch 91, - </h2>
                                                <button href="" class="btn_primary  select_product_btn id3"
                                                    onclick="showCounter(3)">Select</button>

                                                <div
                                                    class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid3">
                                                    <i class="count-down"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/neg.png"
                                                            alt=""></i>
                                                    <input type="text" value="1"
                                                        class="product-quantity form-control text-center incrDecrCounter" />
                                                    <i class="count-up"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/plus.png"
                                                            alt=""></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mt-5 mb-4 accessories">
                                        <h2 class="mt-4"><span style="color: #5FB227">2 -</span> Accessories</h2>
                                        <a href="" class="btn_primary d-flex align-items-center">
                                            <img src="../reources/images//positive.png" alt="">
                                            <p>Allergy Pass</p>
                                        </a>
                                    </div>

                                    <div class="product_wrapper row mb-4">
                                        <div class="col-md-6 col-lg-4 mt-4">
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
                                        <div class="col-md-6 col-lg-4 mt-4">
                                            <div class="product_card p-4">
                                                <img src="<?php echo get_template_directory_uri(); ?>/reources/images/product1.png" alt="">
                                                <h2>Bread Lunch 91, - </h2>
                                                <button href="" class="btn_primary  select_product_btn id2"
                                                    onclick="showCounter(2)">Select</button>

                                                <div
                                                    class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid2">
                                                    <i class="count-down"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/neg.png"
                                                            alt=""></i>
                                                    <input type="text" value="1"
                                                        class="product-quantity form-control text-center incrDecrCounter" />
                                                    <i class="count-up"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/plus.png"
                                                            alt=""></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 3rd  -->
                                        <div class="col-md-6 col-lg-4 mt-4">
                                            <div class="product_card p-4">
                                                <img src="<?php echo get_template_directory_uri(); ?>/reources/images/product1.png" alt="">
                                                <h2>Bread Lunch 91, - </h2>
                                                <button href="" class="btn_primary  select_product_btn id3"
                                                    onclick="showCounter(3)">Select</button>

                                                <div
                                                    class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid3">
                                                    <i class="count-down"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/neg.png"
                                                            alt=""></i>
                                                    <input type="text" value="1"
                                                        class="product-quantity form-control text-center incrDecrCounter" />
                                                    <i class="count-up"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/plus.png"
                                                            alt=""></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 4th  -->
                                        <div class="col-md-6 col-lg-4 mt-4">
                                            <div class="product_card p-4">
                                                <img src="<?php echo get_template_directory_uri(); ?>/reources/images/product1.png" alt="">
                                                <h2>Bread Lunch 91, - </h2>
                                                <button href="" class="btn_primary  select_product_btn id3"
                                                    onclick="showCounter(3)">Select</button>

                                                <div
                                                    class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid3">
                                                    <i class="count-down"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/neg.png"
                                                            alt=""></i>
                                                    <input type="text" value="1"
                                                        class="product-quantity form-control text-center incrDecrCounter" />
                                                    <i class="count-up"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/plus.png"
                                                            alt=""></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 5th  -->
                                        <div class="col-md-6 col-lg-4 mt-4">
                                            <div class="product_card p-4">
                                                <img src="<?php echo get_template_directory_uri(); ?>/reources/images/product1.png" alt="">
                                                <h2>Bread Lunch 91, - </h2>
                                                <button href="" class="btn_primary  select_product_btn id3"
                                                    onclick="showCounter(3)">Select</button>

                                                <div
                                                    class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid3">
                                                    <i class="count-down"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/neg.png"
                                                            alt=""></i>
                                                    <input type="text" value="1"
                                                        class="product-quantity form-control text-center incrDecrCounter" />
                                                    <i class="count-up"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/plus.png"
                                                            alt=""></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 6th  -->
                                        <div class="col-md-6 col-lg-4 mt-4">
                                            <div class="product_card p-4">
                                                <img src="<?php echo get_template_directory_uri(); ?>/reources/images/product1.png" alt="">
                                                <h2>Bread Lunch 91, - </h2>
                                                <button href="" class="btn_primary  select_product_btn id3"
                                                    onclick="showCounter(3)">Select</button>

                                                <div
                                                    class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid3">
                                                    <i class="count-down"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/neg.png"
                                                            alt=""></i>
                                                    <input type="text" value="1"
                                                        class="product-quantity form-control text-center incrDecrCounter" />
                                                    <i class="count-up"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/plus.png"
                                                            alt=""></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mt-1 mb-4 accessories">
                                        <h2 class="mt-4"><span style="color: #5FB227"></span> Weekdays</h2>
                                    </div>

                                    <div class="week_days">
                                        <form class="d-flex justify-content-between flex-wrap">
                                            <div class="d-flex align-items-center">
                                                <input type="checkbox" id="weekday-1" name="weekday-1" value="Monday"
                                                    checked>
                                                <label for="weekday-1">Monday</label>
                                            </div>
                                            <div>
                                                <input type="checkbox" id="weekday-2" name="weekday-2" value="Tuesday">
                                                <label for="weekday-2">Tuesday</label>
                                            </div>
                                            <div>
                                                <input type="checkbox" id="weekday-3" name="weekday-3"
                                                    value="Wednesday">
                                                <label for="weekday-3">Wednesday</label>
                                            </div>
                                            <div>
                                                <input type="checkbox" id="weekday-4" name="weekday-4" value="Thursday">
                                                <label for="weekday-4">Thursday</label>
                                            </div>
                                            <div>
                                                <input type="checkbox" id="weekday-5" name="weekday-5" value="Friday">
                                                <label for="weekday-5">Friday</label>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="vat">
                                        <h6 class=" d-flex justify-content-end mt-4">* All prices incl. 15% VAT</h6>
                                    </div>

                                    <div class="mt-5 mb-5 d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <a href="" class="btn_primary d-block" style="margin-right: 1rem;">
                                                Weekly</a>
                                            <a href="" class="btn_primary btn_sec d-block">Daily</a>
                                        </div>
                                        <div>
                                            <a href="" class="btn_primary">Save</a>
                                        </div>
                                    </div>

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




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/reources/js/script.js"></script>

