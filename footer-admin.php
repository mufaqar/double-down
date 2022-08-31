
    </div>
    </div>
    </div>
    </div>

    </main>


<?php wp_footer(); ?>





<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
           // $('#all').DataTable();

            var table = $('#all').DataTable();
            $('.catering_menu').on( 'click', 'a', function () {
            table
                .columns( 6 )
                .search(  $(this).text() )
                .draw();
            });





        })
        $(document).ready(function () {
            $('#complete').DataTable();
        })
        $(document).ready(function () {
            $('#pending').DataTable();
        })
        $(document).ready(function () {
            $('#cancle').DataTable();
        })

       


    </script>
    <script> 
        // order menu toggle 

        jQuery(function () {
            jQuery('#div2').hide();
            jQuery('#div3').hide();
            jQuery('#div4').hide();
            jQuery('.showSingle').click(function () {
                $(".showSingle").removeClass("_active");
                $(this).addClass("_active");
                jQuery('.targetDiv').hide();
                jQuery('#div' + $(this).attr('target')).show();
            });
        });
    </script>




    </ body>

    </ html>