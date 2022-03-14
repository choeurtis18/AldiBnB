<?php get_header() ?>

<div class="header">
    <?php get_search_form(); ?>
    <div class="header-title">
      <p class="header-frist_child">Chez AldiBnB</p>
      <p>Retrouvez les meilleures annonces pour un séjour de qualité !</p>
    </div>
</div>


<?php 
remove_filter('term_description','wpautop');  
$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC'
) );
?>
<div class="home-container">
  <div class="home-container-item">
    <h3>Selectionner selon nos catégories</h3>
    <div class="category-cards">
      <?php foreach( $categories as $category ) { ?>
        <?php
          $category_id = get_cat_ID( $category->name );
          $category_link = get_category_link( $category_id );
        ?>
        <div class="category-cards-item">
          <a href= <?= esc_url( $category_link ) ?>> <?= $category->name; ?></a>
          <img src="<?= $category->category_description ?>" alt="">
        </div>
      <?php } ?>
    </div>
  </div>

  <div class="home-container-item">
    <h3>Des offres qui pourraient vous plaire</h3>
    <div class="offers-cards">
      <?php 
      
        $args = array(
          'post_type'   => 'property',
          'meta_key'         => 'wpheticSponso',
          'meta_value'       => 'true'
        );
        $properties = get_posts( $args );
      
      ?>
      <?php 
      foreach($properties as $property) {
      ?>
      <?php 
        $prop = array(
          "id" => $property->ID,
          "name" => $property->post_title, 
          "link" => $property->guid,
          "_price" => get_post_meta( $property->ID, '_price', true ),
          "image" => get_the_post_thumbnail_url($property->ID, 'full')
        );
      ?>
      <div class="offers-cards-item">
          <img src="<?= $prop['image']; ?>" alt="">
        <div class="card-details">
          <a href= <?= $prop['link']; ?>> <?= $prop['name']; ?></a>
          <p><?= $prop['_price']; ?></p>
        </div>
      </div>
    <?php } ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
