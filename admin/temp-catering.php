<?php /* Template Name: Admin-Catering  */ 
get_header('admin');
?>
<?php include('navigation.php'); ?>
<div class="admin_parrent">
<div class="toggle_btn">
    <div class="row ">
        <div class="catering_wrapper mt-5 mb-2  p-0 w-100">
            <div class="catering_menu buttons">
                <a id="1" class="showSingle _active" target="1">All Orders</a>
                <a id="2" class="showSingle" target="2">Complete</a>
                <a id="3" class="showSingle" target="3">Pending</a>
                <a id="4" class="showSingle" target="4">Cancle</a>
            </div>
        </div>
    </div>
</div>
<section id="div1" class="targetDiv activediv tablediv">
    <table id="all" class="table table-striped orders_table" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Order ID</th>
                <th>No of People</th>
                <th>Address</th>
                <th>Food Type</th>
                <th>Price</th>
                <th>Need allergens</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $i = 0;

            query_posts(array(
                'post_type' => 'catering',
                'posts_per_page' => -1,
                'order' => 'desc',


            ));

            if (have_posts()) :  while (have_posts()) : the_post();
                    $i++; ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php the_title() ?></td>
                        <td><?php the_field('people'); ?> </td>
                        <td><?php the_field('address'); ?> </td>
                        <td><?php echo get_the_terms($post->ID, 'food_type')[0]->name; ?></td>
                        <td>NOK <?php the_field('person'); ?></td>
                        <td><?php echo get_the_terms($post->ID, 'allergens')[0]->name; ?></td>
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

<?php get_footer('admin') ?>