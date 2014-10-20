<?php
/*
Template Name: Главная страница
*/
require_once('home_page_categories.php');
?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php
    $ref_meta_desc = get_post_meta($post->ID, 'ref_meta_desc', true);
    echo '[meta_desc]'.$ref_meta_desc.'[/meta_desc]';
    $ref_meta_title = get_post_meta($post->ID, 'ref_meta_title', true);
    echo '[meta_title]'.$ref_meta_title.'[/meta_title]';
    ?>
    <h1><?php the_title(); ?></h1>
    <?php
    $content = get_the_content();
    $content = str_replace('[main_page_categories]',get_home_cats(),$content);
    echo $content;
    ?>
<?php endwhile; endif; ?>

<?php if (function_exists('wp_pagenavi')) {
    wp_pagenavi();
} ?>
<?php get_footer(); ?>

