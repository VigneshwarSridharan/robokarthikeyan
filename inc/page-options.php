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
    
    $header = get_post_meta($post->ID,'heaer_img',true);
    
    $footer = get_post_meta($post->ID,'footer_img',true);
    
    if(!$header)
    {
        add_post_meta($post->ID,'heaer_img',get_option( 'headerimg' ),true);
        $header = get_post_meta($post->ID,'heaer_img',true);
    }
    if(!$footer)
    {
        add_post_meta($post->ID,'footer_img',get_option( 'footerimg' ),true);
        $footer = get_post_meta($post->ID,'footer_img',true);
    }
    
    ?>
    <div class="meta-box-wrapper">
        <div class="option-wrppaer wrapper">
            <div class="mb-label">Header Image</div>
            <div class="mb-value">
                <div class="img-upload">
                    <?php if($header) : ?>
                        <img src="<?php echo wp_get_attachment_image_src($header,'full')[0]; ?>" class="img-responsive" id="page-header-img-preview" alt="">
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri() . '/images/admin/bg.jpg' ?>" class="img-responsive" id="page-header-img-preview" alt="">
                    <?php endif; ?>
                    <div class="hover">
                        <div type="button" class="button button-primary upload-img" data-target="page-header-img">Upload Image</div>
                        <input type="text" name="page-header-img" id="page-header-img" hidden="hidden" value="<?php echo $header; ?>" >
                    </div>
                </div>
            </div>
        </div>
        <div class="option-wrppaer wrapper">
            <div class="mb-label">Footer Image</div>
            <div class="mb-value">
                <div class="img-upload">
                    <?php if($footer) : ?>
                        <img src="<?php echo wp_get_attachment_image_src($footer,'full')[0]; ?>" class="img-responsive" id="page-footer-img-preview" alt="">
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri() . '/images/admin/bg.jpg' ?>" class="img-responsive" id="page-footer-img-preview" alt="">
                    <?php endif; ?>
                    <div class="hover">
                        <div type="button" class="button button-primary upload-img" data-target="page-footer-img">Upload Image</div>
                        <input type="text" name="page-footer-img" id="page-footer-img" hidden="hidden" value="<?php echo $footer; ?>" >
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function robokarthikeyan_save_page_options($post_id)
{
    if( ! isset( $_POST['robokarthikeyan_custom_page_options_meta_box_nonce'] )) {
        return;
    }
    
    if( ! wp_verify_nonce( $_POST['olefin_custom_page_options_meta_box_nonce'], 'olefin_save_page_options' ) ) {
        return;
    }
    
    if( ! current_user_can( 'edit_post', $post_id )  ) {
        return;
    }
    
    if( ! isset( $_POST['page-header-img'])) {
        return;
    }
    
    $headerimg = sanitize_text_field( $_POST['page-header-img'] );
    $footerimg = sanitize_text_field( $_POST['page-footer-img'] );
    
    update_post_meta($post_id,'heaer_img',$headerimg);
    update_post_meta($post_id,'footer_img',$footerimg);
}