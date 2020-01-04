<?php

function file_scripts() {

// Load our main stylesheet.
    wp_enqueue_style('style-bootstrap', get_stylesheet_directory_uri() . '/dist/css/bootstrap.min.css', false, filemtime(get_stylesheet_directory() . '/dist/css/bootstrap.min.css'), 'all');
    wp_enqueue_style('style', get_stylesheet_uri());

    wp_enqueue_script('jquery');
    wp_enqueue_script('jq-js', get_template_directory_uri() . '/dist/js/bootstrap.bundle.min.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'file_scripts');