<?php
/*
Template Name: General 
*/

get_header(); ?>

<main id="main-content" class="container">
    
    <aside id="filter-section">
        <h2>Filtros</h2>
        <?php
        $categorias_exibidas = array();
        // Argumentos para a nova consulta
        $args = array(
            'post_type' => 'project', // Substitua com o seu tipo de post personalizado
            'posts_per_page' => -1 // Para exibir todos os posts
        );

        // A nova consulta
        $projetos_query = new WP_Query($args);

        // Se houver projetos, exiba-os
        if ($projetos_query->have_posts()) :
            while ($projetos_query->have_posts()) : $projetos_query->the_post();
                // Obtenha os IDs das categorias usando ACF
                $term_ids = get_field('tipo'); // Supondo que "tipo" é o campo personalizado para categoria
                if ($term_ids) {
                    foreach ($term_ids as $term_id) {
                        if (!isset($categorias_exibidas[$term_id])) {
                            $termo_categoria = get_term($term_id);
                            if (!is_wp_error($termo_categoria)) {
                                // Adiciona o nome da categoria ao array
                                $categorias_exibidas[$term_id] = $termo_categoria->name;
                            }
                        }
                    }
                }
            endwhile;
            // Restaura a consulta original
            wp_reset_postdata();
        endif;

        // Exibe as categorias
        echo '<ul>';
        echo '<li><a href="#" data-filter="todos">Todos</a></li>';
        foreach ($categorias_exibidas as $id => $name) {
            echo '<li><a href="#" data-filter="' . esc_attr($id) . '">' . esc_html($name) . '</a></li>';
        }
        echo '</ul>';
        ?>
    </aside>
    <section>
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
            $image = get_field('imagem'); // Supondo que "imagem" é o campo personalizado para imagem
            $image_url = $image['url'];
            $image_alt = $image['alt'];
            // Obtenha o nome da categoria usando o ID (opcional)
            $category_name = get_the_category()[0]->name; // Pega a primeira categoria associada ao post
            ?>

            <article class="project-card" data-type="<?php echo esc_attr($category_id[0]); ?>">
                <a href="<?php the_permalink(); ?>" class="project-card-link">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo $image_alt; ?>" class="project-card-image">
                    <div class="project-card-content">
                        <h2 class="project-card-title"><?php the_title(); ?></h2>
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
    </section>
</main>

<?php get_footer(); ?>