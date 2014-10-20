<?php
/*
Template Name: Алфавитная навигация
*/
?>
<?php get_header();
$page_num = (get_query_var('paged')>1)?' - страница '. get_query_var('paged'):'';
$ref_meta_title = get_post_meta($post->ID, 'ref_meta_title', true);
echo '[meta_title]'.$ref_meta_title.$page_num.'[/meta_title]';
?>

<h1>Все темы рефератов по алфавиту<?php echo $page_num;?></h1>
<?php

$alphabet = 'абвгдеёжзийклмнопрстуфхцчшщыэюя';
$letter = mb_strtolower(pg_escape_string($_GET['letter']));

getAlphabet($letter);

if (!$letter || !mb_stristr($alphabet, $letter) || mb_strlen($letter)!=1) {
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 25,
        'paged'=>(get_query_var('paged')) ? get_query_var('paged') : 0,
    );
    $wp_query = new WP_Query($args); ?>

    <?php if ($wp_query->have_posts()) {
        echo '<h2>Список всех рефератов</h2>';
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
        echo 'Ничего не найдено.';
    }
} else {
    $first_char = $letter;
    $postids = $wpdb->get_col($wpdb->prepare("
                    SELECT      ID
                    FROM        $wpdb->posts
                    WHERE       SUBSTR($wpdb->posts.post_title,1,1) = %s
                    ORDER BY    $wpdb->posts.post_title", $first_char));

    if ($postids) {
        $args = array(
            'post__in' => $postids,
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 25,
            'paged' => (get_query_var('paged')) ? get_query_var('paged') : 0,
            'caller_get_posts' => 1
        );
        $wp_query = null;
        $wp_query = new WP_Query($args);
        if ($wp_query->have_posts()) {
            echo '<h2>Список рефератов на букву "'.mb_strtolower($first_char).'"</h2>';
            echo '<ul class="cat_ref">';
            while ($wp_query->have_posts()) {
                $wp_query->the_post();
                echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
            }
            echo '</ul>';
        }
        if (function_exists('wp_pagenavi')) {
            wp_pagenavi();
        }
        wp_reset_query();
    }
}

function getAlphabet($letter_orig){
    $alphabet = 'абвгдеёжзийклмнопрстуфхцчшщыэюя';
    $letters = preg_split('//u',$alphabet,-1,PREG_SPLIT_NO_EMPTY);

    echo '<div class="wp-pagenavi" style="padding-left: 5px;max-width: 920px;">';
    foreach($letters as $letter){
        if($letter!=$letter_orig){
            echo '<a href="http://referat-baza.com/themes/?letter='.$letter.'" class="page" title="'.mb_strtoupper($letter).'">'.mb_strtoupper($letter).'</a>';
        }else{
            echo '<span class="current">'.mb_strtoupper($letter).'</span>';
        }

    }
    echo '</div>';


}

?>

<?php get_footer(); ?>

