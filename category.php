<?php
require_once('category_content.php');
get_header();
$page_num = (get_query_var('paged')>1)?' - страница '. get_query_var('paged'):'';
?>

<?php
remove_filter('term_description','wpautop');
$cat_desc = category_description();
preg_match('/\[meta_title\](.*)\[\/meta_title\]/s', $cat_desc, $m);
$meta_title = false;
if ($m) {
    $meta_title = strip_tags($m[1]);
    $meta_title_replace = $m[0];
    echo '[meta_title]'.$meta_title.$page_num.'[/meta_title]';
}
preg_match('/\[meta_desc\](.*)\[\/meta_desc\]/s', $cat_desc, $m);
$meta_desc = false;
if ($m) {
    $meta_desc = strip_tags($m[0]);
    echo $meta_desc;
}
preg_match('/\[h1\](.*)\[\/h1\]/s', $cat_desc, $m);
$h1 = false;
if ($m) {
    $h1 = strip_tags($m[1]);
    $h1_replace = $m[0];
}


?>

<h1><?php echo ($h1)?$h1.$page_num:single_cat_title('', false).$page_num;?></h1>

<?php

if (get_query_var('paged') == 0) {
    $cat_desc = category_description();
    if ($meta_title_replace) {
        $cat_desc = str_replace($meta_title_replace, '', $cat_desc);
    }
    if ($meta_desc) {
        $cat_desc = str_replace($meta_desc, '', $cat_desc);
    }
    if ($h1) {
        $cat_desc = str_replace($h1_replace, '', $cat_desc);
    }
    $cat_desc_ex = explode('[referats_with_pagination]', $cat_desc);
    echo $cat_desc_ex[0];
}

get_cat_content();

if (get_query_var('paged') == 0) {
    if (isset($cat_desc_ex[1])) {
        echo $cat_desc_ex[1];
    }
}


?>

<?php get_footer(); ?>

