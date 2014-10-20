<form role="search" method="get" id="searchform" action="/search" >
    <input class="search rounded" type="text" value="<?php echo pg_escape_string($_GET['query']) ?>" name="query" id="s" placeholder="Что искать?..."/>
    <input type="submit" id="searchsubmit" value="Поиск" />
</form>