<?php get_header(); ?>

<?php if (have_posts()) : ?>
<div class="card-group">
    <?php while (have_posts()) : ?>

        <?php the_post(); ?>

        <div class="card">
            <?php the_post_thumbnail('medium', ['class'=>'card-img-top', 'alt'=>'', 'style'=>'height:auto; ']) ?>
            <div class="card-body">

                <?php if (get_post_meta(get_the_ID(), 'wpheticSponso', true)) : ?>
                    <div class="alert alert-primary" role="alert">
                        Contenu Soponso
                    </div>
                <?php endif; ?>

                <h5 class="card-title"><?php the_title(); ?></h5>

                <p class="card-text"><?php the_content(); ?></p>
                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Lire plus</a>
            </div>
        </div>

    <?php endwhile; ?>

</div>

<?php alibnb_pagination() ?>
 

<?php else : ?>
    <h1>Pas d'offres</h1>
<?php endif; ?>

<?php get_footer(); ?>

