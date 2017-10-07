<?php

add_action( 'wp_ajax_add_foobar', 'add_foobar' );
add_action('wp_ajax_nopriv_add_foobar', 'add_foobar');

function add_foobar() {
    // Handle request then generate response using WP_Ajax_Response
    $pass = array(
        'redirect' => 'https://google.com',
        'error' => '',
        'username_exists' => false,
        'email_exists' => false,
    );
    
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['pword'];
    
    if(username_exists($username))
    {
        $pass['username_exists'] = true;
    }
    
    if(email_exists($email))
    {
        $pass['email_exists'] = true;
    }
    
    if($pass['username_exists'] == false && $pass['email_exists'] == false )
    {
        wp_create_user( $username, $password , $email );
    }
    
    wp_login($username,$password);
        
    echo json_encode($pass); 
//    
    ?>
    <?php
    // Don't forget to stop execution afterward.
    die();
}