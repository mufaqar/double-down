<?php /* Template Name: Order ( Personal )  */ 
get_header();
?>
<?php include('navigation.php'); ?>

                    <!-- tabs -->

                    <div class="tab_wrapper">
                        <?php page_title()?>
                    </div>

                    <div class="custom_container c2 ">
                        <div class="row">
                            <div class="catering_wrapper mt-5 mb-5 col-md-8">
                                <div class="catering_menu">
                                    <a class="_lcmenutab _active" onclick="lcClick()">Lunch Calendar</a>
                                    <a class="_fdmenutab" onclick="fdClick()">Catering Orders</a>
                                    <a class="_meetingtab" onclick="mfClick()">Meeting Orders</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section id="lctab" class="lctab _active">
                        <div class="custom_container c2 ">
                            <div class="row">
                                <div class="catering_wrapper mb-5 col-md-8">                                
                                    <div class="calender_wrapper d-flex justify-content-between align-items-center ">
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
                                <div class="col-md-4 mb-5 ">
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
                    </section>

                    <section id="fdtab" class="tabdiv">
                            <div class="custom_container c2 ">
                            <?php get_template_part( 'partials/order', 'catering'); ?>
                            </div>
                    </section>

                    <section id="fdtab" class="tabdiv">
                            <div class="custom_container c2 ">
                            <?php get_template_part( 'partials/order', 'catering'); ?>
                            </div>
                    </section>

                    <section id="mftab" class="tabdiv">
                            <div class="custom_container c2 ">
                            <?php get_template_part( 'partials/order', 'catering'); ?>
                            </div>
                    </section>
                    
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
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/reources/js/calender.js"></script>


<script>





    // order menu toggle 
function lcClick() {
    var lcbtn = document.querySelector('._lcmenutab');
    var fdbtn = document.querySelector('._fdmenutab');
    var lctab = document.querySelector('#lctab');
    var fbtab = document.querySelector('#fdtab');
    lcbtn.classList.add('_active');
    lctab.classList.add('_active');
    fdbtn.classList.remove('_active');
    fbtab.classList.remove('_active');
    
}

function fdClick(){
    var lcbtn = document.querySelector('._lcmenutab');
    var fdbtn = document.querySelector('._fdmenutab');
    var lctab = document.querySelector('#lctab');
    var fbtab = document.querySelector('#fdtab');
    lcbtn.classList.remove('_active');
    lctab.classList.remove('_active');
    fdbtn.classList.add('_active');
    fbtab.classList.add('_active');
    
}


function mfClick(){
    var lcbtn = document.querySelector('.mftab');
    var fdbtn = document.querySelector('._fdmenutab');
    var lctab = document.querySelector('#mftab');
    var fbtab = document.querySelector('#mftab');
    lcbtn.classList.remove('_active');
    lctab.classList.remove('_active');
    fdbtn.classList.add('_active');
    fbtab.classList.add('_active');
    
}



</script>