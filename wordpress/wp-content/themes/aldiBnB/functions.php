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



function redirect_to_custom_login(){
    wp_redirect(site_url() . "/login");
    exit();
}
add_action("wp_logout","redirect_to_custom_login");

add_action("init","fn_redirect_wp_admin");
function fn_redirect_wp_admin(){
    global $pagenow;
    if($pagenow == "wp-login.php" && $_GET['action'] != "logout"){
        wp_redirect(site_url() . "/login");
        exit();
    }
}

function add_moderator_role() {
    add_role(
        'moderator',
        'Modérateur/Modératrice',
        array(
            'read' => true,
            'edit_posts' => true,
            'moderate_comments' => true,
        ),
    );
}
 
add_action( 'init', 'add_moderator_role');


require 'Classes/SponsoCheckbox.php';
$checkbox = new SponsoCheckbox('wpheticSponso');

require_once('Classes/PropertyInformations.php');
PropertyInformations::register($_POST);

include_once ABSPATH . 'wp-admin/includes/plugin.php';





function tf_check_user_role( $roles ) {
    if ( is_user_logged_in() ) :
        $user = wp_get_current_user();
        $currentUserRoles = $user->roles;
        $isMatching = array_intersect( $currentUserRoles, $roles);
        $response = false;
        if ( !empty($isMatching) ) :
            $response = true;        
        endif;
        return $response;
    endif;
}
$roles = [ 'customer', 'subscriber' ];
if ( tf_check_user_role($roles) ) :
    add_filter('show_admin_bar', '__return_false');
endif;

function add_property_form_management() {
	if (isset($_POST['property-infos-envoi']) && isset($_POST['property-verif'])) {

		if (wp_verify_nonce($_POST['property-verif'], 'add-property')) {

            echo ("</br>");
            echo ("</br>");
            if (empty($_POST["aldibnb-name"])) {
                global $nameErr; 
                $nameErr= "Name is required";
            } else {
                $name = strval($_POST['aldibnb-name']);
            }
            global $priceErr ;
            if (empty($_POST["aldibnb-prix"])) {    
                $priceErr= "Price is required";
            } else {
                if((int) $_POST['aldibnb-prix']) {
                    $prix = intval($_POST['aldibnb-prix']);
                } else {
                    $priceErr= "Price is not number";
                }
            }

            if (empty($_POST["aldibnb-localisation"])) {
                global $localisationErr;
                $localisationErr = "Localisation is required";
            } else {
                $localisation = strval($_POST['aldibnb-localisation']);
            }

            global $categoryErr;
            if (empty($_POST["aldibnb-category"])) {
                $categoryErr = "Category is required";
            } else {
                if($_POST['aldibnb-category'] == 'appartement') {
                    $category = array(3);
                } elseif ($_POST['aldibnb-category'] == 'chalet') {
                    $category = array(5);
                } elseif ($_POST['aldibnb-category'] == 'maison') {
                    $category = array(4);
                } elseif ($_POST['aldibnb-category'] == 'villa') {
                    $category = array(2);
                } else {
                    $categoryErr = "Unknow Category";
                }  
            }

            /*
            if (empty($_POST["aldibnb-image"])) {
                global $imageErr;
                $imageErr = "Image is required";
            } else {
                $image = strval($_POST['aldibnb-image']);
            }
            */

            if (empty($_POST["aldibnb-description"])) {
                global $descriptionErr;
                $descriptionErr = "Description is required";
            } else {
                $description = strval($_POST['aldibnb-description']);
            }
            
            if($name && $prix && count($category) >0 && $localisation && $description) {
                $my_post = array(
                    'post_title'    => $name,
                    'post_type'     => 'property',
                    'post_content'  => '',
                    'post_status'   => 'draft',
                    'post_author'   => 1,
                    'post_category' => $category
                );
    
                $post_id = wp_insert_post($my_post);
                update_post_meta($post_id, '_description', $description);
                update_post_meta($post_id, '_price', $prix);
                update_post_meta($post_id, '_localisation', $localisation);
                
                set_post_thumbnail($post_id, 4);
                
                global $information;
                $information = "Propriété envoyé";
            }
		}

	}
}
add_action('template_redirect', 'add_property_form_management');

function update_property_form_management() {
	if (isset($_POST['property-update-infos-envoi']) && isset($_POST['property-update-verif'])) {

		if (wp_verify_nonce($_POST['property-update-verif'], 'update-property')) {

            if (empty($_POST["aldibnb-name"])) {
                global $nameErr; 
                $nameErr= "Name is required";
            } else {
                $name = strval($_POST['aldibnb-name']);
            }
            global $priceErr ;
            if (empty($_POST["aldibnb-prix"])) {    
                $priceErr= "Price is required";
            } else {
                if((int) $_POST['aldibnb-prix']) {
                    $prix = intval($_POST['aldibnb-prix']);
                } else {
                    $priceErr= "Price is not number";
                }
            }

            if (empty($_POST["aldibnb-localisation"])) {
                global $localisationErr;
                $localisationErr = "Localisation is required";
            } else {
                $localisation = strval($_POST['aldibnb-localisation']);
            }

            global $categoryErr;
            if (empty($_POST["aldibnb-category"])) {
                $categoryErr = "Category is required";
            } else {
                if($_POST['aldibnb-category'] == 'appartement') {
                    $category = array(3);
                } elseif ($_POST['aldibnb-category'] == 'chalet') {
                    $category = array(5);
                } elseif ($_POST['aldibnb-category'] == 'maison') {
                    $category = array(4);
                } elseif ($_POST['aldibnb-category'] == 'villa') {
                    $category = array(2);
                } else {
                    $categoryErr = "Unknow Category";
                }  
            }

            /*
            if (empty($_POST["aldibnb-image"])) {
                global $imageErr;
                $imageErr = "Image is required";
            } else {
                $image = strval($_POST['aldibnb-image']);
            }
            */

            if (empty($_POST["aldibnb-description"])) {
                global $descriptionErr;
                $descriptionErr = "Description is required";
            } else {
                $description = strval($_POST['aldibnb-description']);
            }
            
            if($name && $prix && count($category) >0 && $localisation && $description) {
                $post_id = get_post(intval($_POST['aldibnb-id']))->ID;
                $my_post = array(
                    'ID'            => $post_id,
                    'post_title'    => $name,
                    'post_category' => $category
                );
    
                wp_update_post($my_post);
                update_post_meta($post_id, '_description', $description);
                update_post_meta($post_id, '_price', $prix);
                update_post_meta($post_id, '_localisation', $localisation);
                
                //set_post_thumbnail($post_id, 4);
                
                global $information;
                $information = "MISE A JOUR TERMINE";
            }
		}

	}
}
add_action('template_redirect', 'update_property_form_management');


