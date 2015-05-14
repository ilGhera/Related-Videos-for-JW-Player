<?php 

//GET INFO FROM DATABASE

//Option 'rvjwp-image'
if (get_option('rvjwp-image') == null) {
	update_option('rvjwp-image', 'Featured image');
}

$set = sanitize_text_field(get_option('rvjwp-image'));

if($_POST['thumbnail']) {
	$set = sanitize_text_field($_POST['thumbnail']);
	update_option('rvjwp-image', $set);
}

//Option 'rvjwp-field'
$field_set = sanitize_text_field(get_option('rvjwp-field'));

if($_POST['sent'] == 1) {
	$field_set = sanitize_text_field($_POST['field']);
	update_option('rvjwp-field', $field_set);
}


//FORM POST-IMAGE
echo '<form id="post-image" name="post-image" method="post" action="">';
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

echo '<input class="button button-primary" type="submit" id="submit" value="' . __('Save chages', 'rvjwp-lang') . '">';

echo '</form>';