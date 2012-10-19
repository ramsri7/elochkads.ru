<?php

/*
Plugin Name: mylinks
Plugin URI: http://www.picdonkey.com
Description: Displays blogroll links on a Page or Post. Insert `[mylinks]` to a Page or Post and it will display all your blogroll links there- with live snapshots of every page. Very nice too look! Example: Use `[mylinks]` in your page or post to display all your links, Example: Use `[mylinks=categoryname]` to display just the links of the category `categoryname` in your page or post, Example: Use `[thumb]http://www.your-homepage.com[/thumb]` to display a thumbnail of the website `http://www.your-homepage.com` in your page or post
Version: 3.2
Author: Sascha Ende
Author URI: http://www.picdonkey.com
Min WP Version: 2.3
Max WP Version: 2.7
Tags: homepage,website,thumbnail,thumbnails,thumb,screenshot,snapshot,link,links,images,image,directory,blogroll
Requires at least: 2.3
Tested up to: 2.7
Stable tag: trunk
Contributors: endemedia
Donate link: http://www.picdonkey.com
*/

add_filter('the_content','getMyLinks');

function getMyLinks($content) {

	global $wpdb, $table_prefix;

	if(strpos($content,'[mylinks]') === false){

		return $content;

	}else{

		$res = '';

	$stmt = "	SELECT lin.*, ter.slug, ter.name as categoryname
				FROM ".$wpdb->term_relationships." as rel 
				
				LEFT JOIN ".$wpdb->term_taxonomy." as tax
				ON rel.term_taxonomy_id = tax.term_taxonomy_id
				
				LEFT JOIN ".$wpdb->links." as lin
				ON rel.object_id = lin.link_id
				
				LEFT JOIN ".$wpdb->terms." as ter
				ON tax.term_id = ter.term_id
				
				WHERE tax.taxonomy = 'link_category'
				AND	lin.link_visible = 'Y'
				
				ORDER BY ter.slug ASC, lin.link_name ASC";

		$sqlres = $wpdb->get_results($stmt);

		# Load Template
		$tpl = file_get_contents(ABSPATH.'wp-content/plugins/mylinks/templates/all_links.html');
		
		# Get Link Part from Template
		preg_match("/\<\!\-\-category\:start\-\-\>(.*?)\<\!\-\-category\:stop\-\-\>/sim",$tpl,$categoryparts);
		preg_match("/\<\!\-\-link\:start\-\-\>(.*?)\<\!\-\-link\:stop\-\-\>/sim",$tpl,$tplparts);
		
		$last_term = null;

		# Parse now the results...		
		foreach($sqlres as $link){
			
			# Category?
			if($link->categoryname != $last_term){
				$res .= str_replace('{category}',$link->categoryname,$categoryparts[1]);
				$last_term = $link->categoryname;	
			}
			
			$REPLACE = array(
				'{image}',
				'{link_name}',
				'{link_description}',
				'{link_url}'
			);
			
			$REPLACE_WITH = array(
				'<script language="javascript" type="text/javascript" src="http://www.bildesel.de/thumb.php?url='.urlencode($link->link_url).'"></script>',
				$link->link_name,
				$link->link_description,
				$link->link_url			
			);
			
			$res .= str_replace($REPLACE,$REPLACE_WITH,$tplparts[1]);
			
		}
		
		$tpl = str_replace(array($tplparts[0],$categoryparts[0]),array($res,''),$tpl).base64_decode('PHA+PGEgaHJlZj0iaHR0cDovL3d3dy5waWNkb25rZXkuY29tIj5Qb3dlcmVkIGJ5IFBpY2RvbmtleSAtIE15TGlua3M8L2E+PC9wPg==');
		
		return str_replace('[mylinks]',$tpl,$content);
	}
}

##############################################################################################################
# Get thumbnails by category
##############################################################################################################

add_filter('the_content','getMyLinksByCategory');

function getMyLinksByCategory($content){
	return 	preg_replace_callback('/\[mylinks=(.*?)\]/sim','getMyLinksByCategoryCallback',$content);
}

function getMyLinksByCategoryCallback($matches){
	
	global $wpdb, $table_prefix;
	
	$stmt = "	SELECT lin.*, ter.slug, ter.name
				FROM ".$wpdb->term_relationships." as rel 
				
				LEFT JOIN ".$wpdb->term_taxonomy." as tax
				ON rel.term_taxonomy_id = tax.term_taxonomy_id
				
				LEFT JOIN ".$wpdb->links." as lin
				ON rel.object_id = lin.link_id
				
				LEFT JOIN ".$wpdb->terms." as ter
				ON tax.term_id = ter.term_id
				
				WHERE tax.taxonomy = 'link_category'
				AND (ter.slug = '".$matches[1]."' OR	ter.name = '".$matches[1]."')
				AND	lin.link_visible = 'Y'
				
				ORDER BY lin.link_name ASC";
	
	$sqlres = $wpdb->get_results($stmt);
	
	if(count($sqlres) >= 1){
		
		$res = '';
		
		# Load Template
		$tpl = file_get_contents(ABSPATH.'wp-content/plugins/mylinks/templates/one_category.html');
		
		# Get Link Part from Template
		preg_match("/\<\!\-\-link\:start\-\-\>(.*?)\<\!\-\-link\:stop\-\-\>/sim",$tpl,$tplparts);
		
		# Parse now the results...		
		foreach($sqlres as $link){
			
			$REPLACE = array(
				'{image}',
				'{link_name}',
				'{link_description}',
				'{link_url}'
			);
			
			$REPLACE_WITH = array(
				'<script type="text/javascript" language="javascript" src="http://www.bildesel.de/thumb.php?url='.urlencode($link->link_url).'"></script>',
				$link->link_name,
				$link->link_description,
				$link->link_url			
			);
			
			$res .= str_replace($REPLACE,$REPLACE_WITH,$tplparts[1]);
			
		}
		
		$tpl = str_replace($tplparts[0],$res,$tpl).base64_decode('PHA+PGEgaHJlZj0iaHR0cDovL3d3dy5waWNkb25rZXkuY29tIj5Qb3dlcmVkIGJ5IFBpY2RvbmtleSAtIE15TGlua3M8L2E+PC9wPg==');
	
		return $tpl;
	}else{
		return '';
	}	
	
}

##############################################################################################################
# Add one Thumb to the content
##############################################################################################################

add_filter('the_content','getMyLinksThumb');

function getMyLinksThumb($content) {
 	return preg_replace_callback("/\[thumb\](.*?)\[\/thumb\]/sim","getMyLinksThumbCallBack",$content);
}

function getMyLinksThumbCallBack($content){
	return '<script type="text/javascript" language="javascript" src="http://www.bildesel.de/thumb.php?url='.urlencode($content[1]).'"></script>';
}

?>