<h2>Filtros</h2>
<?php
$categorias_exibidas = array();
$args = array(
    'post_type' => 'project',
    'posts_per_page' => -1
);

$projetos_query = new WP_Query($args);
if ($projetos_query->have_posts()) :
    while ($projetos_query->have_posts()) : $projetos_query->the_post();
        $term_ids = get_field('tipo');
        if ($term_ids) {
            foreach ($term_ids as $term_id) {
                if (!isset($categorias_exibidas[$term_id])) {
                    $termo_categoria = get_term($term_id);
                    if (!is_wp_error($termo_categoria)) {
                        $categorias_exibidas[$term_id] = $termo_categoria->name;
                    }
                }
            }
        }
    endwhile;
    wp_reset_postdata();
endif;
echo '<ul>';
echo '<li><a href="#" data-filter="todos">Todos</a></li>';
foreach ($categorias_exibidas as $id => $name) {
    echo '<li><a href="#" data-filter="' . esc_attr($id) . '">' . esc_html($name) . '</a></li>';
}
echo '</ul>';
?>
