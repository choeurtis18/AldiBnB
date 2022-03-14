<?php get_header(); ?>

<div class="page-container">

  <div class="category-title">
    <h1><?php single_cat_title(); ?></h1>
    <div class="category-filter-container">
      <p>Par Types</p>
    </div>
  </div>
  <?php 
      remove_filter('term_description','wpautop');  
      $cat = get_category( get_query_var( 'cat' ) );
      $cat_id = $cat->cat_ID;
      $cat_name = $cat->name;
      $cat_description = $cat->description;
  ?>

  <div class="offers-cards">
  
    <?php
    $args = array(
      'post_type'   => 'property',
      'category'    => $cat_id
    );
    $properties = get_posts( $args );
  
  
    foreach($properties as $property) {
      $prop = array(
        "id" => $property->ID,
        "name" => $property->post_title, 
        "link" => $property->guid,
        "_extrait" => get_post_meta( $property->ID, '_extrait', true ),
        "_description" => get_post_meta( $property->ID, '_description', true ),
        "_price" => get_post_meta( $property->ID, '_price', true ),
        "_localisation" => get_post_meta( $property->ID, '_localisation', true ),
        "image" => get_the_post_thumbnail_url($property->ID, 'full')
      );
    ?>
  
    <div class="offers-cards-item offers-card-singleDisplay">
      <img src="<?= $prop['image']; ?>" alt="">
      <div class="card-details">
        <a href= <?= $prop['link']; ?>> <?= $prop['name']; ?></a>
        <p><?= $prop['_price']; ?></p>
      </div>
    </div>
      
    <?php } ?>
  </div>
</div>


<?php 

alibnb_pagination();

get_footer(); ?>