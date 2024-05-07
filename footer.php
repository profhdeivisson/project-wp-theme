</body>
<footer class="site-footer">
    <?php
        $site_name = get_bloginfo('name');
        echo "© " . date('Y') . " {$site_name}. Todos os direitos reservados.";
    ?>
</footer>
</html>
<?php wp_footer(); ?>
