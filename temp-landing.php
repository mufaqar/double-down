<?php /* Template Name: Landing  */ 


get_header('landing');
?>
<!-- login section  -->
<main class="main overflow-hidden">
 <div class="position-relative">
 <div class="container ml-auto">
    <div class="d-flex justify-content-between align-content-center align-items-center row">
        <div class="col-md-6 hero_content">
            <h1>Lunsjbokser til din <br> bedrift</h1>
            <p class="mb-4">Smart jobblunsj med full fleksibilitet og kostnadskontroll...</p>
            <a href="#work" class="btn_primary">Les mer</a>
        </div>
        <div class="col-md-6 hero_right">
           
        </div>
    </div>
</div>
        <img src="<?php bloginfo('template_directory'); ?>/reources/images/leaf.png" class="position-absolute top-0 leaf" alt="">
       
        <img src="<?php bloginfo('template_directory'); ?>/reources/images/banner-boll.png" class="position-absolute boll" alt="">
 </div>
</main>


<section class="container landing_contents" id="work">
    <h1>Vi er din 2.0 kantine, <span>digital styring</span> <br>
        for a varied, nutritious and <br>
        <span>flexible job lunch</span>
    </h1>
<p>The company saves time on administration and gets a flexible lunch arrangement where you obviously do not pay
    for lunch on the days that are canceled. Have a good lunch!</p>
<div class="row landing_step d-flex justify-content-center align-items-center mt-4">
    <div class="col-md-3">
        <div class="head d-flex">
            <div class="icon_wrapper">
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/Register.png" alt="Register" >
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
    <a href="<?php echo home_url('/create-business-agreement'); ?>" class="btn_primary">Start Now</a>
    <a href="<?php echo home_url('/sign-up'); ?>" class="btn_primary btn_sec">Order without a company agreement?</a>
</div>
</section>

<div class="mt-5 category_slider">
<h2>Price NOK 79.13</h2>
<p>Really big company? Get in touch and we will find a solution!</p>
<div class="row d-flex align-items-center _slider mt-4">
    <!-- <div class="col-lg-2 categories_links">
        <a href="">	Salad Lunch</a>
        <a href="">Bread Lunch</a>
        <a href="">Wrap Lunch</a>
        <a href="">Additional</a>
      
    </div> -->
    <div class="col-lg-10 _slider_items">
        <div class="autoplay">
        


            <div class="item_wrapper">
                <div><img src="<?php bloginfo('template_directory'); ?>/reources/images/salad.jpg" alt="">						
                    <h5>Salad lunch</h5>
                </div>
            </div>
            <div class="item_wrapper">
                <div><img src="<?php bloginfo('template_directory'); ?>/reources/images/bread.jpg" alt="">						
                    <h5>Bread lunch,</h5>
                </div>
            </div>
            <div class="item_wrapper">
                <div><img src="<?php bloginfo('template_directory'); ?>/reources/images/wrap.jpg" alt="">						
                    <h5>Wrap lunch</h5>
                </div>
            </div>
            <div class="item_wrapper">
                <div><img src="<?php bloginfo('template_directory'); ?>/reources/images/additional.jpg" alt="">						
                    <h5>Additional</h5>
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
    <div class="mt-3 mb-5 d-flex justify-content-end startNow">
        <a href="<?php echo home_url('/create-business-agreement'); ?>" class="btn_primary">Start Now</a>
    </div>
</div>
</div>



<?php get_footer('landing')?>