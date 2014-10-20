<?php
/*
Template Name: Search Page
*/
?>
<?php
get_header(); ?>

    <h1>Рефераты по запросу "<?php echo pg_escape_string($_GET['query']);?>"</h1>
    [meta_title]Найденные рефераты на тему "<?php echo pg_escape_string($_GET['query']);?>" в Referat-Baza[/meta_title]


<?php
$args = array(
    's' => pg_escape_string($_GET['query']),
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 25,
    'paged'=>(get_query_var('paged')) ? get_query_var('paged') : 0,
);
$wp_query = new WP_Query($args); ?>

<?php if ($wp_query->have_posts()) {
    echo '<ul class="cat_ref">';
    while ($wp_query->have_posts()) {
        $wp_query->the_post();
        echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
    }
    echo '</ul>';
    if (function_exists('wp_pagenavi')) {
        wp_pagenavi();
    }
} else {
} ?>



<?php get_footer(); ?>