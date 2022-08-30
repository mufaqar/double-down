<?php /* Template Name: Admin-Foodlist  */



get_header('admin');


?>
<?php include('navigation.php'); ?>
<div class="admin_parrent _admin_foodlist">
    <div class="toggle_btn">
        <div class="row ">
            <div class="catering_wrapper mt-5 mb-2  p-0 w-100">
                <!-- <div class="catering_menu buttons">
                    <a id="1" class="showSingle _active" target="1">All Orders</a>
                    <a id="2" class="showSingle" target="2">Complete</a>
                    <a id="3" class="showSingle" target="3">Pending</a>
                    <a id="4" class="showSingle" target="4">Cancle</a>
                </div> -->
            </div>
        </div>
    </div>

    <section id="div1" class="targetDiv activediv tablediv">
        <table id="all" class="table table-striped orders_table" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Product Category</th>
                    <th>Product Sub-Categories</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;

                query_posts(array(
                    'post_type' => 'menu_items',
                    'posts_per_page' => -1,
                    'order' => 'desc',


                ));

                if (have_posts()) :  while (have_posts()) : the_post();
                        $i++; ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php the_title() ?></td>
                            <td><?php $types_list = wp_get_post_terms( $post->ID, 'menu_types', array( 'fields' => 'all' ) );
                            foreach($types_list as $type)
                            {
                                  echo $type->name;

                                
                            } ?></td>
                            <td><?php $sub_types_list = wp_get_post_terms( $post->ID, 'menu_sub_types', array( 'fields' => 'all' ) );
                            foreach($sub_types_list as $subtype)
                            {
                                  echo $subtype->name;

                                
                            } ?></td>
                            <td><?php echo the_time(get_option('date_format'));?></td>
                            <td>NOK <?php echo get_post_meta(get_the_ID(), 'menu_item_price', true); ?></td>
                            <td> 

                            <?php if ( has_post_thumbnail() ) {
									the_post_thumbnail( array(50,50),array('class' => 'p_image') );
								} else { ?>
							<img   class="p_image" src="<?php bloginfo('template_directory'); ?>/reources/images/food1.png" alt="Featured Thumbnail" />
							<?php } ?>
                        
                        
                        
                        </td>
                        </tr>
                    <?php endwhile;
                    wp_reset_query();
                else : ?>
                    <h2><?php _e('Nothing Found', 'lbt_translate'); ?></h2>
                <?php endif; ?>

            </tbody>

        </table>

    </section>
</div>


</div>
</div>
</div>
</div>

</main>

<?php get_footer('admin') ?>