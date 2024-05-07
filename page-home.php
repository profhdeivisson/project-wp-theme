<?php
/*
Template Name: Home
*/

get_header(); ?>

<main id="main-content">
    
    <?php
    // Argumentos para a nova consulta
    $args = array(
        'post_type' => 'project', // Substitua com o seu tipo de post personalizado
        'posts_per_page' => -1 // Para exibir todos os posts
    );

    // A nova consulta
    $projetos_query = new WP_Query($args);

    // Se houver projetos, exiba-os
    if ( $projetos_query->have_posts() ) :
        while ( $projetos_query->have_posts() ) : $projetos_query->the_post();
            // Obtenha o ID da categoria e o URL da imagem usando ACF
            $category_id = get_field('tipo'); // Supondo que "tipo" é o campo personalizado para categoria
            $image_url = get_field('imagem'); // Supondo que "imagem" é o campo personalizado para imagem
            
            // Obtenha o nome da categoria usando o ID (opcional)
            $category_name = get_the_category()[0]->name;
            $resumo = get_field('descricao'); // Pega a primeira categoria associada ao post
            ?>

            <article class="project-card" data-type="<?php echo esc_attr($category_id[0]); ?>">
                <a href="<?php the_permalink(); ?>" class="project-card-link">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>" class="project-card-image">
                    <div class="project-card-content">
                        <h2 class="project-card-title"><?php the_title(); ?></h2>
                        <p class="project-card-description"><strong>Resumo: </strong><?php echo mb_strimwidth($resumo, 0, 50, "..."); ?></p>
                        <p class="project-card-type">Tipo: <?php echo esc_html($category_name); ?></p>
                    </div>
                </a>
            </article>

        <?php endwhile;
        // Restaura a consulta original
        wp_reset_postdata();
    else :
        echo '<p>Ainda não há projetos cadastrados.</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>