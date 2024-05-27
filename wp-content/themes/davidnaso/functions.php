<?php

/**
 * ACF options page
 */
if (function_exists('acf_add_options_page'))
{
    // add parent
    $parent = acf_add_options_page(array(
        'page_title'    => 'Temainställningar',
        'menu_title'    => 'Temainställningar',
        'redirect'      => true
    ));

    // add sub page
    acf_add_options_sub_page(array(
        'page_title'    => 'Header',
        'menu_title'    => 'Header',
        'parent_slug'   => $parent['menu_slug'],
    ));

    // add sub page
    acf_add_options_sub_page(array(
        'page_title'    => 'Footer',
        'menu_title'    => 'Footer',
        'parent_slug'   => $parent['menu_slug'],
    ));

    // add sub page
    acf_add_options_sub_page(array(
        'page_title'    => 'Email settings',
        'menu_title'    => 'Email settings',
        'parent_slug'   => $parent['menu_slug'],
    ));
}

/**
 * WordPress: Init
 * @return void
 */
add_action('init', function()
{
    /**
     * WordPress: Registers theme support for a given feature.
     * @return void
     */
    add_theme_support('title-tag');

    /**
     * WordPress: Registers theme support for a given feature.
     * @return void
     */
    add_theme_support('post-thumbnails');

    /**
     * WordPress: Registers theme support for a given feature.
     * @return void
     */
    add_theme_support('post-formats', array('gallery'));


    /**
     * WordPress: Registers a single custom Navigation Menu in the custom menu editor
     * @return void
     */
    register_nav_menu('primary', 'Primär meny');



   
});





/**
 * Add new image to admin log in page
 */
add_action("login_head", function() {
echo "
    <style>
        body.login #login h1 a {
        background: url('".get_bloginfo('template_url')."/images/logo-log-in.png') no-repeat scroll center top transparent;height: 150px;width: 319px;}
    </style>";
});


// DIRECTORY_SEPARATOR Adds a slash compatible with server environment / __DIR__ Find which directory the file im in is located
/**
 * WordPress: Enqueue scripts and styles
 * @return void
 */
add_action('wp_enqueue_scripts', function()
{
   $website_json        = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'website.json');
   $json_website_json   = json_decode($website_json);


    // Javascripts // True means footer---False means header
    wp_register_script('js', get_stylesheet_directory_uri() . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'all.min.js', array(), $json_website_json->js, true);
    wp_enqueue_script('js');
    wp_localize_script('js', 'ajax', array(
        'url' => admin_url('admin-ajax.php')
    ));

    // Stylesheets
    wp_register_style('css', get_template_directory_uri() . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'all.min.css', array(), $json_website_json->css, 'all');
    wp_enqueue_style('css');
});


/**
 * Require walker
 */
require 'lib/walker/bs4Navwalker.php';





add_filter('show_admin_bar', '__return_false');