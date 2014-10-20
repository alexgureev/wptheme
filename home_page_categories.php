<?php
function get_home_cats(){
    $res = '';
    $args = array(
        'type' => 'post',
        'orderby' => 'name',
        'parent' => '',
        'order' => 'ASC',
        'hide_empty' => 0,
        'exclude'=>'48,1'
    );
    $categories = get_categories($args);

    $res.='<h2>Список категорий рефератов:</h2>';
    $res .= '<nav><ul id="home_categories">'."\n";

    if ($categories) {
        $count = ceil(count($categories)/2);
        for($i = 0; $i<$count;$i++){
            $res .= '<li><a href="/'.$categories[$i]->slug.'/" title="'.$categories[$i]->name.'">'.$categories[$i]->name.'</a></li>'."\n";
            if(isset($categories[$i+$count])){
                $res .= '<li><a href="/'.$categories[$i+$count]->slug.'/" title="'.$categories[$i+$count]->name.'">'.$categories[$i+$count]->name.'</a></li>'."\n";
            }
        }
//        foreach ($categories as $cat) {
//            $res .= '<li><a href="/'.$cat->slug.'/" title="'.$cat->name.'">'.$cat->name.'</a></li>'."\n";
//        }
    }

    $res .= '</ul></nav>'."\n";
    return $res;
}
?>