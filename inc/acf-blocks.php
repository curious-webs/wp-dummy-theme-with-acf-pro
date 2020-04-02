<?php

add_action('acf/init', 'my_acf_init');

function my_acf_init() {  

    // check function exists
    // check function exists
    if (function_exists('acf_register_block')) {

        // register a testimonial block
        acf_register_block(array(
            'name' => 'introduction-block',
            'title' => __('Introduction Section'),
            'description' => __('Home Page Introduction Section'),
            'render_template' => 'custom-blocks/acf/introduction-block.php',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => array('home page', 'introduction'),
        ));  
    }
}
