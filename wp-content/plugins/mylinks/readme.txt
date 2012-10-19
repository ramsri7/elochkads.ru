=== Wordpress MyLinks - The link directory with automatical thumbnail generation ===
Plugin Name: mylinks
Plugin URI: http://www.picdonkey.com
Description: Displays blogroll links on a Page or Post. Insert `[mylinks]` or `[mylinks=categoryname]` to a Page or Post and it will display all your blogroll links there- with live snapshots of every page. Very nice too look!
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

Displays blogroll links on a Page or Post. Insert `[mylinks]` to a Page or Post and it will display all your blogroll links there- with live snapshots of every page. Very nice too look!

== Description ==

Displays blogroll links on a Page or Post. Insert `[mylinks]` to a Page or Post and it will display all your blogroll links there- with live snapshots of every page. Very nice too look!

Only 1-2 Minutes and the thumbnails snapshots are generated. This takes some time, because the server has to deliver many thumbnails at one time. Once cached (1-2minutes), the thumbnails will appear.

TODO:

1. [new 14.01.2009] Sorting of the links
2. [new 02.09.2009] Select template with shortcut [mylinks=Category,templatename]

INSTALLATION:

1. Upload the mylinks plugin directory, along with its contents, to your
   worpress plugins directory: `/wp-content/plugins/`.
2. Activate the plugin and follow the instructions in the description.
3. Example: Use `[mylinks]` in your page or post to display all your links
4. Example: Use `[mylinks=categoryname]` to display just the links of the category `categoryname` in your page or post
5. Example: Use `[thumb]http://www.your-homepage.com[/thumb]` to display a thumbnail of the website `http://www.your-homepage.com` in your page or post 
6. Thats it :) You just have to update your wordpress links.

CHANGE LAYOUT:

Just change the templates in the `templates` subdirectory of the mylinks-plugin: `all_links.html` is the template for displaying all links and `one_category.html` is the template for displaying just one category. I think its easy to understand how it works :)

DONE:

1. 27.01.2009: New software for generating snapshots
2. 27.01.2009: Now also thumbnails of websites with flash elements supported (there were some problems before)
3. 27.01.2009: Better thumbnail quality
4. 09.02.2009: Display links only from special category
5. 09.02.2009: Display only one thumbnail/website
6. 09.02.2009: Use templates, so everbody can easily change the html code (valid html, xhtml...) (2.0)
7. 05.03.2008: Fixed type=text/javascript in thumbnail (2.1)
8. 06.03.2008: Fixed type=text/javascript in category overview (2.2)

No support... i do this plugin in my free time - i dont have time to answer your questions!

== Installation ==

1. Upload the mylinks plugin directory, along with its contents, to your
   worpress plugins directory: `/wp-content/plugins/`.
2. Activate the plugin and follow the instructions in the description.
3. Example: Use `[mylinks]` in your page or post to display all your links
4. Example: `[mylinks=categoryname]` to display just the links of the category `categoryname` in your page or post
5. Example: `[thumb]http://www.your-homepage.com[/thumb]` to display just one thumbnail in your page or post of the website `http://www.your-homepage.com`
6. Thats it :) You just have to update your wordpress links.

You also can change the layout:
Just change the templates in the `templates` subdirectory of the mylinks-plugin: `all_links.html` is the template for displaying all links and `one_category.html` is the template for displaying just one category.

== Frequently Asked Questions ==

= Do I need a graphic software? =

No, the thumbnails are generated and hosted by `http://www.picdonkey.com`.

= When will the thumbnails be generated? =

Normally, new website thumbnails will be generated in 1-5 minutes by my thumbnail service `http://www.picdonkey.com`... sometimes it takes (maximum) 24 hours. If they dont appear, you have given a wrong link, the website could not be reached or its just toooooooo slow :)

= Do i have to upload pictures? =

No, only use the tag [mylinks] in the editor

= What size do the thumbnails have? =

width: 200 and height: 150

= Does my link open in a new window? =

Yes the link on the thumbnail opens in a new window with target _blank

= How can i sort the links? =

The links are sorted by title: So if you start the link title with "1. link title", "2. link title", "3. link title" ... - you can sort your links. Its not the beste solution, but i am working on a better way, so please pe patient.

= How can i change the layout? =

Just change the templates in the `templates` subdirectory of the mylinks-plugin. `all_links.html` is the template for all links and `one_category.html` is the template for displaying just one category.

= Can i ask the author something? =

No... be free to use the plugin - or use an other plugin :)

== Screenshots ==

1. Add a page, insert `[mylinks]` and thats it :) You can also use it in your Posts