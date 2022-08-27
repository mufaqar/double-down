
    <?php
            $week = [];
            $saturday = strtotime('monday this week');
            $i= 0;
            foreach (range(0, 4) as $day) {
                $week[] = date("Y-m-d", (($day * 86400) + $saturday));
                $today_date =  $week[$i];
                $i++;                                       
                $timestamp = strtotime($today_date);
                $today_day = date('l', $timestamp); ?> 

                <div class="col-lg-6">
                    <div class="fd_wrapper p-4">
                        <form class="fixdelivery" id="fixdelivery<?php echo $day ?>" action="#">                        
                            <div class="d-flex justify-content-between align-items-center">
                                <h5><strong> <?php echo $today_day ?></strong></h5>                            
                                <p>You pay: <span>NOK 228.8</span> <br>VAT: <span>80</span></p>
                            </div>

                            <div class="catering_form">
                                <div class="_form mt-2">
                                         <input type="hidden" value="<?php echo $today_date ?>" id="day" >
                                        <div>
                                            <label for="">Lunch type</label>
                                            <div class="_select">
                                                <select id="lunch_type">                                                   
                                                    <?php   
                                                        $menu_types = get_terms( array('taxonomy' => 'menu_types','hide_empty' => false ) ); 
                                                        foreach( $menu_types as $menu_type )  {
                                                                    $type_slug = $menu_type->slug ;
                                                                    $type_name = $menu_type->name ; ?>  
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
                                            <textarea name="" id="" class="d-block p-2 w-100"
                                                placeholder="2x Greek yogurt with granola and raspberry puree"></textarea>
                                        </div>
                                        <div class="row mt-3 mb-3">
                                            <div class="col-md-7">
                                                <input type="text" name="" id=""
                                                    class="d-block p-2 w-100"
                                                    placeholder="Today's smoothie"></input>
                                            </div>
                                            <div class="col-md-5" style="padding-left: 0;">
                                                <input type="text" name="" id=""
                                                    class="d-block p-2 w-100"
                                                    placeholder="Today's juice"></input>
                                            </div>
                                        </div>
                                        <div class="row mt-3 mb-3">
                                            <div class="d-flex align-items-center col-md-8">
                                                <input type="text" name="" id=""
                                                    class="d-block p-2 w-100"
                                                    placeholder="Cinnamon roll"></input>
                                                <div class="add_roll"><i
                                                        class="fa-solid fa-plus"></i></div>
                                            </div>
                                        </div>                               
                                </div>
                            </div>

                         </form>
                    </div>
                </div>

                 <?php  }    ?>


                                       