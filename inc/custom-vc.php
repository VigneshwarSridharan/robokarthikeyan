<?php

add_action('vc_before_init', 'vc_before_init_actions');

function vc_before_init_actions()
{
    
    require_once(get_template_directory().'/vc-elements/vc-custom-element.php');
}