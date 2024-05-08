<?php
/*
Template Name: General 
*/

get_header(); ?>

<main id="main-content" class="container">
    
    <aside id="filter-section">
        <?php get_template_part('template-part/filter-section'); ?>
    </aside>

    <section>
        <?php
        $args = array(
            'post_type' => 'project',
            'posts_per_page' => -1
        );

        $projetos_query = new WP_Query($args);
        if ( $projetos_query->have_posts() ) :
            while ( $projetos_query->have_posts() ) : $projetos_query->the_post();
                get_template_part('template-part/project-card');
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>Ainda não há projetos cadastrados.</p>';
        endif;
        ?>
    </section>
</main>

<?php get_footer(); ?>