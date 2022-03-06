<style>
/* Header/Logo Title */
.header {
  padding: 60px;
  text-align: center;
  background: #1abc9c;
  color: white;
  font-size: 30px;
  background : linear-gradient(0deg, rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.35)), url("http://localhost:5555/wp-content/uploads/2022/02/bg.jpeg"); 
  background-size: cover;
  background-position: center;
  height: 100vh; 
}

.card-group {
    margin: 20px;
}

</style>

<?php get_header() ?>

<div class="header">
    <?php get_search_form(); ?>
    <p>My supercool header</p>
</div>


<?php 
remove_filter('term_description','wpautop');  
$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC'
) );
?>

<h3>Selectionner selon nos catégories</h3>
<div class="card-group">
  <?php foreach( $categories as $category ) { ?>
    <?php
      $category_id = get_cat_ID( $category->name );
      $category_link = get_category_link( $category_id );
    ?>
    <div class="card bg-success">
      <div class="card-body text-center">
        <a href= <?= esc_url( $category_link ) ?>> <?= $category->name; ?></a>
        <p><?= $category->category_description ?></p>
      </div>
    </div>
  <?php } ?>
</div>

<h3>Des offres qui pourrais vous plaire</h3>
<div class="card-group">
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
    "image" => get_the_post_thumbnail_url($property->ID, 'full')
  );
?>
  <div class="card bg-success">
    <div class="card-body text-center">
      <a href= <?= $prop['link']; ?>> <?= $prop['name']; ?></a>
      <p><?= $prop['image']; ?></p>
    </div>
  </div>
<?php } ?>
</div>

<?php get_footer(); ?>
