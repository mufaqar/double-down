<?php /* Template Name: Caleddar  */ 



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
                        <li class="active"><a>Business Overview</a></li>
                        <li class=""><a>Meeting</a></li>
                        <li class=""><a>Lunsjmeny</a></li>
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
                    <img src="<?php bloginfo('template_directory'); ?>/reources/images/logout.png" alt=""><span>Log Out</span>
                </div>

                <img src="<?php bloginfo('template_directory'); ?>/reources/mages/cancel.png" class="hide_nav" alt="" onclick="HideNav()">
            </div>
            </div>
            <div class="content">
                <div class="container_wrapper">
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <div class="hamburger">
                            <img src="<?php bloginfo('template_directory'); ?>/reources/mages/hamburger.png" alt="" id="hamburgerbtn" onclick="hamburger()">
                        </div>

                        <div class="proofile_info d-flex align-items-center">
                            <div class="user">
                                <h6>Hey, Jose!</h6>
                                <p>Agreement: Oranchy AS</p>
                            </div>
                            <img src="<?php bloginfo('template_directory'); ?>/reources/images/profile.webp" alt="">
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
                                    <h2>Business lunch calendar</h2>
                                    <p>Here you can easily choose between or cancel the various lunch options from day
                                        to day. If you want to change a fixed subscription, do so <a href="">her.</a>
                                    </p>
                                    <div class="calender_wrapper d-flex justify-content-between align-items-center">
                                        <div class="calender">
                                            <input type="date">
                                        </div>
                                        <div class="info">
                                            <h6>Total this Week | <span>NOK 0, -</span></h6>
                                            <p>* All prices incl. 15% VAT</p>
                                        </div>
                                    </div>
                                    <div class="accordion_wrapper">


                                        <div class="row">
                                            <div class="col-lg-12 mx-auto">
                                                <!-- Accordion -->
                                                <div id="accordionExample" class="accordion">

                                                    <!-- Accordion item 1 -->
                                                    <div class="card">
                                                        <div id="headingOne"
                                                            class="card-header bg-white shadow-sm border-0 py-4">
                                                            <div class="mb-0 d-flex align-items-center">
                                                                <button type="button" data-toggle="collapse"
                                                                    data-target="#collapseOne" aria-expanded="true"
                                                                    aria-controls="collapseOne"
                                                                    class="btn text-dark font-weight-bold text-uppercase collapsible-link shadow-none">
                                                                    Tuesday | <span>June 7</span>
                                                                </button>
                                                                <h6 class="text-nowrap mb-0">No Booking</h6>
                                                            </div>
                                                        </div>
                                                        <div id="collapseOne" aria-labelledby="headingOne"
                                                            data-parent="#accordionExample"
                                                            class="collapse show accordion_content">
                                                            <div class="card-body p-md-4 border-bottom">
                                                                <div class="food_info row">
                                                                    <div class="col-md-6 first border-end">
                                                                        <h3>Bread Lunch | <span> NOK 91</span></h3>
                                                                        <p>Here you can easily choose between or cancel
                                                                            the various lunch options from day to day.
                                                                            If you want to change a fixed subscription,
                                                                            do so <a href="">her.</a></p>
                                                                        <div class="mt-4 mb-4 mb-md-0 mt-md-5">
                                                                            <a href="" class="btn_primary">Select</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mt-4 mt-md-0 sec_content">
                                                                        <h3>Cinnamon swirl |<span> NOK 91</span></h3>
                                                                        <p>Here you can easily choose between or cancel
                                                                            the various lunch options from day to day.
                                                                            If you want to change a fixed subscription,
                                                                            do so <a href="">her.</a></p>
                                                                        <div class="mt-4 mb-4 mb-md-0 mt-md-5">
                                                                            <a href="" class="btn_primary">Select</a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="food_card_wrapper row">
                                                                <div class="food_card col-lg-3 col-md-6 ">
                                                                    <img src="<?php bloginfo('template_directory'); ?>/reources/images//food1.png" alt="">
                                                                    <h4 class="mt-2">Bread Slice or Roll</h4>
                                                                    <p>Nok 15</p>
                                                                </div>
                                                                <div class="food_card col-lg-3 col-md-6">
                                                                    <img src="<?php bloginfo('template_directory'); ?>/reources/images//food2.png" alt="">
                                                                    <h4 class="mt-2">Today’s Juice</h4>
                                                                    <p>Nok 22</p>
                                                                </div>
                                                                <div class="food_card col-lg-3 col-md-6">
                                                                    <img src="<?php bloginfo('template_directory'); ?>/reources/images//food3.png" alt="">
                                                                    <h4 class="mt-2">Today’s Juice</h4>
                                                                    <p>Nok 25</p>
                                                                </div>
                                                                <div class="food_card col-lg-3 col-md-6">
                                                                    <img src="<?php bloginfo('template_directory'); ?>/reources/images//food4.png" alt="">
                                                                    <h4 class="mt-2">Bread Slice or Roll</h4>
                                                                    <p>Nok 15</p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="accordion_btns d-flex justify-content-end mb-5 mr-3">
                                                                <a class="btn_primary btn_sec" href="">Add
                                                                    allergy-friendly</a>
                                                                <a class="btn_primary" href="">Save</a>
                                                            </div>
                                                        </div>
                                                    </div><!-- End -->

                                                    <!-- Accordion item 2 -->
                                                    <div class="card">
                                                        <div id="headingtwo"
                                                            class="card-header bg-white shadow-sm border-0 py-4">
                                                            <div class="mb-0 d-flex align-items-center">
                                                                <button type="button" data-toggle="collapse"
                                                                    data-target="#headingtwo" aria-expanded="true"
                                                                    aria-controls="headingtwo"
                                                                    class="btn text-dark font-weight-bold text-uppercase collapsible-link shadow-none">
                                                                    Thursday | <span>June 7</span>
                                                                </button>
                                                                <h6 class="text-nowrap mb-0">No Booking</h6>
                                                            </div>
                                                        </div>
                                                        <div id="headingtwo" aria-labelledby="headingOne"
                                                            data-parent="#accordionExample"
                                                            class="collapse accordion_content">
                                                            <div class="card-body p-md-5">

                                                            </div>
                                                        </div>
                                                    </div><!-- End -->

                                                    <!-- Accordion item 3 -->
                                                    <div class="card">
                                                        <div id="headingthree"
                                                            class="card-header bg-white shadow-sm border-0 py-4">
                                                            <div class="mb-0 d-flex align-items-center">
                                                                <button type="button" data-toggle="collapse"
                                                                    data-target="#headingthree" aria-expanded="true"
                                                                    aria-controls="headingthree"
                                                                    class="btn text-dark font-weight-bold text-uppercase collapsible-link shadow-none">
                                                                    Friday | <span>June 7</span>
                                                                </button>
                                                                <h6 class="text-nowrap mb-0">No Booking</h6>
                                                            </div>
                                                        </div>
                                                        <div id="headingthree" aria-labelledby="headingOne"
                                                            data-parent="#accordionExample"
                                                            class="collapse accordion_content">
                                                            <div class="card-body p-md-5">

                                                            </div>
                                                        </div>
                                                    </div><!-- End -->

                                                    <!-- Accordion item 4 -->
                                                    <div class="card">
                                                        <div id="headingfour"
                                                            class="card-header bg-white shadow-sm border-0 py-4">
                                                            <div class="mb-0 d-flex align-items-center">
                                                                <button type="button" data-toggle="collapse"
                                                                    data-target="#headingfour" aria-expanded="true"
                                                                    aria-controls="headingfour"
                                                                    class="btn text-dark font-weight-bold text-uppercase collapsible-link shadow-none">
                                                                    Saturday | <span>June 7</span>
                                                                </button>
                                                                <h6 class="text-nowrap mb-0">No Booking</h6>
                                                            </div>
                                                        </div>
                                                        <div id="headingfour" aria-labelledby="headingOne"
                                                            data-parent="#accordionExample"
                                                            class="collapse accordion_content">
                                                            <div class="card-body p-md-5">

                                                            </div>
                                                        </div>
                                                    </div><!-- End -->

                                                </div><!-- End -->
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
                                    <h2>Corporate agreement settings</h2>
                                    <p>As a company administrator, you can get an overview of and make changes
                                        to
                                        the
                                        company agreement here. Using the menu above, you can also see the
                                        company's
                                        lunch calendar, or change the regular deliveries.</p>
                                    <div class="deatil_card d-flex justify-content-between align-items-center">
                                        <div class="info">
                                            <h3>Details of the agreement</h3>
                                            <p>The company pays 20% or Nok of each luch</p>
                                            <p class="mt-1">Start date: Friday, May 20, 2022</p>
                                            <ul class="mt-2">
                                                <li><span>Location 1:</span> Pilestredet 75C | 0354 | OSLO</li>
                                                <li><span>Location 2:</span> Pilestredet 75C | 0354 | OSLO</li>
                                            </ul>
                                        </div>

                                        <div class="">
                                            <a href="" class="btn_primary">Change</a>
                                        </div>
                                    </div>
                                    <!-- 2nd -->
                                    <div class="deatil_card d-flex justify-content-between align-items-center">
                                        <div class="info">
                                            <h3>Employees in the agreement</h3>
                                            <p>1 employee : Sumit</p>
                                        </div>
                                        <div class="">
                                            <a href="" class="btn_primary">See or Overrid</a>
                                        </div>
                                    </div>
                                    <!-- 3rd  -->
                                    <div class="deatil_card d-flex justify-content-between align-items-center">
                                        <div class="info">
                                            <h3>Meeting Food</h3>
                                            <p>Everyone deserves good food - even those you
                                                have invited to a meeting!</p>
                                        </div>
                                        <div class="">
                                            <a href="" class="btn_primary">Order Meeting Food</a>
                                        </div>
                                    </div>

                                    <!-- 4th  -->
                                    <div class="deatil_card d-flex justify-content-between align-items-center">
                                        <div class="info">
                                            <h3>Delivery Address</h3>
                                            <p>Pilestredet 75C | 0354 | OSLO <br>
                                                The company pays NOK 69 in shipping. * price ex. 15% VAT</p>
                                            <ul class="mt-2">
                                                <li><span>Extra Info:</span> Pilestredet</li>
                                            </ul>
                                        </div>
                                        <div class="">
                                            <a href="" class="btn_primary">Change</a>
                                        </div>
                                    </div>

                                    <!-- 5th  -->
                                    <div class="deatil_card d-flex justify-content-between align-items-center">
                                        <div class="info">
                                            <h3>Daily Overview</h3>
                                            <p>Daily overview of orders</p>
                                        </div>
                                        <div class="">
                                            <a href="" class="btn_primary">See</a>
                                        </div>
                                    </div>

                                    <!-- 6th  -->
                                    <div class="deatil_card d-flex justify-content-between align-items-center">
                                        <div class="info">
                                            <h3>Invoice</h3>
                                            <p>Overview</p>
                                        </div>
                                        <div class="">
                                            <a href="" class="btn_primary">See</a>
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
                                                <img src="<?php bloginfo('template_directory'); ?>/reources/images/product1.png" alt="">
                                                <h2>Bread Lunch 91, - </h2>
                                                <button href="" class="btn_primary  select_product_btn id1"
                                                    onclick="showCounter(1)">Select</button>

                                                <div
                                                    class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid1">
                                                    <i class="count-down"><img src="<?php bloginfo('template_directory'); ?>/reources/images/neg.png"
                                                            alt=""></i>
                                                    <input type="text" value="1"
                                                        class="product-quantity form-control text-center incrDecrCounter" />
                                                    <i class="count-up"><img src="<?php bloginfo('template_directory'); ?>/reources/images/plus.png"
                                                            alt=""></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 2nd  -->
                                        <div class="col-md-6 col-lg-4 mt-4">
                                            <div class="product_card p-4">
                                                <img src="<?php bloginfo('template_directory'); ?>/reources/images/product1.png" alt="">
                                                <h2>Bread Lunch 91, - </h2>
                                                <button href="" class="btn_primary  select_product_btn id2"
                                                    onclick="showCounter(2)">Select</button>

                                                <div
                                                    class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid2">
                                                    <i class="count-down"><img src="<?php bloginfo('template_directory'); ?>/reources/images/neg.png"
                                                            alt=""></i>
                                                    <input type="text" value="1"
                                                        class="product-quantity form-control text-center incrDecrCounter" />
                                                    <i class="count-up"><img src="<?php bloginfo('template_directory'); ?>/reources/images/plus.png"
                                                            alt=""></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 3rd  -->
                                        <div class="col-md-6 col-lg-4 mt-4">
                                            <div class="product_card p-4">
                                                <img src="<?php bloginfo('template_directory'); ?>/reources/images/product1.png" alt="">
                                                <h2>Bread Lunch 91, - </h2>
                                                <button href="" class="btn_primary  select_product_btn id3"
                                                    onclick="showCounter(3)">Select</button>

                                                <div
                                                    class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid3">
                                                    <i class="count-down"><img src="<?php bloginfo('template_directory'); ?>/reources/images/neg.png"
                                                            alt=""></i>
                                                    <input type="text" value="1"
                                                        class="product-quantity form-control text-center incrDecrCounter" />
                                                    <i class="count-up"><img src="<?php bloginfo('template_directory'); ?>/reources/images/plus.png"
                                                            alt=""></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mt-5 mb-4 accessories">
                                        <h2 class="mt-4"><span style="color: #5FB227">2 -</span> Accessories</h2>
                                        <a href="" class="btn_primary d-flex align-items-center">
                                            <img src="<?php bloginfo('template_directory'); ?>/reources/images/positive.png" alt="">
                                            <p>Allergy Pass</p>
                                        </a>
                                    </div>

                                    <div class="product_wrapper row mb-4">
                                        <div class="col-md-6 col-lg-4 mt-4">
                                            <div class="product_card p-4">
                                                <img src="<?php bloginfo('template_directory'); ?>/reources/images/product1.png" alt="">
                                                <h2>Bread Lunch 91, - </h2>
                                                <button href="" class="btn_primary  select_product_btn id1"
                                                    onclick="showCounter(1)">Select</button>

                                                <div
                                                    class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid1">
                                                    <i class="count-down"><img src="<?php bloginfo('template_directory'); ?>/reources/images/neg.png"
                                                            alt=""></i>
                                                    <input type="text" value="1"
                                                        class="product-quantity form-control text-center incrDecrCounter" />
                                                    <i class="count-up"><img src="<?php bloginfo('template_directory'); ?>/reources/images/plus.png"
                                                            alt=""></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 2nd  -->
                                        <div class="col-md-6 col-lg-4 mt-4">
                                            <div class="product_card p-4">
                                                <img src="<?php bloginfo('template_directory'); ?>/reources/images/product1.png" alt="">
                                                <h2>Bread Lunch 91, - </h2>
                                                <button href="" class="btn_primary  select_product_btn id2"
                                                    onclick="showCounter(2)">Select</button>

                                                <div
                                                    class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid2">
                                                    <i class="count-down"><img src="<?php bloginfo('template_directory'); ?>/reources/images/neg.png"
                                                            alt=""></i>
                                                    <input type="text" value="1"
                                                        class="product-quantity form-control text-center incrDecrCounter" />
                                                    <i class="count-up"><img src="<?php bloginfo('template_directory'); ?>/reources/images/plus.png"
                                                            alt=""></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 3rd  -->
                                        <div class="col-md-6 col-lg-4 mt-4">
                                            <div class="product_card p-4">
                                                <img src="<?php bloginfo('template_directory'); ?>/reources/images/product1.png" alt="">
                                                <h2>Bread Lunch 91, - </h2>
                                                <button href="" class="btn_primary  select_product_btn id3"
                                                    onclick="showCounter(3)">Select</button>

                                                <div
                                                    class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid3">
                                                    <i class="count-down"><img src="<?php bloginfo('template_directory'); ?>/reources/images/neg.png"
                                                            alt=""></i>
                                                    <input type="text" value="1"
                                                        class="product-quantity form-control text-center incrDecrCounter" />
                                                    <i class="count-up"><img src="<?php bloginfo('template_directory'); ?>/reources/images/plus.png"
                                                            alt=""></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 4th  -->
                                        <div class="col-md-6 col-lg-4 mt-4">
                                            <div class="product_card p-4">
                                                <img src="<?php bloginfo('template_directory'); ?>/reources/images/product1.png" alt="">
                                                <h2>Bread Lunch 91, - </h2>
                                                <button href="" class="btn_primary  select_product_btn id3"
                                                    onclick="showCounter(3)">Select</button>

                                                <div
                                                    class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid3">
                                                    <i class="count-down"><img src="<?php bloginfo('template_directory'); ?>/reources/images/neg.png"
                                                            alt=""></i>
                                                    <input type="text" value="1"
                                                        class="product-quantity form-control text-center incrDecrCounter" />
                                                    <i class="count-up"><img src="<?php bloginfo('template_directory'); ?>/reources/images/plus.png"
                                                            alt=""></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 5th  -->
                                        <div class="col-md-6 col-lg-4 mt-4">
                                            <div class="product_card p-4">
                                                <img src="<?php bloginfo('template_directory'); ?>/reources/images/product1.png" alt="">
                                                <h2>Bread Lunch 91, - </h2>
                                                <button href="" class="btn_primary  select_product_btn id3"
                                                    onclick="showCounter(3)">Select</button>

                                                <div
                                                    class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid3">
                                                    <i class="count-down"><img src="<?php bloginfo('template_directory'); ?>/reources/images/neg.png"
                                                            alt=""></i>
                                                    <input type="text" value="1"
                                                        class="product-quantity form-control text-center incrDecrCounter" />
                                                    <i class="count-up"><img src="<?php bloginfo('template_directory'); ?>/reources/images/plus.png"
                                                            alt=""></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 6th  -->
                                        <div class="col-md-6 col-lg-4 mt-4">
                                            <div class="product_card p-4">
                                                <img src="<?php bloginfo('template_directory'); ?>/reources/images/product1.png" alt="">
                                                <h2>Bread Lunch 91, - </h2>
                                                <button href="" class="btn_primary  select_product_btn id3"
                                                    onclick="showCounter(3)">Select</button>

                                                <div
                                                    class="d-none product_counter mt-2 d-flex justify-content-center align-items-center cid3">
                                                    <i class="count-down"><img src="<?php bloginfo('template_directory'); ?>/reources/images/neg.png"
                                                            alt=""></i>
                                                    <input type="text" value="1"
                                                        class="product-quantity form-control text-center incrDecrCounter" />
                                                    <i class="count-up"><img src="<?php bloginfo('template_directory'); ?>/reources/images/plus.png"
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
                                            <a href="" class="btn_primary d-block" style="margin-right: 1rem;"> Weekly</a>
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



   <script type="text/javascript">
   
   jQuery(document).ready(function($) {
	   

	  
		
		
	$("#addEducation").submit(function(e) { 
	


        e.preventDefault();
        var username = jQuery('#username').val();
		var email = jQuery('#email').val();
        var password = jQuery('#password').val();	

        jQuery.ajax({
          type:"POST",
          url:"<?php echo admin_url('admin-ajax.php'); ?>",
          data: {
            action: "usersignup",
            username : username,
			email : email,
			password : password
          },
          success: function(response){
            console.log(response);
			  $('.error').html(response);
			//  alert(response); 
			  // setInterval('location.reload()', 1000);
			  
       
          },
          error: function(results) {
			   jQuery('.register-message').text(fail).show();

          }
        });
      });
	  
	  jQuery("#updateForm").submit(function(e) {});
		   
	
	});

	</script>


