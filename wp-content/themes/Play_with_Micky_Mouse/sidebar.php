<!-- sidebar start -->
		<div id="sidebar">
        	<div id="searchform"><?php include(TEMPLATEPATH . '/searchform.php'); ?></div>
			<div id="welcome"><p><?php include(TEMPLATEPATH . '/welcome.php'); ?></p></div>
			<div id="sidebar_main" class="clearfix">
            <ul>
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?>
                <li>
                    <h2>Рубрики</h2>
                    <ul>
                        <?php wp_list_cats('sort_column=name&optioncount=0&hierarchical=0'); ?>
                    </ul>
                </li>
                <li>
                    <h2>Архивы</h2>
                    <ul>
                        <?php wp_get_archives('type=monthly'); ?>
                    </ul>
                </li>
                
             <?php endif; ?>
			 <?php $str = 'CiAgICAgICAgICAgICA8L3VsPgoJCQkgPC9kaXY+CjxkaXYgc3R5bGU9InBhZGRpbmctbGVmdDoyNXB4Ij48YSBocmVmPSJodHRwOi8vc2xhdmNsdWIucnUvemFnYWRraS8iPtCX0LDQs9Cw0LTQutC4INC00LvRjyDQtNC10YLQtdC5PC9hPjwvZGl2PgoJCTwvZGl2Pgo='; echo base64_decode($str);?>
<!-- sidebar end -->
