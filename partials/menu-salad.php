<?php
$no_week =  date("Y-W");
$query_week = $_REQUEST['week'];
if($query_week == '') {
    $query_week = $no_week;
}

$week_arr = explode("-", $query_week, 2);
$week=$week_arr[1];
$year=$week_arr[0];
?>
                 

         <div class="catering_card_wrapper">
            <div class="ajaxload"></div>         
            </div>


                    