<?php

add_action('after_setup_theme', 'wpheticSetupTheme');
function wpheticSetupTheme()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'Menu en-tete');
}

add_action('nav_menu_css_class', 'wpheticMenuClass');
function wpheticMenuClass(array $classes){
    $classes[] = 'nav-item';
    return $classes;
}

add_filter('nav_menu_link_attributes', 'wpheticMenuLinkClass');
function wpheticMenuLinkClass(array $attrs){
    $attrs['class'] = 'nav-link';
    return $attrs;
}

add_action('wp_enqueue_scripts', 'wpheticBootstrap');
function wpheticBootstrap()
{
    wp_enqueue_style('bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
    wp_enqueue_script("bootstrap_js", "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js", [], false, true);
}


function wpheticPaginate()
{
    $pages = paginate_links(['type' => 'array']);
    var_dump($pages);die;
    if (!$pages) {
        return null;
    }

    ob_start();
    echo '<nav aria-label="Page navigation example">';
    echo '<ul class="pagination">';

    foreach ($pages as $page) {
        $active = strpos($page, 'current');
        $liClass = $active ? 'page-item active' : 'page-item';
        $page = str_replace('page-numbers', 'page-link', $page);

        echo sprintf('<li class="%s">%s</li>', $liClass, $page);
    }
    echo '</ul></nav>';

    return ob_get_clean();
}

add_action('init', 'aldbnbInit');
function aldbnbInit() {
    $args = array( 
        'label' => 'Property',
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-building',
        'description' => 'The property of my sites.',
        'supports' => ['title', 'editor', 'thumbnail', 'custom-fields', 'revisions'],
        'show_in_rest' => true, 
        'has_archive' => true,
        'taxonomies' => array('category'),
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type('property', $args);
}

require 'Classes/SponsoCheckbox.php';
$checkbox = new SponsoCheckbox('wpheticSponso');

require_once('Classes/PropertyInformations.php');
PropertyInformations::register($_POST);

include_once ABSPATH . 'wp-admin/includes/plugin.php';
