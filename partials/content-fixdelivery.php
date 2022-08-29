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
            <form class="fixdelivery" id="fixdelivery<?php echo $day ?>">
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
                                
                                <div id="food_1" product-id="234" onClick="reply_click(this.id, '<?php echo $today_day ?>')">1 - Food Data</div>
                                <div id="food_2" product-id="124" onClick="reply_click(this.id, '<?php echo $today_day ?>')">2 - Food Data</div>
                                <div id="food_3" product-id="324" onClick="reply_click(this.id, '<?php echo $today_day ?>')">3 - Food Data</div>
                                
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>


<?php  }    ?>

<div class="col-lg-6 mt-5"> <input type="submit" id="order" class="btn_primary" value="Save Fixed Delivery" /> </div>



<script>
    function openfooditems() {
        var getBtn = document.querySelector('.add_roll')
        var food_list = document.querySelector('.food_list')
        food_list.classList.add('_open')
    }

    function reply_click(clicked_id, day) {

        var getAddBtn = document.querySelector('#add_food_'.concat(day))
        var getFoodInnerHtml = document.getElementById(clicked_id).innerHTML
        var getFoodId = document.getElementById(clicked_id).getAttribute('product-id')
        var fooditem = document.getElementById(clicked_id)
        const html = `<textarea product-id="${getFoodId}" data-set="${getFoodInnerHtml}" >${getFoodInnerHtml}</textarea>`
        getAddBtn.insertAdjacentHTML('beforebegin', html)
        
    }

</script>