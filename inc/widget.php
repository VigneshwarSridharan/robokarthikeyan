<?php
   

/*
    Footer Widgets
*/

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