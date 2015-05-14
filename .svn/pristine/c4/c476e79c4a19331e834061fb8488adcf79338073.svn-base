//SHOW FIELD ONLY FOR A SPECIFIC SELECT/ SHOW/HIDE REQUIRED
jQuery(document).ready( function() {

	jQuery('#thumbnail').on('change',function(){

        if( jQuery(this).val() == "Custom field" ){
	        jQuery("#field").show()
	        jQuery("#field").attr('required', 'reuired');
        }
        else{
	        jQuery("#field").hide();
	        jQuery("#field").removeAttr('required');
        }
    });

})