<?php
$week = [];
$saturday = strtotime('monday this week');
$i = 0;
foreach (range(0, 4) as $day) {
    $week[] = date("Y-m-d", (($day * 86400) + $saturday));
    $today_date =  $week[$i];
    $i++;
    $timestamp = strtotime($today_date);
    $today_day = date('l', $timestamp); ?>
    <div class="col-lg-6">
        <div class="fd_wrapper p-4">
          
                <div class="d-flex justify-content-between align-items-center">
                    <h5><strong> <?php echo $today_day ?></strong></h5>
                    <p>You pay: <span>NOK <span id="price_pay"></span></span> <br>VAT: <span>80</span></p>
                </div>
                <div class="catering_form">
                    <div class="_form mt-2">
                        <input type="hidden" value="<?php echo $today_date ?>" id="day">
                        <div>
                            <label for="">Lunch type</label>
                            <div class="_select">
                                <select id="lunch_type">
                                    <?php
                                    $menu_types = get_terms(array('taxonomy' => 'menu_types', 'hide_empty' => false));
                                    foreach ($menu_types as $menu_type) {
                                        $type_slug = $menu_type->slug;
                                        $type_name = $menu_type->name; ?>
                                        <option value="<?php echo $type_slug ?>"><?php echo $type_name ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <img src="<?php bloginfo('template_directory'); ?>/reources/images/down-arrow.png" alt="">
                            </div>
                        </div>
                        <div>
                            <label class="mt-3" for="">Lunch Accessories</label>
                        </div>

                        <div class="row mt-3 mb-3 add_foods_to_list">

                            <div id="add_food_<?php echo $today_day ?>" class="add_roll" onclick="openfooditems()">
                                <i class="fa-solid fa-plus"></i>
                            </div>

                            <div class="food_list">


                            <?php query_posts(array(
                                    'post_type' => 'menu_items',
                                    'posts_per_page' => -1,
                                    'order' => 'desc'
                                    
                                )); 
                                if (have_posts()) :  while (have_posts()) : the_post(); $pid = get_the_ID();?>
                                <div id="food_<?php echo $pid?>" product-id="<?php echo $pid?>" onClick="reply_click(this.id, '<?php echo $today_day ?>')"><?php the_title()?></div>
                                <?php endwhile; wp_reset_query(); else : ?>
                                    <h2><?php _e('Nothing Found','lbt_translate'); ?></h2>
                                    <?php endif; ?> 
                                
                            </div>
                        </div>
                    </div>
                </div>

           
        </div>
    </div>


<?php  }    ?>





<script>
//{day: "1", type: "Salad", foodlist:[1,2,3,4]} 

  



</script>