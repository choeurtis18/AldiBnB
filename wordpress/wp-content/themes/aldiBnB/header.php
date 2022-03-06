<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php wp_head(); ?>
</head>
<body>

<style>
  html {
    margin: 0!important;
  }

  #abnb-navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px 0px 20px;
    background-color: #EAEAEA;
  }

  #abnb-navbar a {
    text-decoration: none;
  }

  .abnb-nav-child {
    display: flex;
    text-decoration: none;
  }

  .abnb-icon {
    color: #A47035;
    margin-left: 10px;
  }

  .abnb-nav-link {
    list-style-type: none;
    text-decoration: none;
    text-transform: uppercase;
    font-size : 18px;
    color: #202020;
  }
  .abnb-nav-link a{
    color: #202020;
  }

  .abnb-register {
    color: #202020;
    font-size : 18px;
  }
</style>

<nav id="abnb-navbar">
  <a href="<?php echo home_url(); ?>">
    <div id="" class="abnb-nav-child abnb-icon">
      <i class="fa fa-home fa-2xl" aria-hidden="true"></i>
      <p>ALDIB'n'B</p>
    </div>
  </a>

  <?php wp_nav_menu([
        'theme_location' => 'header', 
        'container' => false,
        'menu_class' => "abnb-nav-child abnb-nav-link"
        ]) 
  ?>

  <div id="abnb-register-block" class="abnb-nav-child">
    <a id="abnb-inscription" class="abnb-register" href="#">S'inscrire</a> /
    <a id="abnb-connection" class="abnb-register" href="#">Se connecter</a>
    <i class="fa fa-sign-out abnb-icon"aria-hidden="true"></i>
  </div>
  
  <!--<?php get_search_form(); ?> -->
    
</nav>


<div class="abnb-container">


