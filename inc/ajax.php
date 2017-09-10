<?php

add_action( 'wp_ajax_add_foobar', 'add_foobar' );
add_action('wp_ajax_nopriv_add_foobar', 'add_foobar');

function add_foobar() {
    // Handle request then generate response using WP_Ajax_Response
    ?>
    <div class="hello">hello</div>
    <?php
    // Don't forget to stop execution afterward.
    die();
}