<?php /* Template Name: Fix Delivery (P)  */  get_header();?>
<?php include('navigation.php'); ?>
                    <!-- tabs -->
                    <div class="tab_wrapper">
                    <?php page_title()?>
                    <div class="custom_container c2">
                        <div class="row">
                            <div class="catering_wrapper c2 mt-5 mb-5">
                                <div class="catering_menu">
                                    <a href="<?php echo home_url('profile'); ?>" class="">Lunch Calendar</a>
                                    <a href="" class="_active">Fixed Delivery</a>
                                </div>
                                <div class="calender_wrapper mt-5">
                                    <h3>Fast levering</h3>
                                    <p>Here you change your regular lunch delivery from us. If you only want to cancel
                                        or change the type of lunch on certain days, do so <span>her.</span></p>
                                    <br>
                                    <hr>
                                </div>
                                <section class="fixed_delivery mt-4">
                                    <div class="row">
                                    <?php get_template_part('partials/content', 'fixdelivery'); ?>
                                    </div>

                                </section>

                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>

    </main>


    <?php get_footer();?>


     <!-- Font Awsome -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" ></script> 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/reources/js/script.js"></script>

