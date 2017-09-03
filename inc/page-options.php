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
    $x_pos = get_post_meta($post->ID,'Xpos',true);
    $y_pos = get_post_meta($post->ID,'Ypos',true);
    $size = get_post_meta($post->ID,'size',true);
    
    if(!$post_img)
    {
        add_post_meta($post->ID,'Post_img','');
        $post_img = get_post_meta($post->ID,'Post_img',true);
    } 
    if(!$x_pos)
    {
        add_post_meta($post->ID,'Xpos',50);
        $x_pos = get_post_meta($post->ID,'Xpos',true);
    } 
    if(!$y_pos)
    {
        add_post_meta($post->ID,'Ypos',50);
        $y_pos = get_post_meta($post->ID,'Ypos',true);
    }
    
    if(!$size)
    {
        add_post_meta($post->ID,'size',100);
        $size = get_post_meta($post->ID,'size',true);
    }
        
//    echo '<pre>';
//    print_r($post);
//    echo '</pre>';
    
    ?>
    
    <div class="container-fluid">
        <h4>Image</h4>
        <div class="post-image-option">
            <div class="row">
                <div class="col-sm-4">
                    <div class="post-image-wrapper">
                        <?php if($post_img): ?>
                            <div class="img" id="img-1" style="background: url(<?php echo wp_get_attachment_image_src($post_img,'full')[0]; ?>) no-repeat <?php echo $x_pos .'% '. $y_pos.'% ' ?> / cover; background-size:<?php echo $size; ?>%">
                                <img src="<?php echo get_template_directory_uri() . '/images/empty.png' ?>" alt="" class="img-responsive">
                            </div>
                        <?php else : ?>
                            <div class="img" id="img-1" style="background: url(<?php echo wp_get_attachment_image_src($post_img,'full')[0]; ?>) no-repeat <?php echo $x_pos .'% '. $y_pos.'% ' ?> / cover; background-size:<?php echo $size; ?>%">
                                <img src="<?php echo get_template_directory_uri() . '/images/blank.png' ?>" alt="" class="img-responsive">
                            </div>
                        <?php endif; ?>
                        <div class="controls">
                            <div class="left"><i class="fa fa-angle-left"></i></div>
                            <div class="right"><i class="fa fa-angle-right"></i></div>
                            <div class="top"><i class="fa fa-angle-up"></i></div>
                            <div class="bottom"><i class="fa fa-angle-down"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <h3>Post image options</h3>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <p>Horizontal</p>
                                <input type="number" class="form-control" min="0" max="100" name="img-pos-x" data-position="x" value="<?php echo $x_pos; ?>">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <p>Vertical</p>
                                <input type="number" class="form-control" min="0" max="100" name="img-pos-y" data-position="y" value="<?php echo $y_pos; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <p>Scale</p>
                        <div id="slider" data-target="#img-1" data-value="<?php echo $size; ?>"></div>
                        <input type="number" class="hide-me" min="0" max="200" name="img-size" value="<?php echo $size; ?>">
                    </div>
                    <div class="btn btn-black" data-trigger="media" data-target="[name='post-img']" data-message="Choose post image" data-preview="#img-1" data-isbg="true">Upload <i class="fa fa-arrow-up"></i></div>
                </div>
            </div>
        </div>
        <input type="text" class="hide-me" name="post-img" value="<?php echo $post_img; ?>">
    </div>
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
    $x_pos = sanitize_text_field( $_POST['img-pos-x'] );
    $y_pos = sanitize_text_field( $_POST['img-pos-y'] );
    $size = sanitize_text_field( $_POST['img-size'] );
    
    echo $size;
    
    update_post_meta($post_id,'Post_img',$post_img);
    update_post_meta($post_id,'Xpos',$x_pos);
    update_post_meta($post_id,'Ypos',$y_pos);
    update_post_meta($post_id,'size',$size);
    set_post_thumbnail($post_id,$post_img);
}