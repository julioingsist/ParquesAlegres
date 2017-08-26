=== Post Category Index Generator ===
Contributors: Marco Constâncio
Tags: post, category, index
Requires at least: 3.0
Tested up to: 3.4.1
Stable Tag: trunk

Allows the user to insert a index of posts and categories on page/post. 

== Description ==

Allows the user to insert a index of posts and categories on page/post using shortcodes. 

It can produce a list or tree like index wich may include the category name, subcategory name, the post title and parts of the post like the post excerpt or certain tags, like div, spans and headings.

== Installation ==

1. Install the plugin either by uploading the contents of 
post-category-index-generator.zip to the '/wp-content/plugins/' directory 
or by using the 'Add New' in 'Plugins' menu in WordPress
1. Activate the plugin through the 'Plugins' menu in WordPress

= Parameters =
* **category** - slug ot the category to parse. (mandatory)
* **display** -  type of index to generate wich can be: **list** or **tree**.
* **show** - elements that will be displayed. Parameters are: **category_name** and **post_title**.
* **links** -  elements that will contain a hyperlink to the element instead of normal text. Parameters are: **category_name**, **subcategory_name** and **post_title**.
* **hide_empty** - hides/displays empty categories. Parameters are: **true** or **false**. (default: false)
* **order** - set the order of the posts.  Parameters are: **asc** (ascending) and **desc** (descending). 
* **orderby** - set the wich parameter will be used when in the posts order.  Parameters are: **author**, **date**, **category**, **title**, **modified**, **menu_order**, **parent**, **ID** and **rand**. 
* **hide_categories** - list of categories (and its posts) that will not be displayed. In **tree** display this will include also the subcategories.
* **hide_category_posts** - list of categories wich the its posts that will not be displayed.
* **tags_or** and **tags_and** - list of tags wich will be used to filter. When both parameters are set, only the **tags_and** will be used.
* **post_sections** - parts of the post that will be displayed.  Parameters are: **excerpt**, a html tag or a css html selectors separated with commas. For more info the html tags and css html selectors check the examples and  and the section **How to find HTML elements?** in http://simplehtmldom.sourceforge.net/manual.htm. 
* **postappend** and **postappend_link** - appends part of the post to the post title and uses same options of the the **post_sections** parameter. **postappend** will produce normal text while **postappend_link** will produce a link. 
* **postappend_prefix** and **postappend_separator** - prefix and separator to be used then the parameters **postappend** or **postappend_link** are used. Options are **comma**, **space** and **dash**.

**ATENTION**: IF THE CATEGORY DOESN'T HAVE ANY SUBCATEGORIES YOU HAVE TO USE THE 'show' PARAMETER DO DIPLAY POSTS TITLES AND SUBCATEGORIES NAMES.

= Examples for the parameters =
Displays only subcategories (ignores the empty ones) in tree index.

* [pcig category=category-2 hide_empty=true]

Displays main category name, subcategories names (ignores the empty ones), post titles with hyperlinks in tree index. 

* [pcig category=category-2 show=category_name,post_title  links=post_title hide_empty=true]

Displays subcategories names, subcategories names with hyperlinks and post titles with hyperlinks ordered by post title (in ascending order) in tree index. 

* [pcig category=category-2 show=post_title links=subcategory_name,post_title order=asc orderby=title]

Displays main category name, subcategories names (ignores the empty ones), post titles with hyperlinks in list index.

* [pcig category=category-2 display=list show=category_name,post_title links=post_title hide_empty=true]

Displays main category name, subcategories names, ignores the content of 2 categories and ignore posts from other 2 categories.

* [pcig category=category-2 show=category_name,post_title hide_categories=category3,category-4 hide_category_posts=category5,category-6]

Displays main category name, subcategories names and post_title of post that have both tags.

* [pcig category=category-2 show=category_name,post_title tags_and=tag1,tag2]

Displays subcategories names, post titles with hyperlinks and the posts excerpts, heading 1 and heading 2 titles in tree index. 

* [pcig category=category-2 show=post_title links=post_title post_sections=h1,h2,post_excerpt]
    
Displays subcategories names, post titles with hyperlinks and the content of every html element in the post with the id equal to id123 (parameter that always starts with a number sign (#) ) and class equal class123 (parameter that always starts with a dot (.) ).

* [pcig category=category-2 show=post_title links=post_title post_sections=#id123,.class123]

Displays subcategories names,  post_excerpt and h1 elements appended to the post titles, using a dash as separator between elements and dash between the title and the elements.

* [pcig category=category-2 show=post_title postappend_prefix=dash postappend_separator=dash postappend=post_excerpt,h1]

= Classes =
The code generated by this plugin will contain some html classes will allow to style the index by add css rules to the theme's css file. The following classes can be used:

* **pcig-ul-list** and **pcig-top-ul-list** - list class
* **pcig-li-item** - list element class
* **pcig-category** - category span element
* **pcig-category-link** - hyperlink class
* **pcig-post-title** **pcig-post-excerpt** **pcig-post-title-link** - post span class

= Examples of css =
Change the left margin of the index of the index:
`.pcig-top-ul-list{ margin-left: 5px; }`

Use image bullets for categories: 
`.pcig-ul-list{ list-style-type:none; }
.pcig-category{ padding-left: 20px; background:transparent url(redcheck.gif) no-repeat scroll 0 0;}`

== Screenshots ==

1. Tree index example.
2. List index example.

== Changelog ==

= 0.1 =
First version of the plugin.

= 0.1.1 =
Fixed bug that caused incorrect post link generation.

= 0.1.2 =
Fixed bug that caused only one post excerpt to be displayed. 

= 0.1.3 =
Fixed bug that produced warnings. 

= 0.1.4 =
Fixed bug that produced incorrect html on certain ocasions.
Tweaks in certain functions.
Add the option to set post order 
 
= 0.1.5 =
Added option to ignore categories.
Added option to ignore all post from selected categories.

= 0.1.6 =
Added classes to allow easier styling.

= 0.1.7 =
Added missing class to the top ul element to allow easier styling.

= 0.1.8 =
Added a few tweaks to the code for better perfomance.
Added extra parameter to allow to filter posts by tag.
Added extra parameter to allow to append text from post to the post title.
Added additional classes for styling and rename others with simpler names.

= 0.1.9 =
Added fix for displaying posts from a category with no child categories.

= 0.2.0 =
Fix for wordpress 3.5.