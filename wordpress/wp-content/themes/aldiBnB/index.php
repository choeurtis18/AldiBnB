<?php get_header(); ?>

<div class="page-container">
    <?php if (have_posts()) : ?>
        <div class="offers-cards">
            <?php while (have_posts()) : ?>

                <?php the_post(); ?>

                <div class="offers-cards-item">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="...">
                    <div class="card-details">

                        <?php if (get_post_meta(get_the_ID(), 'wpheticSponso', true)) : ?>
                            <div class="alert alert-primary" role="alert">
                                Contenu Sponso
                            </div>
                        <?php endif; ?>

                        <h5 class="card-title"><?php the_title(); ?></h5>

                        <p><small> Style: <?= the_terms(get_the_ID(), 'style'); ?></small></p>

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
</div>

<?php get_footer(); ?>

