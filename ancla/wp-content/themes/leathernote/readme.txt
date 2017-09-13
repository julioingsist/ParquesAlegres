/*
Theme Name: LeatherNote
Theme URI: http://www.myweb.ph/blog/
Description: For Wordpress 3.0+ - A sleek leather notepad design for Wordpress. You can customize the theme by creating a custom menu, adding widgets, uploading your own header image, creating a one-column post with no sidebar, or adding a featured image to the post ala a magazine. The theme respects the "Aside" and "Gallery" post formats, and adds a few special style touches to sticky posts and gallery thumbnails. Compatible with different browsers, including IE6.
Author: Webmechs
Version: 1.3
Tags: red, yellow, right-sidebar, two-columns, fixed-width, custom-header, custom-menu, threaded-comments, sticky-post
Author URI: http://www.webmechs.com/
*/


CUSTOMIZING YOUR LEATHERNOTE THEME
--------------------------------------------------

Maximum Image / Embed Width
--------------------------------------------------

Images, video embeds, etc. can have a maximum width of 500 pixels. Take note that your images and embeds will automatically be resized to the maximum width if they go over this value.


Customized Header Image
--------------------------------------------------

You can change your sidebar's header image by going to the Admin Panel of Wordpress and clicking on "Header" under the "Appearance" menu. The default header image is the coffee stain image.


Widgets
--------------------------------------------------

Widgets can be placed on three locations:

1. The sidebar, above the sidebar's header image
2. The sidebar, below the sidebar's header image
3. The footer

You can use these widget areas to easily add your banner advertisements (eg. Google Adsense) by clicking on "Widgets" under the "Appearance" menu of your Admin panel, dragging the "Text" widget to your preferred location, and entering your Google adsense code or any other advertisement code on that text widget.


Search Box
--------------------------------------------------

By default, the search box appears on your blog, below the sidebar header image. This search box uses a custom style different from the widget menus, so I highly suggest keeping this search box as is, instead of dragging a search widget on your sidebar.

If you do want to remove the search box, click on the "Editor" under the "Appearances" menu. Then, on the right side, click on "sidebar.php" Once sidebar.php is loaded onto the text box on the middle portion of the page, scroll down the text area and locate:

                    <li id="search" class="widget-container widget_search">
                        <?php get_search_form(); ?>
                    </li>

Remove this code or, if you think you will want to use it again later on, replace the above code with:

                    <!--<li id="search" class="widget-container widget_search">
                        <?php get_search_form(); ?>
                    </li>-->

Which hides the search box. If you want to reactivate it, just replace the code with the first code shown.


Other Concerns?
--------------------------------------------------

If you need further assistance, you can go to http://www.webmechs.com/ and go to our "Resources" section.

