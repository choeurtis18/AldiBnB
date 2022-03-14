<?php
/*
 * Template Name: Search Page
 */
?>



<form class="form-searchBar" action="<?php home_url('/'); ?>">
    <input class="form-control" type="search" placeholder="Rechercher une Annonce" aria-label="Search" name="s"
           value="<?= get_search_query(); ?>">
    <button class="btn" type="submit">Rechercher</button>
</form>
