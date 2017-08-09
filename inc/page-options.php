<?php

/*

    ====================================
        Page custom option meta box
    ====================================

*/

add_action('add_meta_boxes', 'robokarthikeyan_custom_add_meta_box');
add_action('save_post','robokarthikeyan_save_page_options');



function robokarthikeyan_custom_add_meta_box() {
    add_meta_box('page_options','Page Options','robokarthikeyan_custom_page_options_callback',array('post','page'));
}

function robokarthikeyan_custom_page_options_callback($post) 
{
    wp_nonce_field('robokarthikeyan_save_page_options','robokarthikeyan_custom_page_options_meta_box_nonce');
    
    $post_img = get_post_meta($post->ID,'Post_img',true);
    
    if($post_img)
    {
        add_post_meta($post->ID,'Post_img','hello world');
        $post_img = get_post_meta($post->ID,'Post_img',true);
    } 
    
    echo $post_img; 
        
    echo '<pre>';
    print_r($post);
    echo '</pre>';
    
    ?>
    
    <input type="text" name="post-img">
    
    <?php
}

function robokarthikeyan_save_page_options($post_id)
{
    if( ! isset( $_POST['robokarthikeyan_custom_page_options_meta_box_nonce'] )) {
        return;
    }
    
    if( ! wp_verify_nonce( $_POST['robokarthikeyan_custom_page_options_meta_box_nonce'], 'robokarthikeyan_save_page_options' ) ) {
        return;
    }
    
    if( ! current_user_can( 'edit_post', $post_id )  ) {
        return;
    }
    
    if( ! isset( $_POST['post-img'])) {
        return; 
    }
    
    $post_img = sanitize_text_field( $_POST['post-img'] );
    
    update_post_meta($post_id,'Post_img',$post_img);
    set_post_thumbnail($post_id,$post_img);
}