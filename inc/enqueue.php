<?php
/**
 * Enqueue functions
 *
 * @package robokarthikeyan
 */

/*
    =================================
      Admin Panel enqueue functions
    =================================
*/

function robokarthikeyan_admin_scripts( $hook )
{
    
    // Admin stylesheet enqueue
    wp_register_style('robokarthikeyan-admin',get_template_directory_uri().'/css/admin-style.css',array(),'1.0.0','all');
    wp_enqueue_style( 'robokarthikeyan-admin' );
    
    wp_enqueue_media();
    // Admin jscript enqueue
    wp_register_script('robokarthikeyan-script',get_template_directory_uri().'/js/admin-script.js',array('jquery'),'1.0.0',true);
    wp_enqueue_script('robokarthikeyan-script');
    
    
}

add_action('admin_enqueue_scripts', 'robokarthikeyan_admin_scripts');


/*
    ==================================
        Front ent enqueue function
    ==================================
    
*/

function robokarthikeyan_load_scripts()
{
    // Css Files
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('Font Awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style('template', get_template_directory_uri() . '/css/template.css');
    
    // JS Scripts
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'),'3.3.6', true);
    wp_enqueue_script('script', get_template_directory_uri().'/js/script.js',array('jquery'),'1.0.0,true');
    
}

add_action('wp_enqueue_scripts', 'robokarthikeyan_load_scripts',100);
