<?php
   

/*
    Footer Widgets
*/


// widget area creation

//  Footer 1
function footer_1() {
	register_sidebar( array(
		'name'          => 'Footer 1',
		'id'            => 'footer-1',
		'description'   => __( 'Footer Content here', 'robokarthikeyan' ),
		'before_widget' => '<div class="widget-wrapper">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}


add_action( 'widgets_init', 'footer_1' );

//  Footer 2
function footer_2() {
	register_sidebar( array(
		'name'          => 'Footer 2',
		'id'            => 'footer-2',
		'description'   => __( 'Footer Content here', 'robokarthikeyan' ),
		'before_widget' => '<div class="widget-wrapper">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}


add_action( 'widgets_init', 'footer_2' );

//  Footer 3 
function footer_3() {
	register_sidebar( array(
		'name'          => 'Footer 3',
		'id'            => 'footer-3',
		'description'   => __( 'Footer Content here', 'robokarthikeyan' ),
		'before_widget' => '<div class="widget-wrapper">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}


add_action( 'widgets_init', 'footer_3' );

// widget elements



// Register and load the widget

function custom_rp_load_widget() {
    register_widget( 'custom_rp_widget' );
}
add_action( 'widgets_init', 'custom_rp_load_widget' );


class custom_rp_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            
            // Base ID of your widget
            'custom_rp_widget', 
            
            // Widget name will appear in UI
            __('Recent Post Image', 'robokarthikeyan'), 
            
            // Widget description
            array( 'description' => __( 'Recent post with image title view', 'robokarthikeyan' ), ) 
        );
    }
    
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
        
        
        $recent_posts = wp_get_recent_posts(array('numberposts' => $instance['no_of_post']));
        echo '<div class="row">';
        foreach( $recent_posts as $rpost)
        {
            $post_img = get_post_meta($rpost['ID'],'Post_img',true);
            $x_pos = get_post_meta($rpost['ID'],'Xpos',true);
            $y_pos = get_post_meta($rpost['ID'],'Ypos',true);
            $size = get_post_meta($rpost['ID'],'size',true);
            ?>
            <div class="col-xs-6 margin-bottom-30">
                <a href="<?php echo get_permalink($rpost['ID']); ?>">
                    <div class="post-image" style="background: url(<?php echo wp_get_attachment_image_src($post_img,'full')[0]; ?>) no-repeat <?php echo $x_pos .'% '. $y_pos.'% ' ?> / cover; background-size:<?php echo $size; ?>%">
                        <img src="<?php echo get_template_directory_uri() ?>/images/empty.png" alt="">
                    </div>
                </a>
            </div>
            <?php
        }
        echo '</div>';
        wp_reset_query();
        
        echo $args['after_widget'];
    }
    
    public function form( $instance ) {
        if ( isset( $instance[ 'no_of_post' ] ) ) {
            $noOfPost = $instance[ 'no_of_post' ];
        }
        else {
            $noOfPost = 4;
        }
        
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = 'Recent Post';
        }
        // Widget admin form
        ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'no_of_post' ); ?>"><?php _e( 'No Of Post:' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'no_of_post' ); ?>" name="<?php echo $this->get_field_name( 'no_of_post' ); ?>" type="text" value="<?php echo esc_attr( $noOfPost ); ?>" />
            </p>
        <?php 
    }
    
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['no_of_post'] = ( ! empty( $new_instance['no_of_post'] ) ) ? strip_tags( $new_instance['no_of_post'] ) : '';
        return $instance;
    }
}

//---------------------------------------------------------------------------------------//