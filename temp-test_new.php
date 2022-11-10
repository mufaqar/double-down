<?php /* Template Name: New */

//get_header('landing');



  $query_order = array(
      'post_type' => 'orders',
      'posts_per_page' => -1,
      'order' => 'desc',
      'meta_query' => array(
          'relation' => 'AND',
          array(
              'key' => 'order_week',
              'value' => '45-11-22',
              'compare' => '=',
          ),
          array(
              'key' => 'user_type',
              'value' => 'Personal',
              'compare' => '=',
          ),
         
          array(
              'key' => 'order_uid',
              'value' => 1,
              'compare' => '=',
          ),
      ),
  );


$postData = new WP_Query($query_order);
if ($postData->have_posts()): while ($postData->have_posts()): $postData->the_post();
  $post_id = get_the_ID();    
  
 // the_title() . "<br/>";
echo get_post_meta(get_the_ID(), 'order_week', true) . "<hr/>";;
  $food_order = get_post_meta(get_the_ID(), 'food_order', true);
  $luchbox = array();
  $add = array();

  foreach ($food_order as $order) {
      foreach ($order as $pro_id => $pro_qty) {
          if (has_term('lunch-boxes', 'menu_types', $pro_id)) {
              $luchbox[] = $pro_qty;
          }
          if (has_term('additionals', 'menu_types', $pro_id)) {
              $add[] = $pro_qty;
          }
      }

  }

  $total_boxes = array_sum($luchbox);
  $total_add = array_sum($add);

  ?>



  <?php endwhile; wp_reset_query();else: ?>
<p>A Total of Boxes,<br> Additions you pay:  NOK </p>
<?php endif;?>