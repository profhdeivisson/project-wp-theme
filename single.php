<?php
/*
Template Name: Single Projeto
*/

get_header(); ?>

<main id="single-project">
    <?php
    if (have_posts()):
        while(have_posts()): the_post();
            echo '<h1>' . get_the_title() . '</h1>';
            echo '<p>Data: ' . get_the_date() . '</p>';
            $image = get_field('imagem');
            $image_url = $image['url'];
            $image_alt = $image['alt'];
            ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="project-card-image"><br>
            <?php
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

            $link_projeto = get_post_meta(get_the_ID(), 'link_do_projeto', true);
            if($link_projeto):
                echo '<a href="' . esc_url($link_projeto['url']) . '" class="btn btn-primary" target="_blank">Acessar Projeto</a>';
            endif;

        endwhile;
    else:
        echo '<p>Não há nada nessa página.</p>';
    endif;
    ?>

    <div id="related-projects">
        <h2>Projetos relacionados</h2>
        <section>
            <?php
            $categoria_atual_id = get_field('tipo');
            if ($categoria_atual_id) {
                $args = array(
                    'post_type' => 'project',
                    'posts_per_page' => -1,
                );

                $projetos_query = new WP_Query($args);
                if ($projetos_query->have_posts()) :
                    while ($projetos_query->have_posts()) : $projetos_query->the_post();
                        $projeto_categoria_id = get_field('tipo');
                        if ($projeto_categoria_id[0] == $categoria_atual_id[0]) {
                            $image = get_field('imagem');
                            $image_url = $image['url'];
                            $image_alt = $image['alt'];
                            ?>

                            <div>
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                                <h3><?php the_title(); ?></h3>
                                <a href="<?php the_permalink(); ?>">Ver projeto</a>
                            </div>

                            <?php
                        }
                    endwhile;
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
