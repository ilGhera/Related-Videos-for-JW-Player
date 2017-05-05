<?php

//HOOKS
add_action( 'admin_menu', 'rvjwp_add_menu' );
add_action( 'admin_init', 'rvjwp_register_style' );
add_action( 'init', 'rvjwp_script_enqueuer' );


//SCRIPT
function rvjwp_script_enqueuer() {
   wp_register_script( "rvjwp-script", WP_PLUGIN_URL.'/related-videos-for-jw-player/js/rvjwp-script.js', array('jquery') );
   wp_localize_script( 'rvjwp-script', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        

   wp_enqueue_script( 'jquery' );
   wp_enqueue_script( 'rvjwp-script' );

}

//STYLE
function rvjwp_register_style() {
	wp_register_style( 'rvjwp-style', plugins_url('css/rvjwp-style.css', 'related-videos-for-jw-player/css'));
}

function rvjwp_add_style() {
	wp_enqueue_style( 'rvjwp-style');
}


//SUB-MENU PAGE 
function rvjwp_add_menu() {
	$rvjwp_page = add_submenu_page( 'options-general.php', 'Related Videos for JW Player', 'Related Videos for JW Player', 'manage_options', 'related-videos-for-jw-player', 'rvjwp_options');
	//GET STYLE
	add_action( 'admin_print_styles-' . $rvjwp_page, 'rvjwp_add_style' );

	return $rvjwp_page;
}


//ADMIN OPTIONS 
function rvjwp_options() {
	
	echo '<div class="wrap">'; 
		echo '<div class="wrap-left" style="float:left; width:70%;">';

			echo '<h1>' . __('Related Videos for JW Player', 'rvjwp-lang') . '<span style="font-size:60%;"> 1.2.0</span></h1>';
			
			echo '<p>' . __('If you\'re using <strong>JW Player</strong> on your site, you probably know <strong><a href="http://support.JW Player.com/customer/portal/articles/1409745-display-related-videos" target="_blank">Related Videos</a></strong>, a free plugin that allows you to show more contents to the users in a beautifull and simple layout.', 'rvjwp-lang') . '<br>';
			echo __('<strong>Related Videos for JW Player</strong> will creates the correct xml for each category, so you\'ll be able to show related contents dynamically.', 'rvjwp-lang') . '</p>';
			
			echo '<form id="rvjwp-options" name="rvjwp-options" method="post" action="">';
				echo '<table class="form-table">';
				
					//GET VALUES FROM DB

					//DEFAULT VALUE
					if (get_option('rvjwp-image') == null) {
						update_option('rvjwp-image', 'Featured image');
					}
					$set = sanitize_text_field(get_option('rvjwp-image'));

					//SET NEW IMAGE VALUE
					if($_POST['thumbnail']) {
						$set = sanitize_text_field($_POST['thumbnail']);
						update_option('rvjwp-image', $set);
					}

					//SET CUSTOM FIELD
					$field_set = sanitize_text_field(get_option('rvjwp-field'));
					if($_POST['sent'] == 1) {
						$field_set = sanitize_text_field($_POST['field']);
						update_option('rvjwp-field', $field_set);
					}

					//SET CATEGORY
					$rvjwp_cat = sanitize_text_field(get_option('rvjwp-category'));
					if($_POST['rvjwp-category']) {
						$rvjwp_cat = sanitize_text_field($_POST['rvjwp-category']);
						update_option('rvjwp-category', $rvjwp_cat);
					}

					//SET HEADING
					$rvjwp_heading = (get_option('rvjwp-heading')) ? sanitize_text_field(get_option('rvjwp-heading')) : 'Related';
					if($_POST['rvjwp-heading']) {
						$rvjwp_heading = sanitize_text_field($_POST['rvjwp-heading']);
						update_option('rvjwp-heading', $rvjwp_heading);
					}

					echo '<tr>';
						echo '<th scope="row">' . __('Video image', 'rvjwp-lang') . '</th>';

						echo '<td>';
							echo '<select id="thumbnail" name="thumbnail"/>';

							echo '<option id="featured-image" value="Featured image"';
							echo ($set == 'Featured image') ? 'selected="selected">' : '>';
							echo __('Featured image', 'rvjwp-lang') . '</option>';

							echo '<option id="custom-field" value="Custom field"';
							echo ($set == 'Custom field') ? 'selected="selected">' : '>';
							echo __('Custom field', 'rvjwp-lang') . '</option>';

							echo '</select>';
							echo '<input type="hidden" id="sent" name="sent" value="1"/>';
						
							echo '<input type="text" ';
							echo ($set == 'Featured image') ? 'style="display:none;" ' : '';
							echo 'id="field" name="field" placeholder="' . __('Custom field name', 'rvjwp-lang') . '" value="' . $field_set . '"/>';

							echo '<p class="description">' . __('Select how to get the video thumbnail from your posts.', 'rvjwp-lang') . '</p>';	
						echo '</td>';
					echo '</tr>';

					$categories = get_categories();

					echo '<tr>';
						echo '<th scope="row">' . __('Category', 'rvjwp-lang') . '</th>';
						echo '<td>';
							echo '<select id="rvjwp-category" name="rvjwp-category">';

							foreach ($categories as $cat) {
								echo '<option name="' . $cat->name . '" value="' . $cat->term_id . '"' . ($rvjwp_cat == $cat->term_id ? ' selected="selected"' : '') . '>' . $cat->name . '</option>';
							}
							echo '</select>';
							echo '<p class="description">' . __('Select the right category for changing the code down here.', 'rvjwp-lang') . '</p>';	
						echo '</td>';
						echo '</tr>';

						echo '<tr>';
							echo '<th scope="row">' . __('Heading', 'rvjwp-lang') . '</th>';
							echo '<td>';
								echo '<input type="text" id="rvjwp-heading" class="regular-text" name="rvjwp-heading" value="' . $rvjwp_heading . '">';
								echo '<p class="description">' . __('Chose the heading for your related contents.', 'rvjwp-lang') . '</p>';	
							echo '</td>';
						echo '</tr>';

						echo '<tr>';
							echo '<th scope="row">' . __('Code', 'rvjwp-lang') . '</th>';
							echo '<td>';

								echo "
<pre class=\"rvjwp-code\">
'related': {
   'file': '<span class=\"code\">" . get_category_link($rvjwp_cat) . "?feed=related-feed</span>',
   'heading': '" . $rvjwp_heading . "',
   'onclick': 'link'
}
</pre>
									";

								echo '<p class="description">' . __('Add this snippet to your JW Player code for related videos of ', 'rvjwp-lang') . '<strong>' . get_cat_name($rvjwp_cat) . '</strong><br>';	
							echo '</td>';
					echo '<tr>';

				echo '</table>';
			
				echo '<input class="button button-primary" type="submit" id="submit" value="' . __('Save chages', 'rvjwp-lang') . '">';

			echo '</form>';

		echo '</div>'; //WRAP LEFT

		echo '<div class="wrap-right" style="float:left; width:30%; text-align:center; padding-top:3rem;">';
			echo '<iframe width="300" height="1000" scrolling="no" src="http://www.ilghera.com/images/rvjwp-iframe.html"></iframe>';
		echo '</div>';

		echo '<div class="clear"></div>';
	
	echo '</div>';
}