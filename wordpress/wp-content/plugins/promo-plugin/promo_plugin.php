<?php
/*
Plugin Name: Promo Plugin
Author: Groupe 4
Version: 1.1.1
*/

function admin_menu_page()
{
    add_menu_page('Promo', 'Promo Banner', 'manage_options', 'promo-plugin','promo_plugin_admin_page','dashicons-money-alt',4);
}
add_action('admin_menu', 'admin_menu_page');

function registerSettings()
{
    register_setting('promo-plugin', 'text_promo');
    register_setting('promo-plugin', 'color_promo');
    register_setting('promo-plugin', 'text_color_promo');

add_settings_section('text_promo_options_section', 'Ajoutez une bannière de promotion sur votre homepage', function(){
        
},'promo-plugin');

add_settings_section('color_promo_options_section', 'Ajoutez la couleur de votre bannière de promotion', function(){

},'promo-plugin');

add_settings_section('text_color_promo_options_section', 'Ajoutez la couleur du texte de votre bannière de promotion', function(){

},'promo-plugin');

add_settings_field('color_promo_options_section', 'Ajoutez votre text de promotion', function()
{
    ?>
        <textarea name="text_promo" id="" cols="30" rows="10" style="width:80%;"><?= get_option('text_promo'); ?></textarea>
    <?php
},'promo-plugin', 'text_promo_options_section');
add_settings_field('color_promo_options_section', 'Ajoutez la couleur de fond votre bannière de promotion', function()
{
    ?>
    <input type="color" name="color_promo" value="<?=get_option('color_promo')?>">
    <?php
},'promo-plugin', 'color_promo_options_section');

add_settings_field('color_promo_options_section', 'Ajoutez la couleur du texte de votre bannière de promotion', function()
{
    ?>
    <input type="color" name="text_color_promo" value="<?=get_option('text_color_promo')?>">
    <?php
},'promo-plugin', 'text_color_promo_options_section');
}

add_action('admin_init', 'registerSettings');

function promo_plugin_admin_page()
{
        ?>
        <div class="wrap">
            <h1>Bienvenue dans le plugin promotion</h1>
            <form action="options.php" method="post">
                <?php 
                    settings_fields('promo-plugin');
                    do_settings_sections('promo-plugin');
                    submit_button();
                ?>
            </form>
        </div>
    <?php

}

?>