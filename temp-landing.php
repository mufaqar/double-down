<?php /* Template Name: Landing  */ 



get_header();


?>

<header class="container">
    <nav class="navbar navbar-expand-lg navbar-light mt-3 mb-3">
        <div class="container-fluid">
           <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/reources//images/logo.png" /> </a>
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
                    <a href="<?php echo home_url('login'); ?>" class="signin">Sign In</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- login section  -->

<main class="main position-relative">
<div class="container ml-auto">
    <div class="d-flex justify-content-between align-content-center align-items-center row">
        <div class="col-md-6 hero_content">
            <h1>Lunch <span>Boxes</span> For <br> Service</h1>
            <p class="mb-4">Smart job lunch with full flexibility and cost control... 123</p>
            <a href="" class="btn_primary">The Sea</a>
        </div>
        <div class="col-md-6 hero_right">
            <!-- <img src="<?php bloginfo('template_directory'); ?>/reources/images/right_banner.png" alt="" class="w-100"> -->
        </div>
    </div>

</div>


<img src="<?php bloginfo('template_directory'); ?>/reources/images/leaf.png" class="position-absolute top-0 leaf" alt="">
        <img src="<?php bloginfo('template_directory'); ?>/reources/images/mobile.png" class="position-absolute mobile" alt="">
        <img src="<?php bloginfo('template_directory'); ?>/reources/images/banner-boll.png" class="position-absolute boll" alt="">
</main>


<section class="container landing_contents">
<h1>We are your canteen 2.0 <span>Digital Management</span> <br>
    for a varied, nutritious and <br>
    <span>flexible job lunch</span>
</h1>
<p>The company saves time on administration and gets a flexible lunch arrangement where you obviously do not pay
    for lunch on the days that are canceled. Have a good lunch!</p>
<div class="row landing_step d-flex justify-content-center align-items-center mt-4">
    <div class="col-md-3">
        <div class="head d-flex">
            <div class="icon_wrapper">
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/Register.png" alt="">
            </div>
            <div>
                <h3>1. Register</h3>
                <p>Register your business in minutes. If you order before 11 am, you can have lunch the next
                    day.</p>
            </div>
        </div>
        <div class="head d-flex">
            <div class="icon_wrapper">
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/add_emp.png" alt="">
            </div>
            <div>
                <h3>2. Add employees</h3>
                <p>Each employee selects a menu and can easily cancel, change or add additional products on My
                    page.</p>
            </div>
        </div>
    </div>
    <div class="main_img col-md-6 d-flex justify-content-center align-items-center">
        <img src="<?php bloginfo('template_directory'); ?>/reources/images/center.png" alt="">
    </div>
    <div class="col-md-3">
        <div class="head d-flex">
            <div class="icon_wrapper">
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/Register.png" alt="">
            </div>
            <div>
                <h3>3. Welcome!</h3>
                <p>You will hear from us after you have registered so that we make sure that you get exactly
                    what you want. We deliver to all types of companies regardless of size.</p>
            </div>
        </div>
        <div class="head d-flex">
            <div class="icon_wrapper">
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/Register.png" alt="">
            </div>
            <div>
                <h3>4. Fix it done!</h3>
                <p>All employees receive a stress-free and good lunch that is good for the body, delivered to
                    the door by 1115 every day.</p>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center mb-5 mt-5 links">
    <a href="" class="btn_primary">Start Now</a>
    <a href="" class="btn_primary btn_sec">Order without a company agreement?</a>
</div>
</section>

<div class="mt-5 category_slider">
<h2>Price NOK 79.13</h2>
<p>Really big company? Get in touch and we will find a solution!</p>
<div class="row d-flex align-items-center _slider mt-4 mb-5">
    <div class="col-lg-2 categories_links">
        <a href="">Salatlus</a>
        <a href="">Bread Lunch</a>
        <a href="">Vegetarian</a>
        <a href="">Accessories</a>
    </div>
    <div class="col-lg-10 _slider_items">
        <div class="autoplay">
            <div class="item_wrapper">
                <div>
                    <img src="<?php bloginfo('template_directory'); ?>/reources/images/cs1.png" alt="">
                    <h5>Salatlunsj</h5>
                </div>
            </div>
            <div class="item_wrapper">
                <div>
                    <img src="<?php bloginfo('template_directory'); ?>/reources/images/cs1.png" alt="">
                    <h5>Salatlunsj</h5>
                </div>
            </div>
            <div class="item_wrapper">
                <div>
                    <img src="<?php bloginfo('template_directory'); ?>/reources/images/cs1.png" alt="">
                    <h5>Salatlunsj</h5>
                </div>
            </div>
            <div class="item_wrapper">
                <div>
                    <img src="<?php bloginfo('template_directory'); ?>/reources/images/cs1.png" alt="">
                    <h5>Salatlunsj</h5>
                </div>
            </div>
            <div class="item_wrapper">
                <div>
                    <img src="<?php bloginfo('template_directory'); ?>/reources/images/cs1.png" alt="">
                    <h5>Salatlunsj</h5>
                </div>
            </div>
        </div>
        <div class="nav_btn d-flex align-items-center">
            <div class="previous_arrow">
                <img src="<?php bloginfo('template_directory'); ?>/reources//images/left arrow.png" alt="Left Arrow">
            </div>
            <div class="next_arrow">
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/right arrow.png" alt="Right arrow">
            </div>
        </div>
        
    </div>
    <div class="mt-5 mb-5 d-flex justify-content-end startNow">
        <a href="" class="btn_primary">Start Now</a>
    </div>
</div>
</div>


<!--x login section x -->

<!-- footer  -->

<footer class="p-5">
<div class="d-flex flex-column justify-content-center align-items-center text-center">
    <!-- logo  -->
    <div class="footer_logo p-4 rounded-">
        <img src="<?php bloginfo('template_directory'); ?>/reources//images/logo.png" alt="Footer logo">
    </div>
    <p class="contact_text">Feel free to contact us by chat or reach us at:</p>
    <span>729 09 005 / hei@doubledowndish.no</span>
    <div class="links">
        <a href="">Terms </a>|
        <a href="">Privacy</a>
    </div>
    <a class="measures_text">Measures against the coronavirus</a>
    <div class="divider"></div>
    <div class="footer_social">
        <img src="<?php bloginfo('template_directory'); ?>/reources/images/facebook.png" alt="facebook">
        <img src="<?php bloginfo('template_directory'); ?>/reources/images/twitter.png" alt="twitter">
        <img src="<?php bloginfo('template_directory'); ?>/reources/images/instagram.png" alt="instagram">
    </div>
</div>
</footer>

<!-- x footer x -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php bloginfo('template_directory'); ?>/reources//js/slick-slider-script.js" type="text/javascript"></script>
   


    <?php get_footer();?>


