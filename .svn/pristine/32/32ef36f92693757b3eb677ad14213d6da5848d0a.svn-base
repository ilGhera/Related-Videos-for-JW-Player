<?php

/*

Plugin Name: Related Videos for JW Player

Plugin URI: www.logicimage.it

Description: It creates the feed required from "Related Videos" add-on of JW Player, one for each category. That's the url to use in your JW Player code: http://YOUR-SITE/category/THE-CATEGORY-SLUG/?feed=related-feed 

Author: Andrea Gherardi

Version: 1.0

Author URI: www.logicimage.it

*/


//FILE CALL
include( plugin_dir_path( __FILE__ ) . 'includes/rvjwp-admin-settings.php');


//INTERNATIONALIZATION
add_action( 'plugins_loaded', 'rvjwp_load_textdomain' );

function rvjwp_load_textdomain() {
	load_plugin_textdomain('rvjwp-lang', false, basename( dirname( __FILE__ ) ) . '/languages' );
}


add_action('init', 'rvjwp_add_feed_init');

//ADD NEW FEED
function rvjwp_add_feed_init() {

   add_feed('related-feed', 'rvjwp_add_feed');

}

//CREATE FEED
function rvjwp_add_feed() {


header('Content-Type: ' . feed_content_type('rss-http') . '; charset=' . get_option('blog_charset'), true);

$more = 1;

echo "<rss version=\"2.0\" xmlns:media=\"http://search.yahoo.com/mrss/\">\n";

echo "<channel>\n";	

while( have_posts()) : the_post();

	if(get_option('rvjwp-image') == 'Featured image') {

		//Get the featured image url
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		$url_image = $thumb['0'];

	} else {

		//Get the custom field value
		$key = get_option('rvjwp-field');
		$url_image = get_post_meta(get_the_ID(), $key, true);

	}

	$output = "<item>\n";

		$output .= "<title>" . get_the_title_rss() . "</title>\n";

		$output .= "<link>" . get_the_permalink() . "</link>\n";

		$output .= "<media:thumbnail url=\"" . $url_image ."\"/>\n";

	$output .= "</item>\n";

	echo $output;

endwhile; 
  
echo "</channel>\n";

echo "</rss>";


}