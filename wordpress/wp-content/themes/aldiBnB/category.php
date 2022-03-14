<?php get_header(); ?>

<p>Category: <?php single_cat_title(); ?></p>
<?php 
    remove_filter('term_description','wpautop');  
    $cat = get_category( get_query_var( 'cat' ) );
    $cat_id = $cat->cat_ID;
    $cat_name = $cat->name;
    $cat_description = $cat->description;
?>
<a href="<?= $cat_description ?>" target="_black">Image</a>

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
    "_localisation" => get_post_meta( $property->ID, '_localisation', true )
  );

  echo '</br>';
  var_dump($prop);
}
?>


<?php 

alibnb_pagination();

get_footer(); ?>