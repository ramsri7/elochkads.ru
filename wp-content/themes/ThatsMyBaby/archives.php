<?php get_header(); ?>
<div class="content-layout">
    <div class="content-layout-row">
<?php include (TEMPLATEPATH . '/sidebar1.php'); ?><div class="layout-cell content">

<div class="block">
    <div class="block-body">

<div class="blockcontent">
    <div class="blockcontent-tl"></div>
    <div class="blockcontent-tr"></div>
    <div class="blockcontent-bl"></div>
    <div class="blockcontent-br"></div>
    <div class="blockcontent-tc"></div>
    <div class="blockcontent-bc"></div>
    <div class="blockcontent-cl"></div>
    <div class="blockcontent-cr"></div>
    <div class="blockcontent-cc"></div>
    <div class="blockcontent-body">
<!-- block-content -->

<h2><?php _e('Архивы по месяцам:', 'kubrick'); ?></h2>
<ul><?php wp_get_archives('type=monthly'); ?></ul>
<h2><?php _e('Архивы по рубрикам:', 'kubrick'); ?></h2>
<ul><?php wp_list_categories(); ?></ul>

<!-- /block-content -->

		<div class="cleared"></div>
    </div>
</div>


		<div class="cleared"></div>
    </div>
</div>


</div>
<?php include (TEMPLATEPATH . '/sidebar2.php'); ?>
    </div>
</div>
<div class="cleared"></div>

<?php get_footer(); ?>