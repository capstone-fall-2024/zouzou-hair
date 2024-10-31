<?php

/**
 * Template Name: Featured Items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zouzou-hair-theme
 */

get_header();

?>
<main id="primary" class="site-main">
    <div class="container padding">

    <?php get_search_form(); ?>
    
        <?php echo apply_shortcodes( '[products limit="12" columns="4" visibility="featured"]' ); ?>
    </div>
</main><!-- #main -->

<?php
get_footer();
