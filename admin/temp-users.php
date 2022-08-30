<?php /* Template Name: Admin-Users  */



get_header('admin');


?>
<?php include('navigation.php'); ?>
<div class="admin_parrent">
    <div class="toggle_btn">
        <div class="row ">
            <div class="catering_wrapper mt-5 mb-2 col-md-8 p-0">
                <div class="catering_menu buttons">
                    <a id="1" class="showSingle _active" target="1">All Users</a>
                    <a id="2" class="showSingle" target="2">All Companies</a>
                </div>
            </div>
        </div>
    </div>
    <section id="div1" class="targetDiv activediv tablediv">
        <table id="all" class="table table-striped orders_table" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Compnay</th>
                    <th>Phone Number</th>
                    <th>Email Address</th>
                    <th>...</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;

                $members = get_users(
                    array(
                        //'role'    => 'company',
                        'orderby' => 'ID',
                        'order'   => 'ASC'
                    )
                );
                $users = get_users($members);
                //  print "<pre>";
                //  print_r($users); 



                foreach ($users as $user) {
                    $i++;  ?>
                    <tr>
                        <td class="pt-4"><?php echo $i ?></td>
                        <td class="d-flex align-items-center"><img class="_user_profile" src="http://demo.mufaqar.com/dev3/wp-content/uploads/2022/08/Ellipse-103.png" alt="profile" /><?php echo $user->display_name ?></td>
                        <td><?php echo get_user_meta($user->ID, 'compnay_name', true); ?></td>
                        <td><?php echo get_user_meta($user->ID, 'profile_delivery_phone', true); ?></td>
                        <td><?php echo $user->user_email ?></td>
                        <th>...</th>

                    </tr>
                <?php } ?>

            </tbody>

        </table>

    </section>
    
</div>





<?php get_footer('admin') ?>