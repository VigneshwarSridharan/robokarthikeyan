<?php


/*

    =========================================  
              Post view Style
    =========================================

*/

class PostView extends WPBakeryShortCode {
    //Element init
    function __construct() {
        add_action('init',array( $this, 'Post_view_mapping' ));
        add_shortcode('post_view', array( $this, 'post_view_html'));
    }
    
    public function Post_view_mapping()
    {
        
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }
        
        vc_map(
            array(
                'name' => __('Post view', 'robokarthikeyan'),
                'base' => 'post_view',
                'description' => __('post viw layout', 'robokarthikeyan'), 
                'category' => __('Theme', 'robokarthikeyan'),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __( 'Title', 'robokarthikeyan' ),
                        'param_name' => 'view_title',
                        'value' => __( '', 'robokarthikeyan' ),
                        'admin_label' => false,
                    ),
                    
                    array(
                        'type' => 'attach_image',
                        'holder' => 'div',
                        'class' => 'title-class',
                        'heading' => __( 'image', 'robokarthikeyan' ),
                        'param_name' => 'view_img',
                        'value' => __( '', 'robokarthikeyan' ),
                        'admin_label' => false,
                    ),
                    
                    array(
                        'type' => 'textarea',
                        'holder' => 'p',
                        'class' => 'title-class',
                        'heading' => __( 'Title', 'robokarthikeyan' ),
                        'param_name' => 'view_text',
                        'value' => __( '', 'robokarthikeyan' ),
                        'admin_label' => false,
                    ),
                    
                    array(
                        'type' => 'animation_style',
                        'heading' => __( 'Animation Style', 'robokarthikeyan' ),
                        'param_name' => 'animation',
                        'description' => __( 'Choose your animation style', 'robokarthikeyan' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => 'title-class',
                        'heading' => __( 'Extra Class', 'robokarthikeyan' ),
                        'param_name' => 'extra_class',
                        'value' => __( '', 'robokarthikeyan' ),
                        'description' => __( 'Enter title extra class.', 'robokarthikeyan' ),
                        'admin_label' => false,
                    ),
                    
                    array(
                        'type' => 'vc_link',
                        'holder' => 'a',
                        'class' => 'title-class',
                        'heading' => __( 'Link', 'robokarthikeyan' ),
                        'param_name' => 'viw_link',
                        'admin_label' => false,
                    ),
                )
            )
        );
    }
    //Element Html
    public function post_view_html($atts)
    {
        // params extraction
        extract(
            shortcode_atts(
                array(
                    'view_title' => '',
                    'view_img' => '',
                    'view_text' => '',
                    'animation' => '',
                    'extra_class' => '',
                    'viw_link' => ''
                ),
                $atts
            )
        );
        
        $animation_classes = $this->getCSSAnimation( $animation );
        
        $url = vc_build_link($viw_link);
        
        $img = wp_get_attachment_image_src($view_img,'full');
        
        $html = '<div class="post-view left '.$extra_class.' '.$animation_classes.'">
            <div class="row flex-center">
                <div class="col-sm-6">
                    <img src="'.$img[0].'" class="img-responsive" />
                </div>
                <div class="col-sm-6">
                    <div class="post-content">
                        <div class="head">
                            <h3 class="heading">'.$view_title.'</h3>
                        </div>
                        <p>'.$view_text.'</p>
                        <a href="'.$url['url'].'><div class="btn btn-move"><span>Read More</span> <i class="fa fa-arrow-right"></i></div></a>
                    </div>
                </div>
            </div>
        </div>';
        
        
        return $html;
    }
}

new PostView();

/*

    =========================================  
              Section Title Style
    =========================================

*/

class themeTitle extends WPBakeryShortCode {
    //Element init
    function __construct() {
        add_action('init',array( $this, 'theme_title_mapping' ));
        add_shortcode('theme_title', array( $this, 'theme_title_html'));
    }
    
    public function theme_title_mapping()
    {
        
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }
        
        vc_map(
            array(
                'name' => __('Title', 'robokarthikeyan'),
                'base' => 'theme_title',
                'description' => __('Title text', 'robokarthikeyan'), 
                'category' => __('Theme', 'robokarthikeyan'),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __( 'Title', 'robokarthikeyan' ),
                        'param_name' => 'title',
                        'value' => __( '', 'robokarthikeyan' ),
                        'admin_label' => false,
                    ),
                    
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => 'title-class',
                        'heading' => __( 'Background Title', 'robokarthikeyan' ),
                        'param_name' => 'bg_title',
                        'value' => __( '', 'robokarthikeyan' ),
                        'admin_label' => false,
                    ),
                    
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => 'title-class',
                        'heading' => __( 'Background Title Font Size', 'robokarthikeyan' ),
                        'param_name' => 'bg_font_size',
                        'value' => __( '', 'robokarthikeyan' ),
                        'description' => __( 'Enter the value by px,em,%,ext.', 'robokarthikeyan' ),
                        'admin_label' => false,
                    ),
                    
                    array(
                        'type' => 'animation_style',
                        'heading' => __( 'Animation Style', 'robokarthikeyan' ),
                        'param_name' => 'animation',
                        'description' => __( 'Choose your animation style', 'robokarthikeyan' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => 'title-class',
                        'heading' => __( 'Extra Class', 'robokarthikeyan' ),
                        'param_name' => 'extra_class',
                        'value' => __( '', 'robokarthikeyan' ),
                        'description' => __( 'Enter title extra class.', 'robokarthikeyan' ),
                        'admin_label' => false,
                    ),
                )
            )
        );
    }
    //Element Html
    public function theme_title_html($atts)
    {
        // params extraction
        extract(
            shortcode_atts(
                array(
                    'title' => '',
                    'bg_title' => '',
                    'bg_font_size' => '',
                    'animation' => '',
                    'extra_class' => ''
                ),
                $atts
            )
        );
        
        $animation_classes = $this->getCSSAnimation( $animation );
        
        $size = '';
        
        if($bg_font_size)
        {
            $size = 'font-size:'.$bg_font_size; 
        }
        
        $html = '<div class="section-title '.$extra_class.' '.$animation_classes.'">
            <h1>'.$title.'</h1>
	        <div class="bg-text"  style="'.$size.'">'.$bg_title.'</div>
	    </div>';
        
        return $html;
    }
}

new themeTitle();
/*

    =========================================  
              Button Style
    =========================================

*/

class themeButton extends WPBakeryShortCode {
    
    // Element init
    function __construct() {
        add_action('init', array( $this, 'theme_buttom_mapping' ));
        add_shortcode('theme_button', array( $this, 'theme_button_html' ));
    }
    
    // Element Mapping
    public function theme_buttom_mapping()
    {
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }
        
        vc_map(
            array(
                'name' => __('Theme Button', 'robokarthikeyan'),
                'base' => 'theme_button',
                'description' => __('Button', 'robokarthikeyan'), 
                'category' => __('Theme', 'robokarthikeyan'),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __( 'Text', 'robokarthikeyan' ),
                        'param_name' => 'btn_text',
                        'admin_label' => false,
                    ),
                    
                    array(
                        'type' => 'vc_link',
                        'holder' => 'a',
                        'class' => 'title-class',
                        'heading' => __( 'Link', 'robokarthikeyan' ),
                        'param_name' => 'link',
                        'admin_label' => false,
                    ),
                    
                )
            )
        );
    }
    
    // Element html
     
    public function theme_button_html($atts)
    {
        extract(
            shortcode_atts(
                array(
                    'btn_text' => '',
                    'link' => '#'
                ),
                $atts
            )
        );
        
        $url = vc_build_link($link);
        $html = '<a href="'.$url['url'].'" target="'.$url['target'].'"><div class="btn btn-move">
                    <span>'.$btn_text.'</sapn>
                    <i class="fa fa-arrow-right"></i>
                </div></a>';
        
        return $html;
    }
}

new themeButton();

/*
        ===================================
                Counter items
        ===================================
        
*/

class olefinIconCounter extends WPBakeryShortCode {
    
    // Element init
    function __construct() {
        add_action('init', array( $this, 'olefin_icon_counter_mapping' ));
        add_shortcode('olefin_icon_counter', array( $this, 'olefin_icon_counter_html' ));
    }
    
    // Element Mapping
    public function olefin_icon_counter_mapping()
    {
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }
        
        vc_map(
            array(
                'name' => __('Olefin Icon Counter', 'robokarthikeyan'),
                'base' => 'olefin_icon_counter',
                'description' => __('Icon Counter', 'robokarthikeyan'), 
                'category' => __('Olefin', 'robokarthikeyan'),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __( 'Counter Text', 'robokarthikeyan' ),
                        'param_name' => 'count_text',
                        'admin_label' => false,
                    ),
                    
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => 'title-class',
                        'heading' => __( 'Counter Icon Class', 'robokarthikeyan' ),
                        'param_name' => 'count_icon_class',
                        'admin_label' => false,
                    ),
                    
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => 'title-class',
                        'heading' => __( 'Counter Number', 'robokarthikeyan' ),
                        'param_name' => 'number',
                        'admin_label' => false,
                    ),
                    
                )
            )
        );
    }
    
    // Element html
    
    public function olefin_icon_counter_html($atts)
    {
        extract(
            shortcode_atts(
                array(
                    'count_text' => '',
                    'count_icon_class' => '',
                    'number' => ''
                ),
                $atts
            )
        );
    
        
        $html = '<div class="olefin-counter-item-wrapper">
            <div class="flip">
                <div class="front-side">
                    <div class="olefin-icon">
                        <i class="'.$count_icon_class.'"></i>
                    </div>
                    <h4>'.$count_text.'</h4>
                </div>
                <div class="back-side">
                    <div class="no">'.$number.'</div>
                    <h4>'.$count_text.'</h4>
                </div>
            </div>
        </div>';
        
        
        return $html;
    }
}

new olefinIconCounter();

class olefinMovie extends WPBakeryShortCode {
    
    // Element init
    function __construct() {
        add_action('init', array( $this, 'olefin_Movie_mapping' ));
        add_shortcode('olefin_Movie', array( $this, 'olefin_Movie_html' ));
    }
    
    // Element Mapping
    public function olefin_Movie_mapping()
    {
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }
        
        vc_map(
            array(
                'name' => __('Olefin Movie Grid', 'robokarthikeyan'),
                'base' => 'olefin_Movie',
                'description' => __('Icon Counter', 'robokarthikeyan'), 
                'category' => __('Olefin', 'robokarthikeyan'),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __( 'Page Id', 'robokarthikeyan' ),
                        'param_name' => 'id',
                        'admin_label' => false,
                    ),
                    
                    array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'title-class',
                        'heading' => __( 'Tags', 'robokarthikeyan' ),
                        'param_name' => 'tags',
                        'admin_label' => false,
                    ),
                    
                    array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'title-class',
                        'heading' => __( 'View', 'robokarthikeyan' ),
                        'param_name' => 'view',
                        'admin_label' => false,
                    ),
                    
                    array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'title-class',
                        'heading' => __( 'Star', 'robokarthikeyan' ),
                        'param_name' => 'star',
                        'admin_label' => false,
                    ),
                    
                )
            )
        );
    }
    
    // Element html
    
    public function olefin_Movie_html($atts)
    {
        extract(
            shortcode_atts( 
                array(
                    'id' => '',
                    'tags' => '',
                    'view' => '',
                    'star' => ''
                ),
                $atts
            )
        );
        $post = get_post($id);
        
        
        $html = '<div class="movie-grid-item">
            <img src="'.get_the_post_thumbnail_url( $id, 'full' ).'" class="img-responsive" alt="">
            <div class="hover">
                <a href="'.get_permalink($id).'" class="head">
                    <h3>'.$post->post_title.'</h3>
                </a>
                <a href="'.get_permalink($id).'" class="play">
                    <i class="icon-play"></i>
                </a>
                <div class="footer">
                    <span><i class="fa fa-calendar-o"></i> '.explode(" ",$post->post_date)[0].'</span>
                    <span><i class="icon-eye-reader"></i> '.$view.'</span>
                    <span><i class="fa fa-star-o"></i> '.$star.'</span>
                </div>
            </div>
        </div>';
        
         
        
        return $html;
    } 
}

new olefinMovie(); 
 