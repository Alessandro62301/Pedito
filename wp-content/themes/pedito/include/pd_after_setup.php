<?php
function pd_theme_styles(){
    // wp_enqueue_style('theme_css', get_template_directory_uri().'/assets/css/theme.css');

    // wp_enqueue_script('theme_js',get_template_directory_uri().'/assets/js/theme.min.js',array('jquery','',true));
}
function pd_after_setup(){

    add_theme_support('post-thumbnails');
    
    register_nav_menu('primary',__('Primary Menu', 'pedito'));
}
function pd_widgets(){
    register_sidebar(array(
        'name' => __('Primary Sidebar'),
        'id' => 'pd_sidebar',
        'description'=> __('Sidebar Pedito'),

        'before_title' => '<div><h4 class="title">',
        'after_title' => '</h4></div>',

        'before_widget' => '<div id=%1$s"">',
        'after_widget' => '</div>',
    ));
}