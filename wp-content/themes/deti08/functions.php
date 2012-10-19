<?php
if ( function_exists('register_sidebar') ) {
    register_sidebar( array(
        'before_widget' => '<li id="%1$s" class="box widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="heading">',
        'after_title' => '</h2>',
        'name'=>'Sidebar'
    ));


    register_sidebar( array(
        'before_widget' => '<li id="%1$s" class="box widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="heading">',
        'after_title' => '</h2>',
        'name'=>'Footerbar'
    ));
}

function widget_mytheme_search() {
?>
<li><h2>Поиск</h2><ul><li>
    <form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div>
        <input type="text" value="Keyword" name="s" id="s" onfocus="if (this.value != '') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Слово для поиска';}"/>
        <input type="submit" id="searchsubmit" value="Search" />
    </div>
    </form></li></ul>
</li>
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Search'), 'widget_mytheme_search');
?>