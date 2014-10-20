<?php get_header(); ?>

    <h1>Страница поиска рефератов</h1>
<?php
global $wp_query;
$total_results = $wp_query->found_posts;
?>
<?php if (have_posts()) {
    echo '<h2>Список рефератов:</h2>';
    echo '<ul class="cat_ref">';
    while (have_posts()) {
        the_post();
        echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
    }
    echo '</ul>';
    if (function_exists('wp_pagenavi')) {
        wp_pagenavi();
    }
} else {
    echo 'Ничего не найдено';
}?>



<?php get_footer(); ?>