<?php
require_once('home_page_categories.php');
?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <?php
    $ref_subjects = get_post_meta($post->ID, 'ref_subjects', true);
    $ref_subjects = explode('|||', $ref_subjects);
    $file_id = get_post_meta($post->ID, 'ref_file_id', true);

    $ref_date_created = get_post_meta($post->ID, 'ref_date_created', true);
    $ref_language = get_post_meta($post->ID, 'ref_language', true);
    $ref_meta_desc = get_post_meta($post->ID, 'ref_meta_desc', true);
    $ref_author_name = get_post_meta($post->ID, 'ref_author_name', true);
    echo '[meta_desc]'.$ref_meta_desc.'[/meta_desc]';
//    $ref_meta_keys = get_post_meta($post->ID, 'ref_meta_keys', true);
    ?>

    <h2>Основные тезисы реферата:</h2>
    <ul class="ref_thesis">
        <?php
        foreach ($ref_subjects as $sbj) {
            if(mb_strlen($sbj)<5){
                continue;
            }
            echo '<li>' . $sbj . '</li>' . "\n";
        }
        ?>
    </ul>

    <table class="table_info" border="1">
        <tbody>
        <tr class="solidline">
            <td colspan="2">Информация о работе</td>
        </tr>
        <tr>
            <td class="t_param">Категория:</td>
            <td><?php $category = get_the_category();
                echo '<a href="/' . $category[0]->slug . '/" title="Категория ' . trim($category[0]->cat_name) . '">' . $category[0]->cat_name . '</a>';?></td>
        </tr>
        <tr>
            <td class="t_param">Язык:</td>
            <td><?php echo (($ref_language == 'ru') ? 'Русский' : 'Украинский');?></td>
        </tr>
        <tr>
            <td class="t_param">Автор:</td>
            <td><?php echo $ref_author_name;?></td>
        </tr>
        <tr>
            <td class="t_param">Дата:</td>
            <td><?php echo $ref_date_created;?></td>
        </tr>
        <tr class="downline">
            <td colspan="2">
                <a class="dbtn" title="Скачать реферат <?php the_title(); ?>" href="/download.php?file=<?php echo base64_encode($file_id); ?>">Скачать реферат
                    <?php the_title(); ?></a>
            </td>
        </tr>
        <tr class="sharetr">
            <td class="t_param">Поделится ссылкой</td>
            <td><div class="socialinit" data-path="/img/"></div></td>
        </tr>
        </tbody>
    </table>



<?php endwhile;
    if (function_exists('echo_ald_crp')) {
        echo_ald_crp();
    }
endif; ?>
<?php get_footer(); ?>

