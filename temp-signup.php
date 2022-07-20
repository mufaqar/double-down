<?php /* Template Name: Signup  */ 



get_header();


?>  <main class="business_agreement">
<div
    class="agreement_wrapper d-flex position-relative justify-content-center flex-column align-items-center p-4">
    <img src="<?php bloginfo('template_directory'); ?>/reources/images/logo.png" class="logo" alt="logo">
    <div class="agreement_steps d-flex justify-content-center align-items-center mt-4 mt-lg-5 mb-lg-5">
        <div class="step step_one"></div>
        <div class="step step_two"></div>
        <div class="step step_three"></div>
    </div>
    <form>

        <div
            class="first_step step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
            <img src="<?php bloginfo('template_directory'); ?>/reources/images/left arrow.png" class="arrow position-absolute" alt="back arrow">
            <p>NB! Is the company you work for already registered? Feel free toask an admin for the corporate
                agreement for an invitation to join</p>
            <div class="pl-4 pr-4">
                <h2 class="">Create Buisness Agreement</h2>
                <div class="form-group w-100">
                    <label for="exampleInputEmail1">Company Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Oranch AS">
                </div>

                <div class="form-group w-100 mt-3 mb-5">
                    <label for="exampleInputEmail1">Delivery adress</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                        placeholder="Adress.."></textarea>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Oranch AS">
                </div>

                <a type="next" class="btn_primary d-block next" onclick="stepOne()">Continue</a>
            </div>
        </div>

        <!-- step 2  -->
        <div
            class="secound_step step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
            <img src="<?php bloginfo('template_directory'); ?>/reources/images/left arrow.png" class="arrow position-absolute" alt="back arrow"
                onclick="backToStepOne()">

            <div class="pl-4 inner-content pr-4">
                <h2 class=""> Customize company agreement for Oranchy AS</h2>
                <p class="align-self-start">Should the company cover all or some of the lunch?</p>
                <div class="launch mt-3 mb-4 form-group w-100 d-lg-flex align-items-center">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Oranch AS">
                    <select name="" id="" class="">
                        <option value="">%</option>
                        <option value="">$</option>
                    </select>
                    <p class="text-nowrap">of the lunch to each employee?</p>
                </div>
                <h6>First Possible start Date</h6>
                <p class="text">Employees will not automatically start up on this data, but no one can startup,
                    earlier than the specific date</p>

                <div class="form-group w-100 mt-3 mb-5">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="20.05.2022">
                    <p class="invite">Invite more people from work to the company agreement</p>
                    <h6>It’s easy to add more employees Later too</h6>
                </div>

                <div class="emplate form-group w-100 mb-3 d-flex align-items-center">
                    <label for="exampleInputEmail1">1</label>
                    <input type="text" class="form-control " id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="">
                </div>
                <div class="emplate form-group w-100 mb-3 d-flex align-items-center">
                    <label for="exampleInputEmail1">2</label>
                    <input type="text" class="form-control " id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="">
                </div>
                <div class="emplate form-group w-100 mb-5 d-flex align-items-center">
                    <label for="exampleInputEmail1">3</label>
                    <input type="text" class="form-control " id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="">
                </div>

                <a type="next" class="btn_primary d-block next" onclick="stepTwo()">Continue</a>
            </div>
        </div>

        <!-- step 3  -->
        <div
            class="third_step step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
            <img src="<?php bloginfo('template_directory'); ?>/reources/images/left arrow.png" class="arrow position-absolute" alt="back arrow"
                onclick="backToStepTwo()">

            <div class="pl-4 third pr-4">

                <p> As a buisness administrator, you must hve your own user to log in. Then you get full access
                    tothe corporate agreement , and can add more administrators</p>
                <h2 class="">Your Information</h2>
                <div class="form-group w-100">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="">
                </div>
                <div class="form-group w-100 mt-3">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="">
                </div>
                <div class="form-group w-100 mt-3">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="">
                </div>

                <div class="pinfo mt-5">
                    <h2 class="">Term of use, privacy andcrelevant information</h2>
                    <p class="text"> I will receive relevant information about product and services from the
                        Lunch
                        Collective. This can be , for example,information about the lunch menu and nutritional
                        content,news and changes, offers, compaigns, surveys etc. We promise not to bother you
                        prematurely</p>
                </div>

                <div class="d-flex align-items-center mb-5">
                    <p class="">
                        <input type="radio" id="test1" name="radio-group" checked>
                        <label for="test1">Yes, Please</label>
                    </p>
                    <p style="margin-left: 2rem;">
                        <input type="radio" id="test2" name="radio-group">
                        <label for="test2">No Thanks</label>
                    </p>
                </div>

                <a type="next" class="btn_primary d-block next" onclick="stepLast()">Complete</a>
            </div>
        </div>

        <!-- finish step  -->


        <div
            class="finish_step step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
            <!-- <img src="<?php bloginfo('template_directory'); ?>/reources/images/left arrow.png" class="arrow position-absolute" alt="back arrow"
                onclick="backToStepThree()"> --> 
            <div class="content mt-5">
                <div class="right"><img src="<?php bloginfo('template_directory'); ?>/reources/images/img 3.png" alt=""></div>
                <h1 class="finished">Finished!</h1>
                <h2 class="looking">We Looking forward to make lunch with you</h2>
                <p class="find_information">We have now sent you an Email where you will find information on how to login
                    and manage your company and your orders.Companies receive an invoice at the end of each month.
                </p>
                <h3 class="employees_receive">Employees receive it at the end of each week</h3>
                <a href="" class="btn_primary mb-5">Go to the front</a>
            </div>                    
        </div>


    </form>
</div>


</main>






    <?php get_footer();?>




