<?php
/*
Plugin Name: PhotoBlog Image Fixer
Plugin URI: http://photographyblogsites.com/resources/wordpress-plugins/photoblog-image-fixer
Description: Allow better image sizing by removing inline sizes and adding a class name to the automatically generated p tags.
Version: 1.4
Author: Marty Thornley
Author URI: http://martythornley.com
*/

/*  Copyright 2009-2014  Marty Thornley  (email : marty@martythornley.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

	add_action( 'wp_enqueue_scripts', 		'image_fixer_enqueue_scripts' );
	add_action( 'wp_head', 					'image_fixer_add_max_width' );
	
	add_filter( 'the_content', 				'image_fixer_add_wrapper' , 99 );
	add_filter( 'wp_footer', 				'image_fixer_fix_with_spans' );
	
	function image_fixer_enqueue_scripts() {
	
		wp_enqueue_script( 'jquery' );
	
	}

	function image_fixer_add_wrapper( $content ) {
	
		$content = '<span class="image-fixer-wrapper">' . $content . '</span>'; 
		
		return $content;
	}
	
	
	function image_fixer_add_max_width() {
		echo '
			<style type="text/css">
				span.image-fixer img	{ max-width: 100%; width: expression(this.width > 100% ? 100%: true); height:auto; }
				.wp-caption 			{ max-width: 100%; }
			</style>';
	}
	
	function image_fixer_fix_with_spans( $content ) {
		?>
		<script type="text/javascript">
			//<![CDATA[
				jQuery(document).ready(function($) {
					$("span.image-fixer-wrapper img").not(".no-image-fix").removeAttr("height").addClass("image-sizer").wrap('<span class="image-fixer" />').css({height: "auto"});
				});
			//]]>
		</script>
		<?php
	}