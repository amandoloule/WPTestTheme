<?php

require_once('widgets/class-wp-widget-recent-posts.php');

require_once('class-wp-bootstrap-navwalker.php');

// Theme Support
function adv_theme_support() {
    // Featured Image Support
    add_theme_support('post-thumbnails');

    // Nav Menus
    register_nav_menus(array(
        'primary' => __('Primary Menu')
    ));
}
add_action('after_setup_theme', 'adv_theme_support');

function news_init() {
    $labels = array(
        'name' => 'News',
        'singular_name' => 'News',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New News',
        'edit_item' => 'Edit News',
        'new_item' => 'New News',
        'view_item' => 'View News',
        'search_items' => 'Search News',
        'not_found' =>  'No news found',
        'not_found_in_trash' => 'No news found in Trash'
    );

    $args = array(
        'labels' => $labels,
        'description' => 'A custom post type that holds the news',
        'public' => true,
        'rewrite' => array('slug' => 'news'),
        'has_archive' => true,
        'supports' => array('title', 'editor', 'author', 'excerpt',
            'custom-fields', 'thumbnail'),
        'show_in_rest' => true,
    );
    register_post_type('news', $args);
    flush_rewrite_rules();
}
add_action('init', 'news_init');

function define_news_type_taxonomy() {
    $labels = array(
        'name'              => 'Types',
        'singular_name'     => 'Type',
        'search_items'      => 'Search Types',
        'all_items'         => 'All Types',
        'edit_item'         => 'Edit Type',
        'update_item'       => 'Update Type',
        'add_new_item'      => 'Add New Type',
        'new_item_name'     => 'New Type Name',
        'menu_name'         => 'Type',
        'view_item'         => 'View Types'
    );

    $args = array(
        'labels'       => $labels,
        'hierarchical' => false,
        'query_var'    => true,
        'rewrite'      => true,
        'show_in_rest' => true
    );
    register_taxonomy( 'news-type', 'news', $args );
}
add_action( 'init', 'define_news_type_taxonomy' );

function news_updated_messages( $messages ) {
    $messages['news'] = array(
        '', /* Unused. Messages start at index 1. */
        sprintf('News updated. <a href="%s">View news</a>',
        esc_url(get_permalink($post_ID))),
        'Custom field updated.',
        'Custom field deleted.',
        'News updated.',
        (isset($_GET['revision']) ?
        sprintf('News restored to revision from %s',
        wp_post_revision_title((int)$_GET['revision'], false)) : false),
        sprintf('News published. <a href="%s">View news</a>',
        esc_url(get_permalink($post_ID))),
        'News saved.',
        sprintf('News submitted. <a target="_blank" href="%s">
        Preview news</a>',
        esc_url(add_query_arg('preview', 'true',
        get_permalink($post_ID)))),
        sprintf('News scheduled for: <strong>%1$s</strong>.
        <a target="_blank"
        href="%2$s">Preview news</a>',
        date_i18n('M j, Y @ G:i', strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
        sprintf('News draft updated. <a target="_blank" href="%s">
        Preview news</a>',
        esc_url(add_query_arg('preview', 'true', get_permalink($post_ID))))
    );
    return $messages;
}
add_filter('post_updated_messages', 'news_updated_messages');

// Widget Locations
function init_widgets($id){
    register_sidebar(array(
        'name' => 'Sidebar',
        'id'   => 'sidebar',
        'before_widget' => '<div class="card">',
        'after_widget' => '</div></div>',
        'before_title' => '<div class="card-header">
            <h3 class="card-title">',
        'after_title' => '</h3></div><div class="card-body">'
    ));
}
add_action('widgets_init', 'init_widgets');

//Register Widgets
function wptest_register_widgets(){
    register_widget('WP_Widget_Recent_Posts_Custom');
}
add_action('widgets_init', 'wptest_register_widgets');