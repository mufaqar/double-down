<?php /* Template Name: Settings (P)  */
get_header();
$uid = get_current_user_id();
?>
<?php include('navigation.php'); ?>

<!-- tabs -->

<div class="tab_wrapper">
    <?php page_title() ?>

    <div class='panels'>

        <div class='panel launchClander setting_tab'>
            <div class="deatil_card d-flex justify-content-between align-items-center">
                <div class="info">
                    <h3>Fast Levering</h3>
                    <p>5 Days</p>
                </div>

                <div class="">
                    <button id="showfast_leaving" class="btn_primary">Change</button>
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
                    <button id="show_address" class="btn_primary">See or Overrid</button>
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
                        <span>94974967</span>
                    </p>

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
                    <button id="change_payment_card_no" class="btn_primary">Change</button>
                </div>
            </div>

            <!-- 6th  -->
            <div class="deatil_card d-flex justify-content-between align-items-center">
                <div class="info">
                    <h3>Allergies and Others</h3>
                    <p>Vegan</p>
                </div>
                <div class="">
                    <button id="change_allergies" class="btn_primary">Select</button>
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

    </div>
</div>


</div>
</div>
</div>
</div>
</main>


<section class="hideme alertmessage">
    <div class="popup">
        <div class="popup_wrapper">
            <div class="order_confirm d-flex position-relative justify-content-center flex-column align-items-center p-4">
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/logo.png" class="logo" alt="logo">

                <div class="step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
                    <div class="content mt-5">
                        <div class="right"><img src="<?php bloginfo('template_directory'); ?>/reources/images/img 3.png" alt=""></div>
                        <h1 class="finished">Finished!</h1>
                        <h2 class="mb-5 mt-5">Your Order has beed submitted!</h2>

                    </div>
                </div>

            </div>
            <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
        </div>
    </div>
</section>


<section class="hideme overlay delivery_address_popup">
    <div class="popup">
        <form class="profile_deliver_address" id="profile_deliver_address" action="#">
            <div class="popup_wrapper">
                <h3 class="ad_productss">Delivery Address</h3>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Delivery Address</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="profile_delivery_address" id="profile_delivery_address" placeholder="<?php echo get_user_meta($uid, 'profile_delivery_address', true);  ?>">
                        <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid">
                        <img src="<?php bloginfo('template_directory'); ?>/reources/images/pin.png" alt="">
                    </div>
                </div>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Phone </label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="profile_delivery_phone" id="profile_delivery_phone" placeholder="<?php echo get_user_meta($uid, 'profile_delivery_phone', true);  ?>">
                    </div>
                </div>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Email Addres</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="profile_delivery_email" id="profile_delivery_email" placeholder="<?php echo get_user_meta($uid, 'profile_delivery_email', true);  ?>">
                    </div>
                </div>

                <div class="mt-5">
                    <input type="submit" class="btn_primary" value="Save" />
                </div>

                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </form>
    </div>
</section>


<section class="hideme overlay fast_leaving_popup">
    <div class="popup">
        <form class="profile_deliver_fast" id="profile_deliver_fast" action="#">
            <div class="popup_wrapper">
                <h3 class="ad_productss">Fast Levering</h3>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Days</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="profile_delivery_days" id="profile_delivery_days" placeholder="<?php echo get_user_meta($uid, 'profile_delivery_days', true);  ?>">
                        <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid">

                    </div>
                </div>


                <div class="mt-5">
                    <input type="submit" class="btn_primary" value="Save" />
                </div>

                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </form>
    </div>
</section>

<section class="hideme overlay show_payment_card_popup">
    <div class="popup">
        <form class="profile_card_form" id="profile_card_form" action="#">
            <div class="popup_wrapper">
                <h3 class="ad_productss">Payment</h3>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Card Number</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="profile_card_no" id="profile_card_no" placeholder="<?php echo get_user_meta($uid, 'profile_card_no', true);  ?>">
                        <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid">
                    </div>
                </div>
                <div class="mt-5">
                    <input type="submit" class="btn_primary" value="Save" />
                </div>
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </form>
    </div>
</section>

<section class="hideme overlay show_allergies_popup">
    <div class="popup">
        <form class="profile_allergies_form" id="profile_allergies_form" action="#">
            <div class="popup_wrapper">
                <h3 class="ad_productss">Change Allergies & Other</h3>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label> Allergies</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="profile_allergies_other" id="profile_allergies_other" placeholder="<?php echo get_user_meta($uid, 'profile_allergies_other', true);  ?>">
                        <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid">
                    </div>
                </div>
                <div class="mt-5">
                    <input type="submit" class="btn_primary" value="Save" />
                </div>
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </form>
    </div>
</section>


<section class="hideme overlay agreement">
    <div class="popup">
        <form class="update_agreement" id="update_agreement" action="#">
            <div class="popup_wrapper">
                <h3 class="ad_productss">Details of the agreement</h3>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Agreement Name</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="text" name="compnay_agreement" id="compnay_agreement" placeholder="<?php echo get_user_meta($uid, 'compnay_agreement', true);  ?>">
                        <input type="hidden" value="<?php echo get_current_user_id() ?>" id="uid">
                    </div>
                </div>
                <div class="_delivery_address d-flex flex-column justify-content-start align-items-start">
                    <label>Starting Date</label>
                    <div class="_field d-flex justify-content-between align-items-center">
                        <input type="date" name="starting_date" id="starting_date" placeholder="<?php echo get_user_meta($uid, 'starting_date', true);  ?>">
                    </div>
                </div>
                <div class="mt-5">
                    <input type="submit" class="btn_primary" value="Save" />
                </div>

                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </form>
    </div>
</section>


<section class="hideme overlay invoice">
    <div class="popup">
        <div class="popup_wrapper">
            <h3 class="ad_productss">Invoice</h3>

            <div class="invoice_table">
                <table class="_table">
                    <thead>
                        <tr>
                            <th scope="col">Invoice Date</th>
                            <th scope="col">Total</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">Sunday, May 29, 2022</td>
                            <td>80</td>
                            <td>459.2</td>
                            <td>Complete <i class="fa-solid fa-down-to-line"></i></td>
                        </tr>
                        <tr>
                            <td scope="row">Sunday, June 5, 2022</td>
                            <td>80</td>
                            <td>459.2</td>
                            <td>Pending <i class="fa-solid fa-down-to-line"></i></td>
                        </tr>
                        <tr>
                            <td scope="row">Sunday, June 6, 2022</td>
                            <td>80</td>
                            <td>459.2</td>
                            <td>Pending <i class="fa-solid fa-down-to-line"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
        </div>
    </div>
</section>








<?php get_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/reources/js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {

        $('#show_address').click(function() {
            $(".delivery_address_popup").css("display", "block");
        });
        $('#showfast_leaving').click(function() {
            $(".fast_leaving_popup").css("display", "block");
        });

        $('#change_payment_card_no').click(function() {
            $(".show_payment_card_popup").css("display", "block");
        });

        $('#change_allergies').click(function() {
            $(".show_allergies_popup").css("display", "block");
        });

        $('._cross').click(function() {

            $(".hideme").css("display", "none");
        });

        $("#profile_deliver_address").submit(function(e) {
            e.preventDefault();
            var profile_delivery_address = jQuery('#profile_delivery_address').val();
            var profile_delivery_phone = jQuery('#profile_delivery_phone').val();
            var profile_delivery_email = jQuery('#profile_delivery_email').val();
            var uid = jQuery('#uid').val();

            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "profile_deliver_address",
                    profile_delivery_address: profile_delivery_address,
                    profile_delivery_phone: profile_delivery_phone,
                    profile_delivery_email: profile_delivery_email,
                    uid: uid
                },
                success: function(data) {

                    if (data.code == 0) {

                        alert(data.message);
                    } else {
                        alert(data.message);

                    }
                }

            });

        });



        $("#profile_deliver_fast").submit(function(e) {
            e.preventDefault();
            var profile_delivery_days = jQuery('#profile_delivery_days').val();
            var uid = jQuery('#uid').val();

            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "profile_deliver_fast",
                    profile_delivery_days: profile_delivery_days,
                    uid: uid
                },
                success: function(data) {

                    if (data.code == 0) {

                        alert(data.message);
                    } else {
                        alert(data.message);

                    }
                }

            });

        });

        $("#profile_card_form").submit(function(e) {
            e.preventDefault();
            var profile_card_no = jQuery('#profile_card_no').val();
            var uid = jQuery('#uid').val();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "profile_card_number",
                    profile_card_no: profile_card_no,
                    uid: uid
                },
                success: function(data) {

                    if (data.code == 0) {

                        alert(data.message);
                    } else {
                        alert(data.message);

                    }
                }

            });

        });

        $("#profile_allergies_form").submit(function(e) {
            e.preventDefault();
            var profile_allergies_other = jQuery('#profile_allergies_other').val();
            var uid = jQuery('#uid').val();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "profile_allergies_other",
                    profile_allergies_other: profile_allergies_other,
                    uid: uid
                },
                success: function(data) {

                    if (data.code == 0) {

                        alert(data.message);
                    } else {
                        alert(data.message);

                    }
                }

            });

        });


        $("#update_agreement").submit(function(e) {
            e.preventDefault();
            var compnay_agreement = jQuery('#compnay_agreement').val();
            var starting_date = jQuery('#starting_date').val();
            var uid = jQuery('#uid').val();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "update_agreement",
                    compnay_agreement: compnay_agreement,
                    starting_date: starting_date,
                    uid: uid
                },
                success: function(data) {

                    if (data.code == 0) {
                        alert(data.message);
                    } else {
                        alert(data.message);

                    }
                }

            });

        });




    });


    function submitTwoForms() {

        var day = jQuery('#day').val();
        var uid = jQuery('#uid').val();
        var datas = [];
        var newdata = [];
        $(".dailyfood .product-quantity").each(function() {
            var productid = $(this).data('id');
            var value = $(this).val();
            if (value > 1) {
                datas.push([productid, $(this).val()]);
            }
            newdata.push(datas);
        });
        var menu_items = newdata[0];
        console.log(menu_items);
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('admin-ajax.php'); ?>",
            data: {
                action: "dailyfood",
                day: day,
                menu_items: menu_items,
                uid: uid

            },
            success: function(data) {
                if (data.code == 0) {
                    alert(data.message);
                } else {
                    $(".alertmessage").css("display", "flex");
                }
            }

        });

    }
</script>