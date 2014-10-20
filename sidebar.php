<div id="categories">
    <div class="sb_title">Поиск рефератов в базе</div>
    <div class="search_block">
        <?php get_search_form(); ?>
        <div class="alph_ref"><a href="http://referat-baza.com/themes/" title="Все темы рефератов по алфавиту">✔ Рефераты по алфавиту</a></div>
    </div>
    <div class="sb_title top_sb_title">Список категорий рефератов</div>
    <?php
    $args = array(
        'type' => 'post',
        'orderby' => 'name',
        'parent' => '',
        'order' => 'ASC',
        'hide_empty' => 0,
        'exclude'=>'48,1'
    );
    $categories = get_categories($args);
    if ($categories) {
        foreach ($categories as $cat) {
            echo '<div class="category"><a href="/'.$cat->slug.'/" title="'.$cat->name.'">'.$cat->name.'</a></div>'."\n";
        }
    }
    ?>

</div>