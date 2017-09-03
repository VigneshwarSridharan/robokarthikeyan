<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package robokarthikeyan
 */

?>
<div class="post-items-grid">
    <div class="row flex-center">
        <div class="col-sm-6">
            <?php 
                $post_img = get_post_meta(get_the_ID(),'Post_img',true);
                $x_pos = get_post_meta(get_the_ID(),'Xpos',true);
                $y_pos = get_post_meta(get_the_ID(),'Ypos',true);
                $size = get_post_meta(get_the_ID(),'size',true);
            ?>
            <a href="<?php echo get_permalink(get_the_ID()); ?>">
                <div class="post-img" style="background: url(<?php echo wp_get_attachment_image_src($post_img,'full')[0]; ?>) no-repeat <?php echo $x_pos .'% '. $y_pos.'% ' ?> / cover; background-size:<?php echo $size; ?>%">
                    <img src="<?php echo get_template_directory_uri() .'/images/empty.png' ?>" class="img-responsive" alt="">
                </div>
            </a>
        </div>
        <div class="col-sm-6">
            <div class="post-content">
                <div class="head">
                    <a href="<?php echo get_permalink(get_the_ID()); ?>">
                        <h3 class="heading"> <?php echo get_the_title(); ?> </h3>
                    </a>
                    <p><i><?php robokarthikeyan_posted_on(); ?></i></p>
                </div>
                <p><?php
                    the_excerpt(); 
                ?></p>
                <a href="<?php echo get_permalink(get_the_ID()); ?>"><div class="btn btn-move"><span>Read More</span> <i class="fa fa-arrow-right"></i></div></a>
            </div>
            
        </div>
    </div>
</div>

