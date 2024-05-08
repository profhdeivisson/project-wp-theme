<?php
// Certifique-se de que a variável global $post está disponível
global $post;

// Recupere os campos personalizados usando ACF ou métodos padrão do WordPress
$category_id = get_field('tipo');
$image = get_field('imagem');
$image_url = $image['url'];
$image_alt = $image['alt'];
$category_name = get_the_category($post->ID)[0]->name;
$resumo = get_field('descricao');
?>

<article class="project-card" data-type="<?php echo esc_attr($category_id[0]); ?>">
    <a href="<?php the_permalink(); ?>" class="project-card-link">
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="project-card-image">
        <div class="project-card-content">
            <h2 class="project-card-title"><?php the_title(); ?></h2>
            <p class="project-card-description"><strong>Resumo: </strong><?php echo mb_strimwidth($resumo, 0, 50, "..."); ?></p>
            <p class="project-card-type">Tipo: <?php echo esc_html($category_name); ?></p>
        </div>
    </a>
</article>
