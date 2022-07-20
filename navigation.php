           
  
        <div class="row d-flex">
            <div class="" style="width: 230px;">
           
           <div class="sidebar p-0 align-items-start pt-5">
                    <div class="d-flex justify-content-center">
                       <a href="<?php bloginfo('url'); ?>"> <img src="<?php bloginfo('template_directory'); ?>/reources//images/logo.png" class="logo" alt=""></a>
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
                            <li class=""><a href="<?php echo home_url('blog'); ?>">Blog</a></li>
                        </ul>
                        <ul class="companyProfileNav">
                            <li class=""><a>C Business Overview</a></li>
                            <li class=""><a>Meeting</a></li>
                            <li class=""><a>Lunsjmeny</a></li>
                            <li class="active"><a>Catering</a></li>
                            <li class=""><a href="<?php echo home_url('blog'); ?>">Blog</a></li>
                        </ul>
                    </div>
                    <div class="logout">                       	
                    <a href="<?php echo wp_logout_url( home_url() ); ?>"> <img src="<?php bloginfo('template_directory'); ?>/reources//images/logout.png" alt=""><span>Log Out</span></a>
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