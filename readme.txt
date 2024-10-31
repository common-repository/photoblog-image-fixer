=== Plugin Name ===
Contributors: martythornley
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=11225299
Tags: photoblog, images, image p tags. autop
Tested up to: 4.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Stable tag: trunk

PhotoBlog Image Fixer allows better image sizing ensuring that the largest possible image is 100% of the post area, without extending past the edges.

== Description ==

PhotoBlog Image Fixer allows better image sizing and removes those ugly squished images when you accidently upload a larger image.

* Removes the inline height dimension added by the WordPress content filter. 

* Adds class names to the automatically generated p tags that wrap each image as well as the image itself.

* Adds a quick line of CSS to the page making images in a p tag have a max-width of 100% of the containing element

== Installation ==

1. Upload `photoblog_image_fixer.php` to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= WordPress MU/Multisite? =

Yes. Works in '/mu-plugins/' as well, allowing it to work automatically for every blog. It is just a couple simple filters that work automatically.

= How do I use it? =

Just activate the plugin. No settings. No template tags or shortcodes to worry about.

= How does the class name added fix images? =

When images are inserted through the WordPress editor, they automatically get wrapped in paragraph tags, like this:

`<p><a href=".... <img src=""..... /></p>`

The problem is that when you try to add padding or margins or any style to your paragraphs, this also effects the images, because they are inside of paragraphs. So we added some styling to images by wrapping the content in classes and adding some fixing styles.

You can also add your own using the added classes like described below.

Wraps all content in a wrapper - image-fixer-wrapper

	.image-fixer-wrapper			{}
	
Wraps all images in a span called .image-fixer

	span.image-fixer 				{ padding: 0px; margin: 0px; }

Adds a class to the image itself .image-sizer

	img.image-sizer					{}
	
Because the plugin also adds a class to the image, you can over-ride that if you want like this:

	span.image-fixer img.image-sizer		{ max-width: 800px; }
	
You can also add a class .no-image-fix to any image you want to remain untouched. And then can style that in other ways.

	.no-image-fix 					{}

== Changelog ==

= 1.4 =

Now uses jQuery to wrap content and add classes. Much better method of finding images within content.
You may need to revisit and update CSS if you used the classes added by previous versions.

= 1.3.1 =

Fixed typo that made images act weird.

= 1.3 =

Fixed max-width problem in IE.
Added object recognition, adding class name to paragraphs containing embedded media.

= 1.2 =

Fixed height and class separately. It was getting confused when both were there.

= 1.1 =

fixed installation error