<?php
if( isset($_POST) && !empty($_POST) ) {
    require_once('../../../wp-config.php');
    global $wpdb;
    $email     = $_POST['email'];
    $password  = $_POST['password'];
    $remember  = true;
    $user_data     = get_user_by( 'email', $email );
    if(isset( $user_data ) && !empty( $user_data )) {
        $login_data    = array();
        $login_data['user_login']      = $user_data->user_login;
        $login_data['user_password']   = $password;
        $login_data['remember']        = $remember;   
        $user_verify                   = wp_signon( $login_data, false ); 
        if ( is_wp_error($user_verify) ) {
            if( !empty( $user_data->user_login) ) {
                echo "Entered your password is wrong";
            }
            else {
                echo 'Invalid Email id';
            }
        }
        else {
            echo '1';
        }
    }
    else {
        echo 'Invalid Email id or password';
    } //condition isset and is not empty.
}
else {
    echo 'data is not received';
}