    <?php /* Template Name: Admin-OrderHandling  */



    get_header('admin');



    ?>
    	
	
</head>
    <?php include('navigation.php'); ?>
    <div class="admin_parrent">
       
        <div class="calender_wrapper d-md-flex justify-content-between align-items-center mt-5">
                            <h2>This week's Orders</h2>
                            <div class="calender week_calender">
                                    <form action="" method="GET" id="weekform">
                                        <input type="hidden" name="catname" id="catname" value="bread-lunch" />
                                        <input type="text" id="weekPicker1" name="week" value="<?php echo date("Y-W"); ?>" >
                                        <div class="wc-icon"><i class="fa-solid fa-calendar-days"></i></div>
                                    </form>
                            </div> 
        </div>
<!-- 
        <div class="toggle_btn">
            <div class="row ">
                <div class="catering_wrapper mt-5 mb-2 col-md-8 p-0">
                    <div class="catering_menu buttons">
                        <a id="1" class="showSingle _active" target="1" data="">All Users</a>
                        <a id="2" class="showSingle" target="2" data="personal">Personal Profile</a>
                        <a id="2" class="showSingle" target="2" data="Company">All Companies</a>
                    </div>
                </div>
            </div>
        </div> -->
       
        <section id="div1" class="targetDiv activediv tablediv">
                <table id="all" class="table table-striped orders_table" style="width:100%">
                <?php include('partials/weekly-orders.php'); ?>
                </table>

            </section>

    </div>
    
    
    
    <section class="hideme alertmessage">
        <div class="popup">
            <div class="popup_wrapper">
                <div class="order_confirm d-flex position-relative justify-content-center flex-column align-items-center p-4">
                    <img src="<?php bloginfo('template_directory'); ?>/reources/images/logo.png" class="logo" alt="logo">
                    <div class="step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
                        <div class="content mt-5">
                            <div class="right"><img src="<?php bloginfo('template_directory'); ?>/reources/images/img 3.png" alt=""></div>
                            <h1 class="finished">Finished!</h1>
                            <h2 class="mb-5 mt-5"><div class="res">Load Ajax Data</div></h2>

                        </div>
                    </div>

                </div>
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
            </div>
        </div>
    </section>


    
    <section class="hideme  overlay invoice_detail_popup">                                               
            <div class="popup">
                <div class="popup_wrapper">
                    <h3 class="ad_productss">Compnay Orders Details</h3>                 
                        <div class="w-100 ajax_invoice"> </div>  
                        <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross ">
                </div>                
    </section>


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
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    

    
    <?php get_footer('admin') ?>

  
    




<script type="text/javascript">

   

    jQuery(document).ready(function($) {   

       $('.download_pdf1').click(function() {

        
      
                var order_id = $(this).attr('data-id');
               
              
                $.ajax({
                    type: "POST",
                    url: "<?php echo admin_url('admin-ajax.php'); ?>",
                    data: {
                        action: "get_download_pdf",
                        order_id: order_id
                    },
                    success: function(data) {                         
                    // alert(data.message);
                    }

                });
            }); 
    

       




    });


  
</script>