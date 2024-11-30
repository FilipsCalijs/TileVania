<?php
// Add theme support
if (!function_exists('your_theme_setup')) {
    function your_theme_setup() {
        add_theme_support('title-tag'); // Enables dynamic document titles
        add_theme_support('post-thumbnails'); // Enables featured images
        add_theme_support('custom-logo'); // Enables custom logo
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    }
}
add_action('after_setup_theme', 'your_theme_setup');

// Enqueue styles and scripts
if (!function_exists('your_theme_assets')) {
    function your_theme_assets() {
        wp_enqueue_style('your-theme-style', get_stylesheet_uri());
        wp_enqueue_script('your-theme-script', get_template_directory_uri() . '/src/js/main.js', array(), '1.0', true);
    }
}
add_action('wp_enqueue_scripts', 'your_theme_assets');

// Register menus
if (!function_exists('register_theme_menus')) {
    function register_theme_menus() {
        register_nav_menu('primary-menu', __('Primary Menu'));
    }
}
add_action('init', 'register_theme_menus');

// Add dynamic classes to menu items
if (!function_exists('add_dynamic_menu_classes')) {
    function add_dynamic_menu_classes($items) {
        foreach ($items as $item) {
            if (is_page('casino') && $item->title === 'Casino') {
                $item->classes[] = 'menu-casino-active';
            }
            if (is_page('sports') && $item->title === 'Sports') {
                $item->classes[] = 'menu-sports-active';
            }
            if (is_page('live-casino') && $item->title === 'Live Casino') {
                $item->classes[] = 'menu-live-casino-active';
            }
        }
        return $items;
    }
}
add_filter('wp_nav_menu_objects', 'add_dynamic_menu_classes');

// Enqueue additional styles
if (!function_exists('enqueue_custom_theme_styles')) {
    function enqueue_custom_theme_styles() {
        wp_enqueue_style(
            'styles', 
            get_template_directory_uri() . '/src/css/style.css'
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_theme_styles');

// Enqueue custom JS for live preview
if (!function_exists('enqueue_custom_js')) {
    function enqueue_custom_js() {
        wp_enqueue_script('custom-live-preview', get_template_directory_uri() . '/js/custom-live-preview.js', array('jquery', 'customize-preview'), null, true);
    }
}
add_action('customize_preview_init', 'enqueue_custom_js');
