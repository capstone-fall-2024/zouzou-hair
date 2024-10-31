<?php

/**
 * Template Name: About
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zouzou-hair-theme
 */

get_header();

?>
<main id="primary" class="site-main">
<div class="container padding">

<div class="intro-text">
            <p>At Zouzou Hair, we offer a variety of services to make sure you get the exact look you want.<br>Browse our services and previous works down below!</p>
        </div>

        <p>All Students receive a 10% discount on our services</p>
    

    <div class="about-content">
        <ul class="team-list">
            <li><strong><?php echo nl2br(esc_html(get_field('name'))); ?></strong> - <?php echo nl2br(esc_html(get_field('position'))); ?></li>
        </ul>
    </div>
</div>
</main><!-- #main -->

<?php
get_footer();
