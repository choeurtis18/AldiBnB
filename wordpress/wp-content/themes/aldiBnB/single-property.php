<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <div class="page-container">
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
            ?>
            <div class="post-img-container">
                <img class="post-largeImg" src="<?= $prop['image']; ?>" alt="">
                <div class="post-img-group">
                    <img class="post-mediumImg" src="<?= $prop['image']; ?>" alt="">
                    <div class="post-img-subGroup">
                        <img class="post-smallImg" src="<?= $prop['image']; ?>" alt="">
                        <img class="post-smallImg" src="<?= $prop['image']; ?>" alt="">
                    </div>
                </div>
            </div>

            <div class="post-info-container">
                <div class="post-info">
                    <h1><?= $prop['name']; ?></h1>
                    <h3><?= $prop['_localisation']; ?></h3>
                </div>
                <h2><?= $prop['_price']; ?></h2>
            </div>

            <div class="post-additional-container">
                <h4>Description</h4>
                <p><?= $prop['_description']; ?></p>
            </div>

            <div class="post-additional-container">
                <h4>Commentaires</h4>
                <div class="post-comments-group">
                    <div class="post-comments-item">
                        <div class="comments-head">
                            <p></p>
                            <p></p>
                        </div>
                        <p></p>
                    </div>
                </div>
                <button></button>
            </div>
            

        <?php endwhile; ?>
    </div>

<?php endif; ?>

<?php get_footer(); ?>
