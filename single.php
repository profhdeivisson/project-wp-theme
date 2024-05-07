<?php
/*
Template Name: Single Projeto
*/

get_header(); ?>

<main id="single-project">
    <?php
    if (have_posts()):
        while(have_posts()): the_post();
            // Título do Projeto
            echo '<h1>' . get_the_title() . '</h1>';

            // Data do Projeto
            echo '<p>Data: ' . get_the_date() . '</p>';
            
            // Imagem do Projeto
            $image = get_field('imagem'); // Agora retorna um array
            $image_url = $image['url']; // URL da imagem
            $image_alt = $image['alt']; // Texto alternativo da imagem
            ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="project-card-image"><br>
            <?php
            // Descrição do Projeto
            echo '<p><strong>Descrição do projeto:</strong> ';
            the_field('descricao');
            echo '</p>';
            ?>
            <?php
            $category_id = get_field('tipo');
            $category_name = get_the_category()[0]->name;
            echo '<p><strong>Tipo: ';
            echo esc_html($category_name);
            echo '</strong></p>';

            // Botão com link para o projeto (campo personalizado)
            $link_projeto = get_post_meta(get_the_ID(), 'link_do_projeto', true);
            if($link_projeto):
                echo '<a href="' . esc_url($link_projeto['url']) . '" class="btn btn-primary" target="_blank">Acessar Projeto</a>';
            endif;

        endwhile;
    else:
        echo '<p>Não há nada nessa página.</p>';
    endif;
    ?>
    <!-- Listagem de Projetos Relacionados -->
    <div id="related-projects">
        <h2>Projetos relacionados</h2>
        <section>
            <?php
            // Obtenha o ID da categoria atual do projeto usando ACF
            $categoria_atual_id = get_field('tipo');
            // Verifique se o ID da categoria foi recuperado corretamente
            if ($categoria_atual_id) {
                // Argumentos para a nova consulta
                $args = array(
                    'post_type' => 'project', // Substitua com o seu tipo de post personalizado
                    'posts_per_page' => -1, // Para exibir todos os posts
                );

                // A nova consulta
                $projetos_query = new WP_Query($args);
                // Se houver projetos, exiba-os
                if ($projetos_query->have_posts()) :
                    while ($projetos_query->have_posts()) : $projetos_query->the_post();
                        // Obtenha o ID da categoria do projeto atual
                        $projeto_categoria_id = get_field('tipo');
                        // Compare com o ID da categoria atual
                        if ($projeto_categoria_id[0] == $categoria_atual_id[0]) {
                            // Obtenha o URL da imagem usando ACF
                            $image = get_field('imagem');
                            $image_url = $image['url'];
                            $image_alt = $image['alt']; // Supondo que "imagem" é o campo personalizado para imagem
                            ?>

                            <div>
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                                <h3><?php the_title(); ?></h3>
                                <a href="<?php the_permalink(); ?>">Ver projeto</a>
                            </div>

                            <?php
                        }
                    endwhile;
                    // Restaura a consulta original
                    wp_reset_postdata();
                else :
                    echo '<p>Não há projetos relacionados para mostrar.</p>';
                endif;
            }
            ?>
        </section>
    </div>
</main>

<?php get_footer(); ?>
