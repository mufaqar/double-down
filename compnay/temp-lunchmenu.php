<?php /* Template Name: Company-LunchMenu  */
get_header('compnay');

$no_week =  date("Y-W");
$query_week = $_REQUEST['week'];
if($query_week == '') {
    $query_week = $no_week;
}

$week_arr = explode("-", $query_week, 2);
$week=$week_arr[1];
$year=$week_arr[0];
?>
    <?php include('navigation.php'); ?>
    <div class="tab_wrapper">
        <?php page_title() ?>
    </div>

    <div class="custom_container c2 ">
        <div class="row ">
            <div class="catering_wrapper mt-5 mb-5 col-md-8">
                <div class="catering_menu buttons">
                    <a id="1" class="showSingle _active" target="1" data="bread-lunch"> Bread Lunch</a>
                    <a id="2" class="showSingle" target="2" data="salad-lunch">Salad Lunch</a>
                    <a id="3" class="showSingle" target="3" data="wrap-lunch">Wrap Lunch</a>
                </div>
            </div>
        </div>
    </div>


    <div class="custom_container catering_wrapper ">                       
                       <div class="calender_wrapper d-flex justify-content-between align-items-center mt-5">
                            <h2>This week's <span id="type">Bread Lunch</span> menu</h2>
                            <div class="calender week_calender">
                                    <form action="" method="GET" id="weekform">
                                        <input type="hidden" name="catname" id="catname" value="bread-lunch" />
                                        <input type="text" id="weekPicker1" name="week" value="<?php echo date("Y-W"); ?>" >
                                        <div class="wc-icon"><i class="fa-solid fa-calendar-days"></i></div>
                                    </form>
                            </div> 
                       </div>
    
    <section id="div1" class="targetDiv activediv">

    <?php  get_template_part( 'partials/menu', 'lunch' );  ?>
          
    </section>
                
    <section id="div2" class="targetDiv">

    <?php  get_template_part( 'partials/menu', 'salad' );  ?>


    
    </section>
    <section id="div3" class="targetDiv">
        <?php  get_template_part( 'partials/menu', 'wrap' );  ?>
    
    </section>

    </div>

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
    window.addEventListener('load', function() {
            var element = document.getElementById('displayDate');
            var MutationObserver = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;
            var observer = new MutationObserver(myFunction);
            observer.observe(element, {
                childList: true
            });
            function myFunction() {   
                       
               // document.getElementById("weekform").submit();   
               jqueryFunction();        
                }
            
        });

</script>

<script>  




jQuery(document).ready(function($) 
        {   

            jqueryFunction = function(  )
                    {
                        var weekid = jQuery('#weekPicker1').val(); 
                        var catname = jQuery('#catname').val(); 

                        
                        alert(catname); 
                          
                        $.ajax({
                            type:"POST",
                            url: "<?php echo admin_url('admin-ajax.php'); ?>",
                            data: {
                                action: "get_type_products",
                                weekid : weekid,
                                catname : catname

                            },           
                            success: function(data) {
                                if (data.code == 0) {
                                    alert(data.message);
                                } else {  
                                    
                                   // alert("Ajax Working");
                                  $(".foodlist").html(data);
                                  $(".oldfoodlist").hide();
                                    
                                }
                            }

                        });
                    }

            




       


        jQuery(function() {  
        jQuery('#div2').hide();
        jQuery('#div3').hide();
        jQuery('.showSingle').click(function() {
            $(".showSingle").removeClass("_active");
            $(this).addClass("_active");
          //  $('#weekform').append('<input type="text" name="catname" id="catname" value='+$(this).attr('target')+' />');
            $("#catname").val($(this).attr('data') );
            $("span#type").html($(this).attr('data'));            
            jQuery('.targetDiv').hide();
            jQuery('#div' + $(this).attr('target')).show();
        });
    });

});
   
</script>