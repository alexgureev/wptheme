<?php
function get_cat_content()
{
    if (have_posts()) {
        echo '<h2>Темы рефератов рубрики '.mb_strtolower (single_cat_title( '', false )).'</h2>';
        echo '<ul class="cat_ref">';
        while (have_posts()) {
            the_post();
            echo '<li><a href="'.get_permalink().'" title="Открыть реферат '.get_the_title().'">'.get_the_title().'</a></li>';
        }
        echo '</ul>';
        if (function_exists('wp_pagenavi')) {
            wp_pagenavi();
        }
    } else {

    }
}

?>