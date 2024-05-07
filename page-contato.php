<?php
/*
Template Name: Home
*/

get_header(); ?>

<main class="contact-page">
    <?php
    if (have_posts()):
        while(have_posts()):
            the_post();
            the_content();
        endwhile;
    else:
        echo '<p>Não há nada nessa página.</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>