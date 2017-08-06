<?php
/**
 * Enqueue functions
 *
 * @package robokarthikeyan
 */




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
