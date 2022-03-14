<?php
/*
 * Template Name: Search Page
 */
?>


<form class="d-flex " action="<? esc_url(home_url('/')); ?>">
    <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Search" name="s"
           value="<?= get_search_query(); ?>">
    <button class="btn btn-outline-success" type="submit">Rechercher</button>
</form>
