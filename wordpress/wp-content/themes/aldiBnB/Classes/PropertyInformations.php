<?php

class PropertyInformations
{
    const META_KEY = 'infos_property';
    const META_KEY_DESCRIPTION = '_description';
    const META_KEY_PRICE = '_price';
    const META_KEY_LOCALISATION = '_localisation';

    public static function register()
    {
        add_action('add_meta_boxes', [self::class, 'add_property']);
        add_action('save_post', [self::class, 'save_property']);
    }

    public static function add_property()
    {
        add_meta_box(   self::META_KEY, 
                        'Informations about the property', 
                        [self::class, 'render_property'], 
                        'property'
                    );
    }

    public static function render_property($post)
    {
        $description   = get_post_meta($post->ID, self::META_KEY_DESCRIPTION, true);
        $price = get_post_meta($post->ID, self::META_KEY_PRICE, true);
        $localisation  = get_post_meta($post->ID, self::META_KEY_LOCALISATION, true);
    
        ?>
        Description :</br><textarea 
                            style="height: 160px; width: 900px;" 
                            name="<?= self::META_KEY_DESCRIPTION ?>"
                            maxlength="500"><?= $description; ?>
                        </textarea></br>
        Prix :</br><input 
                    type="text" 
                    name="<?= self::META_KEY_PRICE ?>" value="<?= $price; ?>" 
                    /></br>
        Localisation :</br><input
                            type="text" 
                            name="<?= self::META_KEY_LOCALISATION ?>" 
                            value="<?= $localisation; ?>" 
                            /></br>
    
        
        <?php
    }

    public static function save_property(int $post_id)
    {
        if (current_user_can('edit_post', $post_id))
        {
            if (array_key_exists(self::META_KEY_DESCRIPTION, $_POST)){
                update_post_meta($post_id, self::META_KEY_DESCRIPTION, esc_textarea($_POST[self::META_KEY_DESCRIPTION]));
            } else {
                delete_post_meta($post_id, self::META_KEY_DESCRIPTION);
            }
            if (array_key_exists(self::META_KEY_PRICE, $_POST)){
                update_post_meta($post_id, self::META_KEY_PRICE, sanitize_text_field($_POST[self::META_KEY_PRICE]));
            } else {
                delete_post_meta($post_id, self::META_KEY_PRICE);
            }
            if (array_key_exists(self::META_KEY_LOCALISATION, $_POST)){
                update_post_meta($post_id, self::META_KEY_LOCALISATION, sanitize_text_field($_POST[self::META_KEY_LOCALISATION]));
            } else {
                delete_post_meta($post_id, self::META_KEY_LOCALISATION);
            }
        }
    }
}
