<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <div class="card-group">
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <?php 
                $prop = array(
                    "id" => get_the_ID(),
                    "name" => get_the_title(get_the_ID()), 
                    "image" => get_the_post_thumbnail_url(get_the_ID(), 'full'),
                    "_sponso" => get_post_meta(get_the_ID(), 'wpheticSponso', true),
                    "_extrait" => get_post_meta( get_the_ID(), '_extrait', true ),
                    "_description" => get_post_meta( get_the_ID(), '_description', true ),
                    "_price" => get_post_meta( get_the_ID(), '_price', true ),
                    "_localisation" => get_post_meta( get_the_ID(), '_localisation', true )
                );

                echo '</br>';
                var_dump($prop);
            ?>

        <?php endwhile; ?>
    </div>

<?php endif; ?>

<?php get_footer(); ?>
