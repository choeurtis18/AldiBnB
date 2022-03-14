<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="wp-content/themes/aldiBnB/style.css"> -->
    <link rel="stylesheet" href="<?php get_template_directory_uri() ?> /wp-content/themes/aldiBnB/style.css">
    
    <?php wp_head(); ?>
</head>
<body>

<nav id="abnb-navbar">
  <a href="<?php echo home_url(); ?>">
    <div id="" class="abnb-nav-child abnb-icon">
      <img src="<?php get_template_directory_uri() ?>/wp-content/uploads/2022/03/logo.png" alt="AldiBnB Logo">
      <p>AldiB'n'B</p>
    </div>
  </a>

  <?php wp_nav_menu([
        'theme_location' => 'header', 
        'container' => false,
        'menu_class' => "abnb-nav-child abnb-nav-link"
        ]) 
  ?>

  <div id="abnb-register-block" class="abnb-nav-child">
    <?php if ((is_user_logged_in()) ) { ?>
      <a href="<?php echo wp_logout_url(site_url() );  ?>">
         <i class="fa fa-sign-out abnb-icon"aria-hidden="true"></i>
         <a href="account"><i class="fa fa-user abnb-icon"aria-hidden="true"></i></a>
      </a>   
    <?php } else { ?>
      <a id="abnb-inscription" class="abnb-register" href="/register">S'inscrire</a> /
      <a id="abnb-connection" class="abnb-register" href="/login">Se connecter</a>
    <?php } ?>
  </div>
  
  <!--<?php get_search_form(); ?> -->
    
</nav>

<?php
    if(get_option('text_promo') == true && is_plugin_active('promo-plugin/promo-plugin.php'));
    {
        ?>
            <div style="background-color:<?=get_option('color_promo');?>;padding:1px; position: sticky; top:0;"><h3 style="font-size:2.2rem; text-align:center; color:<?=get_option('text_color_promo')?>"><?=get_option('text_promo');?></h3></div>
        <?php
    } 
?> 
<div class="abnb-container">


