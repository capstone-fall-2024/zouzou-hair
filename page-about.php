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
    <div class="about-hero-banner">
        <img src="../assets/images/joseph.webp" alt="Master barber Joseph Hayek" class="hero-image">
    </div>

    <div class="about-content">
        <h2>About Us</h2>
        <p>We believe that great hair is the foundation of confidence. Our team of expert stylists delivers personalized, high-quality services ensuring you leave feeling your absolute best.</p>
        
        <h3>Our Mission</h3>
        <p>To provide exceptional hair services while creating a welcoming and friendly environment.</p>

        <h3>Meet Our Team</h3>
        <ul class="team-list">
            <li><strong><?php echo nl2br(esc_html(get_field('name'))); ?></strong> - <?php echo nl2br(esc_html(get_field('position'))); ?></li>
        </ul>
    </div>

</main><!-- #main -->

<?php
get_footer();
