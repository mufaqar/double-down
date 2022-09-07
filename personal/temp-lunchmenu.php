<?php /* Template Name: Personal-LunchMenu  */
get_header();
?>

<?php include('navigation.php'); ?>
<div class="tab_wrapper">
    <?php page_title() ?>
</div>

<div class="custom_container c2 ">
    <div class="row ">
        <div class="catering_wrapper mt-5 mb-5 col-md-8">
            <div class="catering_menu buttons">
                <a id="1" class="showSingle _active" target="1"> Bread lunch</a>
                <a id="2" class="showSingle" target="2">Salad</a>
                <a id="3" class="showSingle" target="3">Wrap lunch</a>
            </div>
        </div>
    </div>
</div>


<section id="div1" class="targetDiv activediv">
    <?php get_template_part('partials/menu', 'lunch'); ?>
</section>
<section id="div2" class="targetDiv">
    <?php get_template_part('partials/menu', 'salad'); ?>
</section>
<section id="div3" class="targetDiv">
    <?php get_template_part('partials/menu', 'vegetarian'); ?>
</section>

</div>
</div>
</div>

</main>


<?php get_footer(); ?>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/reources/js/script.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>



<!-- week calender  -->

<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/reources/js/weekPicker.min.js"></script>
<script>
    convertToWeekPicker($("#weekPicker1"));
    convertToWeekPicker($("#weekPicker2"));
    convertToWeekPicker($("#weekPicker3"));
</script>




<script>
    // order menu toggle 

    jQuery(function() {
        jQuery('#div2').hide();
        jQuery('#div3').hide();
        jQuery('.showSingle').click(function() {
            $(".showSingle").removeClass("_active");
            $(this).addClass("_active");
            jQuery('.targetDiv').hide();
            jQuery('#div' + $(this).attr('target')).show();

        });
    });
</script>