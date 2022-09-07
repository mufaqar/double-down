<?php /* Template Name: Meeting (C)  */



get_header('company');
global $current_user;
wp_get_current_user();


?>
<?php include('navigation.php'); ?>
<div class="custom_container order_wrapper mt-5 mb-5">
    <form class="addmeeting" id="addmeeting" action="#">
        <div class="_inner mt-4 p-5">
            <div class="date_filter d-flex justify-content-center flex-column align-items-center">
                <label>Choose Date 2</label>
                <input type="date" id="date" value="<?php echo date("Y-m-d"); ?>">
                <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid">
            </div>
            <div class="_content mt-5 mb-5">
                <h2>Select Product</h2>
                <div class="row">
                    <?php query_posts(array(
                        'post_type' => 'menu_items',
                        'posts_per_page' => -1,
                        'order' => 'desc',
                        'menu_types' => 'accessories'
                    ));
                    if (have_posts()) :  while (have_posts()) : the_post();
                            $pid = get_the_ID(); ?>
                            <div class="col-md-6">
                                <div class="order_product">
                                    <img src="<?php bloginfo('template_directory'); ?>/reources//images/order-pic-1.png" alt="" class="w-100">
                                    <h3><?php the_title(); ?><span> | NOK <?php the_field('menu_item_price'); ?> </span></h3>
                                    <p>Here you can easily choose between or cancel the various lunch options
                                        from day to day. If you want to change a fixed subscription, do so
                                        <span>her.</span>
                                    </p>
                                    <button href="" class="btn_primary  id<?php echo $pid; ?>" onmouseover="showCounter(<?php echo $pid; ?>)">Select</button>
                                    <div class="d-none product_counter mt-4 d-flex justify-content-center align-items-center cid<?php echo $pid; ?>">
                                        <i class="count-down"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/minus-thin.png" alt=""></i>
                                        <input type="text" data-id="<?php echo $pid; ?>" value="1" class="product-quantity form-control text-center incrDecrCounter" />

                                        <i class="count-up"><img src="<?php echo get_template_directory_uri(); ?>/reources/images/plus-thin.png" alt=""></i>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_query();
                    else : ?>
                        <h2><?php _e('Nothing Found', 'lbt_translate'); ?></h2>
                    <?php endif; ?>

                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h6 class="mt-2"><strong>Delivery Address</strong></h6>
                    <p>Oranchy AS , Pilestredet 75C
                        , 0354 OSLO</p>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-end">
                    <button class="btn green_btn">Order Now</button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>

</div>
</div>
</div>

</main>

<section class="hideme overlay">
    <div class="popup">
        <div class="popup_wrapper">
            <div class="order_confirm d-flex position-relative justify-content-center flex-column align-items-center p-4">
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/logo.png" class="logo" alt="logo">

                <div class="step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
                    <div class="content mt-5">
                        <div class="right"><img src="<?php bloginfo('template_directory'); ?>/reources/images/img 3.png" alt=""></div>
                        <h1 class="finished">Finished!</h1>
                        <h2 class="mb-5 mt-5">Your Order has beed submitted!</h2>
                        <a href="<?php echo home_url(''); ?>" class="btn_primary mb-5">View Orders</a>
                    </div>
                </div>

            </div>
            <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
        </div>
    </div>
</section>



<?php get_footer(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

    





    jQuery(document).ready(function($) {

     
        $('._cross').click(function() {

            $(".hideme").css("display", "none");
        });

        $("#addmeeting").submit(function(e) {
            e.preventDefault();
            var date = jQuery('#date').val();
            var uid = jQuery('#uid').val();
            var datas = [];
            var newdata = [];
            $("#addmeeting .product-quantity").each(function() {
                var productid = $(this).data('id');
                var value = $(this).val();
                if (value > 1) {
                    datas.push([productid, $(this).val()]);
                }
                newdata.push(datas);
            });
            //alert(newdata[0]);
            var menu_items = newdata[0];
            console.log(menu_items);

            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "addmeeting",
                    menu_items: menu_items,
                    date: date,
                    uid: uid,
                    order: "Company"
                },
                success: function(data) {

                    if (data.code == 0) {
                        alert(data.message);
                    } else {
                        $(".overlay").css("display", "flex");
                        // alert(data.message);

                    }
                }

            });
        });


    });
</script>