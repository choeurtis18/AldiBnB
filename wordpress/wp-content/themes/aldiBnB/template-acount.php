<?php
/*
 * Template Name: Page acount
 * Template Post Type: page
 */
?>

<?php get_header(); ?>
<style>
#aldibnb-acount {
    display: flex;
    flex-wrap: wrap;
}
#aldibnb-acount-header {
    display: flex;
    flex-wrap: wrap;

    flex: 100%;
    padding-bottom: 30px;
}

#aldibnb-acount-header-title {
    flex: 100%;
    font-weight: 700;
    font-size: 22px;

    color: #202020;
}
#aldibnb-acount-header-description {
    flex: 100%;
    font-weight: 400;
    font-size: 18px;

    color: #202020;
}
#aldibnb-acount-header-link-to-create-annonce {
    text-decoration: none;
    background: #A47035;
    color: #fff;

    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25);
    border-radius: 10px;
    padding: 10px 16px;
    margin-top: 20px;

    font-weight: 500;
    font-size: 14px;
    text-align: center;
}


.aldibnb-acount-post{
    display: flex;
    flex-wrap: wrap;
}

.aldibnb-acount-post-title {
    flex: 100%;

    color: #A47035;
    font-size: 22px;
    font-weight: 700;

    padding-bottom: 12px;
    border-bottom: 1px solid #000;
}


#aldibnb-acount-post_attente {
    text-align: right;
}
#aldibnb-acount-post_attente-cards {
    align-items: flex-end;
    justify-content: right;
}

</style>
<?php if ((is_user_logged_in()) ) { ?>
<div id="aldibnb-acount" class="page-container">
    <div id="aldibnb-acount-header">
        <h1 id="aldibnb-acount-header-title"><?php if ( isset($current_user) ) {echo $current_user->user_login;} ?>, bienvenue sur votre compte</h1>
        <p id="aldibnb-acount-header-description">A partir de cette page, vous pouvez ajouter des offres mais également consulter vos offres (posté, en attente).</p>
        <a id="aldibnb-acount-header-link-to-create-annonce" href="add-property">Ajouter une Annonce</a>
    </div>
    <div id="aldibnb-acount-post_poste">
        <h1 class="aldibnb-acount-post-title" id="aldibnb-acount-post_poste-title">Annonces Postées</h1>
        <span>Consultez vos annonces !</span>
        <div class="offers-cards" id="aldibnb-acount-post_poste-cards">
        <?php 
            $args = array(
                'post_type'     => 'property',
                'post_status'    => 'publish',
                'post_author'      => 1
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
                "image" => get_the_post_thumbnail_url($property->ID, 'medium'),
                "price" => get_post_meta( $property->ID, '_price', true )
            );
        ?>
            <div class="offers-cards-item" id="aldibnb-acount-post_poste-card">
                <img id="aldibnb-acount-post_poste-card-img"
                    src="<?= $prop['image']; ?>"
                    alt="<?= $prop['name']; ?> img"
                >
                <div class="card-details">
                    <a  id="aldibnb-acount-post_poste-card-title" href= <?= $prop['link']; ?>> <?= $prop['name']; ?></a>
                    <p id="aldibnb-acount-post_poste-card-price"><?= $prop['price']; ?>€ / Nuit</p>

                </div>
            </div>
        <?php } ?>
        </div>
    </div>

    <div class="aldibnb-acount-post" id="aldibnb-acount-post_attente">
        <h1 class="aldibnb-acount-post-title">Annonces En Attente</h1>
        <p>Vos annonces sont en cours de vérification, celles-ci seront publiées et déplacées dans "Annonces postés" une fois validées.</p>
        <div class="offers-cards" style="width:100%;" id="aldibnb-acount-post_attente-cards">
        <?php 
            $args = array(
                'post_type'     => 'property',
                'post_status'    => 'draft',
                'post_author'      => 1
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
                "image" => get_the_post_thumbnail_url($property->ID, 'medium'),
                "price" => get_post_meta( $property->ID, '_price', true )
            );
            ?>
            <div class="offers-cards-item" id="aldibnb-acount-post_attente-card">
                <img id="aldibnb-acount-post_attente-card-img"
                    src="<?= $prop['image']; ?>"
                    alt="<?= $prop['name']; ?> img"
                >
                <div class="card-details">
                    <a id="aldibnb-acount-post_attente-card-title" href="update-property?post=<?= $prop['id']; ?>"> <?= $prop['name']; ?></a>
                    <p id="aldibnb-acount-post_attente-card-price"><?= $prop['price']; ?>€ / Nuit</p>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>

</div>
<?php } else { 
    echo "<script>window.location='".site_url()."/login'</script>";
} ?>
<?php get_footer(); ?>
